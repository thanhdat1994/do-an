<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[] paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /*checkout*/
    public function checkout(){
        $user_info = $this->get_user();
        $session=$this->request->session();
        if($this->request->is('post')){
            # code...
            $order = $this->Orders->newEntity();
            $customer = ['name'=>$this->request->getData('name'),
                'email'=>$this->request->getData('email'),
                'address'=>$this->request->getData('address'),
                'phone'=>$this->request->getData('phone')
            ];
            $user_info = $this->get_user();
            $data = ['user_id'=>$user_info['id'],
            'customer_info'=>json_encode($customer),
            'orders_info'=>json_encode($session->read('cart')),
            'payment_info'=>json_encode($session->read('payment')),
            'status'=>0
            ];
            $order = $this->Orders->patchEntity($order,$data);
            if($this->Orders->save($order)){
                # code...
                $session->delete('cart');
                $session->delete('payment');
            }else{
                $this->Flash->error("Thanh toán không thực hiện được!",'default',['class'=>"alert alert-danger",'orders']);
            }
        }
        $this->Flash->success(' Thực hiện đặt hàng thành công!','default',['class'=>'alert alert-info'],'orders');
        $this->redirect(['action' => 'history']);
    }

    public function history(){
        $user_info = $this->get_user();
        $order = $this->Orders->find('all',[
            'conditions' => ['user_id' => $user_info['id']],
            'order' => ['created' => 'desc']
        ]);
        $this->set('orders', $order);
        $this->set('cakeDescription','Lịch sử mua hàng');
    }

    public function detail($id = null){
        $order = $this->Orders->get($id);
        if(!empty($order)){
            $user_info = $this->get_user();
            if($user_info['id'] == $order['user_id']){
                $this->set('order', $order);                
            }
        }
        $this->set('cakeDescription','Chi tiết đơn hàng');
    }
}
