<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 *
 * @method \App\Model\Entity\Book[] paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{

    var $uses = ["Comments","Categories"];

    var $components = ["Paginator"];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Categories');
        // $this->paginate = [
        //     'contain' => ['Categories']
        // ];
        // $books = $this->paginate($this->Books);

        //$this->set(compact('books'));
        // $this->set('_serialize', ['books']);

        
        $books = $this->Books->find('all',[
            'fields' => ['id','title','image','sale_price','slug'],
            'order' => ['created' =>'desc'],
            'limit' => 6,
            'conditions' => ['published'=>1],
            'paramType' =>'querystring',
            'contain' => ['Writers']
            ]);
        $this->set('books',$books);

        //Hiển thị menu categories lên trang chủ
        $categories = $this->Categories->find('all',[
            'order' => ['name'=>'asc']
            ]);
        $this->set('categories',$categories);
        $this->set('cakeDescription','Trang chủ: Books Store');
        
    }

    /**
     * latest_book method: hien thi 10 quyen sach moi nhat
     *
     * @return \Cake\Http\Response|void
     */
    public function latest() {
        $this->paginate = [
            'fields' => ['id','title','image','sale_price','slug'],
            'order' => ['created' =>'desc'],
            'limit' => 6,
            'conditions' => ['published'=>1],
            'contain' => ['Writers']
            ];
        $books = $this->paginate();
        $this->set('books',$books);
        $this->set('cakeDescription','Sách mới: Books Store');
    }

    public function hot() {
        $this->paginate = [
            'fields' => ['id','title','image','sale_price','slug'],
            'order' => ['created' =>'desc'],
            'limit' => 4,
            'conditions' => ['hot'=>1],
            'contain' => ['Writers']
            ];
        $hotbooks = $this->paginate();
        $this->set('hotbooks',$hotbooks);
        $this->set('cakeDescription','Sách bán chạy: Books Store');
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $book = $this->Books->find('all', [
            'contain' => ['Writers'],
            'conditions' => ['Books.slug'=>$slug]
        ])->first();
        if (empty($book)) {
            throw new NotFoundException(__('Không tìm thấy quyển sách này'));
        }
        $this->set('book', $book);
        //Hiển thị comment
        $this->loadModel('Comments');
        $comments = $this->Comments->find('all',[
            'conditions' => ['book_id'=>$book['id']],
            'order' => ['Comments.created ASC'],
            'contain' => ['Users']
            ]);
        $this->set('comments',$comments);
        //Hiển thị sách liên quan
        $related_books = $this->Books->find('all',[
            'fields' => ['title','image','sale_price','slug'],
            'conditions' => [
                'category_id' => $book['category_id'],
                'Books.id <>' => $book['id'] 
                ],
            'contain' => ['Writers'],
            'limit' => 3,
            'order' => 'rand()'
            ]);
        $this->set('related_books', $related_books);
        
        /*Báo lỗi xác thực dữ liệu khi gởi comment*/
        $session = $this->request->session();
        if($session->check('comment_errors')){
            $errors = $session->read('comment_errors');
            $this->set(compact('errors',$errors));
            $session->delete('comment_errors');
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $writers = $this->Books->Writers->find('list', ['limit' => 200]);
        $this->set(compact('book', 'categories', 'writers'));
        $this->set('_serialize', ['book']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Writers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $writers = $this->Books->Writers->find('list', ['limit' => 200]);
        $this->set(compact('book', 'categories', 'writers'));
        $this->set('_serialize', ['book']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Update comment_count trong books
     */
    /*public function updateComment(){
        $books = $this->Books->find('all',[
            'fields' => ['id'],
            'contain' => ['Comments']
            ]);
        $this->set('books',$books);
        foreach ($books as $book) {
            if(count($book['Comments']) > 0){
                $this->Books->updateAll(
                    ['Books.comment_count' => count($book['Comments'])],
                    ['Books.id' => $book['Books']['id']]
                );
            }
        }
    }*/

    /*Hàm xử lí get_keyword*/

    public function getKeyword(){
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->data());
            if ($this->Books->validator()) {
                $keyword = $this->request->data['keyword'];
            }else{
                $errors = $this->Books->errors($this->request->data);
                $session = $this->request->session();
                $session->write('search_validation',$errors);
            }
            $this->redirect(['action'=>'search','keyword'=>$keyword]);
        }
    }    
    /*
    add_to_cart
    */ 
    public function addToCart($id = null){
        if ($this->request->is('post')) {
            // tạo session
            $session=$this->request->session();
            // Tìm thông tin
            $book=$this->Books->find('all',[
                'recursive'=>-1,
                'conditions'=>['Books.id'=>$id]
                ])->first();
            if ($session->check('cart.'.$id)) {
                $item=$session->read('cart.'.$id);
                $item['quantity'] +=1;
            }else{
                $item = ['id'=>$book['id'],
                    'title'=>$book['title'],
                    'slug'=>$book['slug'],
                    'sale_price'=>$book['sale_price'],
                    'quantity'=>1
                ];
            }

            //create session cart
            $session->write('cart.'.$id,$item);
            $cart=$session->read('cart');
            $total = $this->Sum_Price($cart);
            $session->write('payment.total',$total);
            // kiểm tra mã giảm giá
            if ($session->check('payment.coupon')) {
                # code...
                $pay=$total-$session->read('payment.discount')/100*$total;
            }
            $this->Flash->success(' Đã thêm vào giỏ hàng!','default',['class'=>'alert alert-info'],'cart');
            $this->redirect($this->referer());
        }
    }
    /*
        xem chi tiết giỏ hàng
    */
        public function viewCart(){
            $session = $this->request->session();
            $cart = $session->read('cart');
            $payment = $session->read('payment');

            $this->set(compact('cart','payment'));
            $this->set('title_for_layout',"Giỏ Hàng");
        }
        /*
            xóa sản phẩm trong giỏ hàng
        */
        public function deleteSp($id = null){
            if ($this->request->is('post')) {
                # code...
                $session = $this->request->session();
                $session->delete('cart.'.$id);
                $cart = $session->read('cart');
                if (empty($cart)) {
                    $this->emptyCart();
                    # code...
                }else{
                    $total = $this->Sum_Price($cart);
                    $session->write('payment.total',$total);
                }
                $this->redirect($this->referer());
            }
        }
    /*
        empty cart
    */
        public function emptyCart(){
            if ($this->request->is('post')) {
                # code...
                $session=$this->request->session();
                $session->delete('cart');
                $session->delete('payment.total');
                $session->delete('payment.coupon');
                $this->redirect($this->referer());
            }
        }

        /*
        update quantity
        */
        public function quantityUpdate(){
             if ($this->request->is('post')) {
                $session=$this->request->session();
                $id = $this->request->getData(['bookId']);
                $book = $session->read('cart.'.$id);
                $oldQuantity = $book['quantity'];
                $newQuantity = $this->request->getData(['quantity']);
                if ($newQuantity > 0 && $newQuantity != $oldQuantity) {
                    $book['quantity'] = $newQuantity;
                    $session->write('cart.'.$id, $book);
                    $cart = $session->read('cart');
                    $total = $this->Sum_Price($cart);
                    $session->write('payment.total', $total);
                }
            }
            $this->redirect($this->referer());
        }
        
    /**
     * search
     */
    public function search(){
        $notfound = false;
        if(!empty($this->request->query['keyword'])){
            $keyword = $this->request->query['keyword'];
            $this->paginate = [
                'fields'=>['id','title','image','sale_price','slug'],
                'contain' => ['Writers'],
                'limit' => 6,
                'group' => 'Books.id',
                'order' => ['Books.created' => 'desc'],                    
                'conditions' => [
                'Books.published' => 1,
                'or'=>[
                    'Books.title like' => '%'.$keyword.'%',
                    'name like' => '%'.$keyword.'%']
                ],
                'join' => [
                    [
                    'table' => 'Books_Writers',
                    'type' => 'INNER',
                    'alias' => 'BookWriter',
                    'conditions' => 'BookWriter.book_id = Books.id'
                    ],
                    [
                    'table' => 'Writers',
                    'type' => 'INNER',
                    'alias' => 'Writer',
                    'conditions' => 'BookWriter.writer_id = Writer.id'
                    ]
                ]                    
            ];
            $books = $this->paginate('Books');

            if (empty($books)) {
                $notfound = true;
            }else {
                $this->set('results',$books);
            }
            $this->set('keyword',$keyword);
        }       

        $session = $this->request->session();
        if($session->check('search_validation')){
            $errors = $session->read('search_validation');
            $this->set('errors',$errors);
            $session->delete('search_validation');
        }      

        $this->set('notfound',$notfound);
    }
}
