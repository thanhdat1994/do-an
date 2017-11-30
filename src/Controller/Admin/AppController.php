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
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Filesystem\File;
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
        $this->Auth->allow(['index', 'latest', 'view', 'getKeyword', 'search', 'menu','viewCart','changePassword','signup','login']);
        $this->set('user_info', $this->get_user());
    }

    public function get_user()
    {
        return $this->Auth->user();
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
        App:uses('Inflector', 'Utility');
        $string = Inflector::slug($string, $character);
        return strtolower($string);
    } 

    public function check_slug($data, $name, $temp ,$slug_field = 'slug'){
        if(empty($temp[$slug_field])){
            $temp[$slug_field] = $this->Slug($temp[$name]);
        }else{
            $temp[$slug_field] = $this->Slug($slug_field]);
        }
    }

    public function upload_image($image_details, $size, $category, $obj="tmp"){
        $file_path = "";
        $image_name = $image_details['name'];
        $uploaded_image = $image_details['tmp_name'];

        $filename = stripslashes($image_details['name']);
        $extension = strtolower($this->_getExtension($filename));
        $arr_extension = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($extension, $arr_extension)) {
            if($extension == "jpg" || $extension == "jpeg" ) {
                $src = imagecreatefromjpeg($uploaded_image);

            } else if($extension == "png"){
                $src = imagecreatefrompng($uploaded_image);

            } else {
                $src = imagecreatefromgif($uploaded_image);
            }

            list($width, $height) = getimagesize($uploaded_image);
            $width_config = $size;
            $new_width = $width;
            $new_height = $height;

            if ($width > $width_config) {
                $new_width = $width_config;
                $new_height = ($height/$width)*$new_width;
            }

            $temp = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($temp, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            $new_image_name = $this->getAppCurSalon() . strtotime("now") . "." . $extension;

            $dir_storage = "files" . DS. $category;

            if (!file_exists($dir_storage)) {
                mkdir($dir_storage, 0777, true);
            }

            $new_image = $dir_storage . DS . $new_image_name;
            $dir_image_web = "webroot/files/". $category."/" . $new_image_name;

            imagejpeg($temp, $new_image, 100);
            imagedestroy($src);
            imagedestroy($temp);
            $file_path = $dir_image_web;
        }

        return $file_path;
    }

    public function uploadFile($image, $folder, $filename){
      $file = new File($image);
      if($file->copy(WWW_ROOT.'files/'.$folder.'/'.$filename)){
        return true;
      }else{
        return false;
      }
    }
}
?>