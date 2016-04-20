<?php
namespace Home\Controller;
use Think\Controller;
  class LoginController extends Controller {
      public function index(){
          $this->display('index');
      }
  	public function signup(){
  		$this->display('signup');
  		}
      public function checkLogin($userType='',$name='',$id_card=''){
       if ($userType==1) {//如果登陆角色是患者
         if (isset($_SESSION['current_user'])&&(md5($name.$id_card)==$_SESSION['current_user']['user'])){

           $data['status'] = 2;//0,用户名或身份证错误;1,验证成功;2,用户已经登陆
           $data['info'] = "用户已经登陆!自动跳转中...";
           $data['url'] =  "Patient-Appointment-index";
         $this->ajaxReturn($data);

         }
         if (!empty($name)&&!empty($id_card)) {
               $Patient = new \Think\Model("Patient");
               $map['idCard_num'] = $id_card;
               $map['name'] = $name;
               $array = $Patient->where($map)->select();
               $count = count($array);
               if ($count==1){
                 session(array('name'=>'current_user','expire'=>3600));
                 session('current_user.user',md5($name.$id_card));
                 session('current_user.user_type','patient');
                   session('current_user.user_id',$array[0]['patient_id']);
                 // $_SESSION['current_user'] = array(
                 //   'user_id' => $array[0]['patient_id'],
                 //   'user_type' => 'patient');
                   $data['status'] = 1;
                   $data['info'] = "验证成功";
                   $data['session'] = $_SESSION['current_user'];
                 $this->ajaxReturn($data);


               }else{
               $this->error("用户名或身份证号错误");

               }
         }
       }elseif ($userType==0) {//如果登陆角色是医生
         
       }


      }
      public function checkIdUnique($id='') {
          if (!empty($id)) {
              $Patient = new \Think\Model("Patient");
              if ($Patient->getByIdCard_num($id)) {

                  $this->error('该身份证号已注册过!');
              } else {

                $this->success("身份证可以使用");

              }
          } else {
              $this->error('身份证号不能为空!');
          }
      }

      public function insert() {
                 $Patient = new \Patient\Model\PatientModel();
                //  $_POST['create_time'] = time();
                 if ($Patient->create()) {
                      if  ($_POST['veriCode'] == 0){//短信验证码不正确

                      }
                     if ($Patient->add()) {
                           $this->success("注册成功!");

                     } else {
                           $this->error("注册失败!");

                     }
                 } else {
                     exit($this->error($Patient->getError()));
                 }

             }
      public function verify_c(){
      $Verify = new \Think\Verify();
  	$Verify->fontSize = 18;
  	$Verify->length   = 4;
  	$Verify->useNoise = false;
  	$Verify->codeSet = '0123456789QWERTYUIOPASDFGHJKLZXCVBNM';
  	$Verify->imageW = 130;
  	$Verify->imageH = 50;
  	//$Verify->expire = 600;
  	$Verify->entry();
  }
}
?>
