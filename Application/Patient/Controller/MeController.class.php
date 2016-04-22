<?php
namespace Patient\Controller;
use Think\Controller;
class MeController extends Controller {
  public function index() {
      if(session("?current_user")&&(session("current_user.user_type")=="patient")){
        $pat = M("Patient");
        $query['patient_id'] = session("current_user.user_id");
        $data = $pat->where($query)->find();
        $this->assign('name',$data['name']);
        $this->assign('gender',$data['gender']==1?"男":"女");
        $this->assign('phone',$data['phone']);
        $this->assign('id_card',$data['id_card']);
        $this->assign('location',$data['location']);
        $this->display('index');
      }else{

        $this->error("进入个人中心请先登录!","Home-Login-Index");
      }

  }
  public function logOut(){
    session("current_user",null);
    $this->success("注销成功，正在转跳至登陆界面!","Home-Login-Index");
  }
}
