<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Utility\Inflector;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
   /* public $components = ['Tool'];*/
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

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
            'logoutRedirect' => [
                'controller' => 'Books',
                'action' => 'index'
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add','quantityUpdate','emptyCart','inFo','addToCart','confirm','index', 'latest', 'view', 'getKeyword', 'search', 'menu','viewCart','changePassword','signup','login','forgot','contactMe']);
        $this->set('user_info', $this->get_user());
        $this->set('categories', $this->menu_categories());
        $this->set('writers', $this->menu_writers());
    }

    public function get_user()
    {
        return $this->Auth->user();
    }

    public function menu_categories()
    {
        $this->loadModel('Categories');
        $categories = $this->Categories->find('all',[
            'order' => ['name'=>'asc']
            ]);
        return $categories;
    }

    public function menu_writers()
    {
        $this->loadModel('Writers');
        $writer = $this->Writers->find('all',[
            'order' => ['name' => 'asc']
            ]);
        return $writer;
    }

    public function getCoupon($code){
        $coupons = $this->Coupons->find('all',['conditions'=>['Coupons.code'=>$code]])->first();
        return $coupons;
    }

    /* tính tổng giá trị giỏ hàng*/
    public function Sum_Price($cart){
        $total=0;
        foreach ($cart as $book) { 
                # code...
            $total += $book['quantity']*$book['sale_price'];
        }
        return $total;
    }

    /* kiểm tra coupon còn hạn hay không*/
    public function between($date, $start, $end, $timezone = 'Asia/Ho_Chi_Minh'){
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
        }
    public function generate_code(){
        $random_number = rand(100000,999999);
        $code = md5($random_number);
        return $code;
    }

    public function stripUnicode($string){
        if(!$string) return false;
        $unicode = array(
          'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
          'd'=>'đ|Đ',
          'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
          'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
          'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
          'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
          'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach($unicode as $nonUnicode=>$uni) $string = preg_replace("/($uni)/i",$nonUnicode,$string);
        return $string;
    }

    public function slug($string, $character = '-'){
        $string = $this->stripUnicode($string);
        //App::uses('Inflector', 'Utility');
        $string = Inflector::slug($string, $character);
        return strtolower($string);
    } 

    /*public function check_slug($data, $name, $temp, $slug_field = 'slug'){
        if(empty($temp[$slug_field])){
            $temp[$slug_field] = $this->slug($temp[$name]);
        }else{
            $temp[$slug_field] = $this->slug($temp[$slug_field]);
        }
    }*/
}
?>