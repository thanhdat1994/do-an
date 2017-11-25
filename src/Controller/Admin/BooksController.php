<?php
namespace App\Controller\Admin;

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
        $this->viewBuilder()->layout('admin');
        $categories = $this->Books->Categories->find('list');
        $books = $this->Books->newEntity();
        if($this->request->is(array('post','put'))){
            $books = $this->Books->patchEntity($books, $this->request->data());
            $name = $this->request->data['name'];            
            if(!empty($name)){
                $this->paginate = [
                    'order' => ['Books.title' => 'desc'],
                    'contain' => ['Categories'],
                    'limit' => 20,
                    'conditions' => ['Books.title like' => '%'.$name.'%']
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
        $this->viewBuilder()->layout('admin');
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
}
