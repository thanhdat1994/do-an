<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Coupons Controller
 *
 * @property \App\Model\Table\CouponsTable $Coupons
 *
 * @method \App\Model\Entity\Coupon[] paginate($object = null, array $settings = [])
 */
class CouponsController extends AppController
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
        $this->viewBuilder()->layout('admin');
        $coupons = $this->Coupons->newEntity();
        if($this->request->is(array('post','put'))){
            $coupons = $this->Coupons->patchEntity($coupons, $this->request->data());
            $name = $this->request->data['code'];            
            if(!empty($name)){
                $this->paginate = [
                    'fields' => ['id','code','percent','description','time_start','time_end','created'],
                    'order' => ['Coupons.code' => 'desc'],
                    'conditions' => ['Coupons.code like' => '%'.$name.'%']
                ];
            }
            $coupons = $this->paginate('Coupons');
            $this->set('coupons', $coupons);
        }else{
            $coupons = $this->paginate($this->Coupons);
            $this->set(compact('coupons'));
            $this->set('_serialize', ['coupons']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => []
        ]);

        $this->set('coupon', $coupon);
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $coupon = $this->Coupons->newEntity();
        if ($this->request->is('post')) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }*/

    /* add coupons*/
    public function add(){
         $this->viewBuilder()->layout('admin');
        $coupon = $this->Coupons->newEntity();
        if ($this->request->is('post')) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());

            /*format time_start*/
            $time_start = str_replace('/', '-', $this->request->data['time_start']);
            $time_start = date('Y-m-d',strtotime($time_start));
            $coupon['time_start'] = $time_start;

            /*format time_end*/
            $time_end = str_replace('/', '-', $this->request->data['time_end']);
            $time_end = date('Y-m-d',strtotime($time_end));
            $coupon['time_end'] = $time_end;

            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $coupon = $this->Coupons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            
            /*format time_start*/
            $time_start = str_replace('/', '-', $this->request->data['time_start']);
            $time_start = date('Y-m-d',strtotime($time_start));
            $coupon['time_start'] = $time_start;

            /*format time_end*/
            $time_end = str_replace('/', '-', $this->request->data['time_end']);
            $time_end = date('Y-m-d',strtotime($time_end));
            $coupon['time_end'] = $time_end;

            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $this->request->allowMethod(['post', 'delete']);
        $coupon = $this->Coupons->get($id);
        if ($this->Coupons->delete($coupon)) {
            $this->Flash->success(__('The coupon has been deleted.'));
        } else {
            $this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /*create function check coupon*/
    /*public function between($date, $start, $end, $timezone = 'Asia/Ho_Chi_Minh'){
            date_default_timezone_set($timezone);
            $date = strtotime($date);
            $start = strtotime($start);
            $end = strtotime($end);
            if ($date >= $start && $date <=$end) {
                # code...
                return true;
            }else{
                return false;
            }
        }*/
}
