<?php
namespace Patient\Controller;
use Think\Controller;
class AppointmentController extends Controller {
  public function index(){
      $doc = M("Doctor");
      $list= $doc->order('doctor_id')->limit(3)->select();
      $this->assign('list',$list);
      $this->display('index');
  }
  public function getThreeMore(){
    $doc = M("Doctor");
    $num = intval($_GET['num']);
    $start = $num*3;
    $list= $doc->order('doctor_id')->limit($start,3)->select();
    echo json_encode($list);
    
  }
}
