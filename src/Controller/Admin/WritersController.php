<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Writers Controller
 *
 * @property \App\Model\Table\WritersTable $Writers
 *
 * @method \App\Model\Entity\Writer[] paginate($object = null, array $settings = [])
 */
class WritersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        //search writers
        $writers = $this->Writers->newEntity();
        if($this->request->is(array('post','put'))){
            $writers = $this->Writers->patchEntity($writers, $this->request->data());
            $name = $this->request->data['name'];            
            if(!empty($name)){
                $this->paginate = [
                    'fields' => ['id','name','slug','biography','created'],
                    'order' => ['Writers.name' => 'desc'],
                    'conditions' => ['Writers.name like' => '%'.$name.'%']
                ];
            }
            $writers = $this->paginate('Writers');
            $this->set('writers', $writers);
        }else{
            $writers = $this->paginate($this->Writers);
            $this->set(compact('writers'));
            $this->set('_serialize', ['writers']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Writer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $writer = $this->Writers->find('all', [
            'contain' => ['Books'],
            'conditions' => ['Writers.slug'=>$slug]
        ])->first();

        if (empty($writer)) {
            throw new NotFoundException(__('Không tìm thấy tác giả này'));
        }    

        $this->set('writer', $writer);
        //Phân trang dữ liệu book liên quan
        $this->paginate = [
            'fields' => ['id','title','image','sale_price','slug'],
            'order' => ['created' =>'desc'],
            'limit' => 9, 
            'contain' => ['Writers'],
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
                ],
            'conditions' => ['published'=>1,'Writer.slug'=>$slug]            
            ];
        $books = $this->paginate('Books');
        $this->set('books',$books);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        /*$writer = $this->Writers->newEntity();
        if ($this->request->is('post')) {
            $writer = $this->Writers->patchEntity($writer, $this->request->getData());
            if ($this->Writers->save($writer)) {
                $this->Flash->success(__('The writer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The writer could not be saved. Please, try again.'));
        }
        $books = $this->Writers->Books->find('list', ['limit' => 200]);
        $this->set(compact('writer', 'books'));
        $this->set('_serialize', ['writer']);*/

        $this->viewBuilder()->layout('admin');
        $writer = $this->Writers->newEntity();
        if ($this->request->is('post')) {
            $writer = $this->Writers->patchEntity($writer, $this->request->getData());
            if ($this->Writers->save($writer)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('writer'));
        $this->set('_serialize', ['writer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Writer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $writer = $this->Writers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $writer = $this->Writers->patchEntity($writer, $this->request->getData());
            if ($this->Writers->save($writer)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('writer'));
        $this->set('_serialize', ['writer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Writer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $this->request->allowMethod(['post', 'delete']);
        $writer = $this->Writers->get($id);
        if ($this->Writers->delete($writer)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
