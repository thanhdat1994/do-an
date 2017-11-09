<?php
namespace App\Controller;

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
        $coupons = $this->paginate($this->Coupons);

        $this->set(compact('coupons'));
        $this->set('_serialize', ['coupons']);
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
        if ($this->request->is('post')) {
            # code...
            $session = $this->request->session();
            $code = $this->request->getData('code');
            /*$coupon = $this->Coupons->findByCode($code);*/
            $coupon = $this->getCoupon($code);
            if (!empty($coupon)) {
                # code...
                $today = date('Y-m-d H:i:s');
                if($this->between($today,$coupon['time_start'],$coupon['time_end'])) {
                    # code...
                        $session->write('payment.coupon',$coupon['code']);
                        $session->write('payment.discount',$coupon['percent']);
                        $total = $session->read('payment.total');
                        $pay = $total - $coupon['percent']/ 100 * $total;
                        $session->write('payment.pay',$pay);
                }else{
                     $this->Flash->error('Mã giảm giá đã hết hạn!',['default',['class'=>'alert alert-danger'],'coupons']);
                }
            }else{
                $this->Flash->error('Mã giảm giá không tồn tại!',['default',['class'=>'alert alert-danger'],'coupons']);
            }
            $this->redirect($this->referer());
        }
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
        $coupon = $this->Coupons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
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
