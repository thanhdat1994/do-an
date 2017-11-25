<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->Auth->config('authenticate', ['Form']);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => '/login',
            'authError' => 'Bạn cần phải đăng nhập để tiếp tục',
            'flash' => [
                'element' => 'default',
                'key' => 'auth',
                'params' => ['class'=>'alert alert-danger']
            ],
            'loginRedirect' => '/'
        ]);        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       $this->paginate = ['contain' => ['Groups']];
        $this->viewBuilder()->layout('admin');
        $users = $this->Users->newEntity();
        if($this->request->is(array('post','put'))){
            $users = $this->Users->patchEntity($users, $this->request->data());
            $name = $this->request->data['name'];            
            if(!empty($name)){
                $this->paginate = [
                    'order' => ['Users.id' => 'desc'],
                    'contain' => ['Groups'],
                    'limit' => 20,
                    'conditions' => ['Users.username like' => '%'.$name.'%']
                ];
            }
            $users = $this->paginate('Users');
            $this->set('users', $users);
        }else{
            $this->paginate = [
             'contain' => ['Groups'],
             'limit' => 20
            ];
            $users = $this->paginate($this->Users);
            $this->set(compact('users'));
            $this->set('_serialize', ['users']);
        }
        $this->set('users', $users);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Comments', 'Orders']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
                //return $this->redirect(['controller'=>'books','action'=>'index']);           
            }
            $this->Flash->error(__('Sai tên đăng nhập hoặc mật khẩu.'));
        }
        // $password = "admin";
        // $hasher = new DefaultPasswordHasher();
        
        // $this->set('pass',$hasher->hash($password));
        $this->set('cakeDescription','Đăng nhập');        
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function changePassword(){
        if($this->request->is('post')){
            $user = $this->Users->get($this->Auth->user('id'));
            //if($this->Users->validator()){
                $user = $this->Users->patchEntity($user, [
                    'password'  => $this->request->data['password'],
                    'confirm_password'      => $this->request->data['confirm_password']
                ]);
                if(strcmp($this->request->data['password'], $this->request->data['confirm_password']) != 0){                    
                    $this->Flash->error(__('Xác nhận mật khẩu không đúng', ['class'=>'alert alert-danger']));
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success('Đổi mật khẩu thành công!');
                        $this->redirect(['controller' => 'books', 'action' => 'index']);
                    } else {
                        $this->Flash->error('Có lỗi xảy ra. Vui lòng thử lại!');
                    }
                }
            /*} else{
                $errors = $this->Users->errors($this->request->data);
                $session = $this->request->session();
                $session->write('errors',$errors);
            }*/
        }
        $this->set('cakeDescription','Đổi mật khẩu');
    }

    public function signup(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //Ngày tạo
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $this->request->data['created'] = date('Y-m-d H:i:s');
            $this->request->data['group_id'] = 2;
            $user = $this->Users->patchEntity($user, $this->request->data);

            //kiểm tra password
            if(strcmp($this->request->data['password'], $this->request->data['confirm_password']) != 0){
                $this->Flash->error('Xác nhận mật khẩu không đúng');
                return $this->render('signup');
            }

            //Kiểm tra username
            $username = $this->Users->find('all',[
                'conditions' => ['username' => $this->request->data['username']]
            ])->first();
            if(!empty($username)){
                $this->Flash->error('Tên đăng nhập đã tồn tại');
                return $this->render('signup');
            }

            //Kiểm tra email
            $email = $this->Users->find('all',[
                'conditions' => ['email' => $this->request->data['email']]
            ])->first();
            if(!empty($email)){
                $this->Flash->error('Email đã tồn tại');
                return $this->render('signup');
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Đăng kí tài khoản thành công.'));

                return $this->redirect(['action' => 'login']);
            }
            //$this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại', 'flash_messages', ['type' => 'error']));
        }
        $this->set('cakeDescription','Đăng kí');
    }

    public function changeInfo(){
        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            //pr($user);die;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Đã thay đổi thông tin thành công'));

                return $this->redirect(['controller' => 'Books' ,'action' => 'index']);
            } else{
                $this->Flash->error(__('Có lỗi xảy ra. Vui lòng thử lại'));
                return $this->render('changeInfo');
            }            
        } else{
            $this->set(compact('user'));
        }        
        $this->set('cakeDescription', 'Cập nhật thông tin');
    }
    public function active($id = null){
        $this->request->allowMethod(['post', 'active']);
        $user = $this->Users->newEntity();
        $user = $this->Users->get($id);
        
        if ($user['active'] == 1) {
            $user['active'] = 0;
            $this->Users->save($user);
            $this->Flash->success(__('Disable!'));
        } else {
            $user['active'] = 1;
            $this->Users->save($user);
            $this->Flash->success(__('User Activeted!'));
        }

        return $this->redirect($this->referer());
    }
}
