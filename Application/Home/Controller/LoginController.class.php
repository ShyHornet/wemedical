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
      public function checkLogin($name='',$id_card=''){
        if (!empty($name)&&!empty($id_card)) {
              $Patient = new \Think\Model("Patient");
              $map['idCard_num'] = $id_card;
              $map['name'] = $name;
              $count = count($Patient->where($map)->select());
              if ($count==1){
                $this->success("验证成功");

              }else{
              $this->error("用户名或身份证号错误");

              }
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
