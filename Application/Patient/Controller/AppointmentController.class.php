<?php
namespace Patient\Controller;
use Think\Controller;
class AppointmentController extends Controller {
  public function index(){
      $doc = M("Doctor");
      $list= $doc->field('doctor_id,name,title,department,specialism,order_cost as cost')->order('doctor_id')->limit(3)->select();
      $this->assign('list',$list);
      $this->display('index');
  }
  public function getMore($num){
    $doc = M("Doctor");
    $start = $num+2;
    $list= $doc->field('doctor_id,name,title,department,specialism,order_cost as cost')->order('doctor_id')->limit($start,1)->select();
    if (count($list)==0){
      echo json_encode(null);
      return;
    }
    echo json_encode($list);

  }
  public function getIntro($id){
    $doc = M("Doctor");
    $map['doctor_id'] = $id;
    $intro = $doc->field('intro,treatment_period as period,work_days')->where($map)->select();
    echo json_encode($intro);
  }
}
