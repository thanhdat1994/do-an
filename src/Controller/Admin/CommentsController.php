<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[] paginate($object = null, array $settings = [])
 */
class CommentsController extends AppController
{
    /*public function beforeFilter(Event $event)
    {
        parent::beforeFilter();
        $this->Auth->allow(['add']);
    }*/

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = ['contain' => ['Users','Books']];
        $this->viewBuilder()->layout('admin');
        $comments = $this->Comments->newEntity();
        if($this->request->is(array('post','put'))){
            $comments = $this->Comments->patchEntity($comments, $this->request->data());
            $name = $this->request->data['name'];            
            if(!empty($name)){
                $this->paginate = [
                    'order' => ['Comments.id' => 'desc'],
                    'contain' => ['Books','Users'],
                    'limit' => 20,
                    'conditions' => ['Books.title like' => '%'.$name.'%']
                ];
            }
            $comments = $this->paginate('Comments');
            $this->set('comments', $comments);
        }else{
            $this->paginate = [
             'contain' => ['Books','Users'],
             'limit' => 20
            ];
            $comments = $this->paginate($this->Comments);
            $this->set(compact('comments'));
            $this->set('_serialize', ['comments']);
        }
        $this->set('comments', $comments);
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => ['Users', 'Books']
        ]);

        $this->set('comment', $comment);
        $this->set('_serialize', ['comment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if($this->Comments->validator()){
                if ($this->Comments->save($comment)) {
                    $this->Flash->success(__('Đã gởi nhận xét.'));               
                }else{
                    $this->Flash->error(__('Không gởi được nhận xét.'));
                }            
            }else{
                $comment_errors = $this->Comments->errors;
                $session = $this->request->session();
                $session->write('comment_errors',$comment_errors);
            }
            $this->redirect($this->referer());          
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $users = $this->Comments->Users->find('list', ['limit' => 200]);
        $books = $this->Comments->Books->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'users', 'books'));
        $this->set('_serialize', ['comment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
