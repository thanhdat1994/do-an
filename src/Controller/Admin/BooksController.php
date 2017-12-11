<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validator;
use Cake\Filesystem\File;
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
        $this->viewBuilder()->layout('admin');
        $categories = $this->Books->Categories->find('list');
        $books = $this->Books->newEntity();
        if($this->request->is(array('post','put'))){
            $books = $this->Books->patchEntity($books, $this->request->data());
            $name = $this->request->data['name'];
            $category = $this->request->data['category_id'];            
            if(!empty($name)){
                $this->paginate = [
                    'order' => ['Books.title' => 'desc'],
                    'contain' => ['Categories'],
                    'limit' => 20,
                    'conditions' => ['Books.title like' => '%'.$name.'%']
                ];
            }
            if(!empty($category)){
                $this->paginate = [
                    'order' => ['Books.title' => 'desc'],
                    'contain' => ['Categories'],
                    'limit' => 20,
                    'conditions' => ['Books.category_id ' => $category]
                ];
            }
            $books = $this->paginate('Books');
            $this->set('books', $books);
        }else{
            $this->paginate = [
             'contain' => ['Categories'],
             'limit' => 20
            ];
            $books = $this->paginate($this->Books);
            $this->set(compact('books'));
            $this->set('_serialize', ['books']);
        }
        $this->set('categories', $categories);
        
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
        $this->viewBuilder()->layout('admin');
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
        $this->viewBuilder()->layout('admin');
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            
            //Tạo slug
            if(empty($book['slug'])){
                $book['slug'] = $this->slug($book['title']);
            }else{
                $book['slug'] = $this->slug($book['slug']);
            }

            // format date
            $date_push = str_replace('/', '-', $this->request->data['publish_date']);
            $date_push = date('Y-m-d', strtotime($date_push));
            $book['publish_date'] = $date_push;

            //save image
            $category_id = $this->Categories->find('all', ['conditions'=>['id'=>$book['category_id']]])->first();            
            $folder = $category_id['slug'];

            $arr = explode('.', $book['data']['image']['name']);
            $ext = end($arr);
            $filename = $book['slug'].'.'.$ext;
            $file = new File($book['data']['image']['tmp_name']);
            $file->copy(WWW_ROOT.'files/'.$folder.'/'.$filename);
            $book['image'] = '/webroot/files/'.$folder.'/'.$filename;
            
            //pr($book);die;

            if ($this->Books->save($book)) {                
                $this->Flash->success(__('Đã thêm sách thành công.'));

                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại.'));
            }
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
        $this->viewBuilder()->layout('admin');
        $book = $this->Books->get($id, [
            'contain' => ['Writers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            //Tạo slug
            $book['slug'] = $this->slug($book['title']);

            // format date
            $date_push = str_replace('/', '-', $this->request->data['publish_date']);
            $date_push = date('Y-m-d', strtotime($date_push));
            $book['publish_date'] = $date_push;

            //save image
            $category_id = $this->Categories->find('all', ['conditions'=>['id'=>$book['category_id']]])->first();            
            $folder = $category_id['slug'];

            $arr = explode('.', $book['data']['image']['name']);
            $ext = end($arr);
            $filename = $book['slug'].'.'.$ext;
            $file = new File($book['data']['image']['tmp_name']);
            $file->copy(WWW_ROOT.'files/'.$folder.'/'.$filename);
            $book['image'] = '/webroot/files/'.$folder.'/'.$filename;

            //pr($book);die;
            if ($this->Books->save($book)) {
                $this->Flash->success(__('Đã cập nhật sách thành công.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại.'));
        }
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $writers = $this->Books->Writers->find('list', ['limit' => 200]);
        /*if (!empty($this->request->data['Writers'])) {
            foreach ($this->request->data['Writers'] as $writer) {
                $writerList[] = $writer['name'];
            }
            $writers = implode(', ', $writerList);
        } else {
            $writers = null;
        }*/
        $date_push = $book['publish_date'];
        $date_push = date('d/m/Y', strtotime($date_push));
        $this->set(compact('book', 'categories', 'writers'));
        $this->set('_serialize', ['book']);
        $this->set('dateDeal', $date_push);
       //pr($book);die;
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
        $url = substr($book['image'], 9);
        $file = new File(WWW_ROOT.$url);
        $file->delete();
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('Đã xóa sách thành công.'));
        } else {
            $this->Flash->error(__('Không thể xóa. Vui lòng thử lại.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function check_writer($writers_list = null){
        $writers = explode(',', $writers_list);
        $this->loadModel('Writers');
        foreach ($writers as $writer) {
            $slug = $this->slug($writer);
            $writer_info = $this->Writers->find('all', ['conditions'=>['slug'=>$slug]])->first();
            if(empty($writer_info)){
                $data = [
                    'name' => ucwords(trim($writer)),
                    'slug' => $slug,
                    'biography' => 'Đang cập nhật'
                ];
                $this->Writers->create();
                $this->Writers->save($data);
                //$save_info[] = $this->Writers->get()
            } else{
                 $saveInfo[] = $writerInfo['id'];
            }
        }
        $this->request->data['Writer'] = $saveInfo;
    }
}
