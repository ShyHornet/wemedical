<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function login(){
        $this->display('login');
    }
	public function signup(){
		$this->display('signup');
		}
    public function checkIdUnique($id='') {
        if (!empty($id)) {
            $Form = M("Patient");
            if ($Form->getByIdCard_num($id)) {

                $this->error('该身份证号已注册过!');
            } else {

              $this->success("");

            }
        } else {
            $this->error('身份证号不能为空!');
        }
    }

    public function insert() {
               $Patient = D("Patient");
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
