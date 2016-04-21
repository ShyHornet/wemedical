<?php
namespace Patient\Controller;
use Think\Controller;
class AppointmentController extends Controller {
  public function index() {
      $this->display('index');
  }
  public function getDoc($num,$date = null){
    $doc =new \Doctor\Model\DoctorModel("Doctor");
    if ($num>1){
      $num += 2;
    }
    $start = $num;
    $num_per_time = $num==1?3:1;
    $dateConvert = date('Y-n-d',strtotime($date));
    $week =date('w', strtotime($date));
    // echo $week;
    $fields = array('doctor_id','name','title','department','specialism','order_cost' =>'cost','orders_per_day','treatment_period' =>'period','work_days');
     $list= $doc->relation('Order')->field($fields)->order('doctor_id')->where("work_days like'%".$week."%'")->limit($start,$num_per_time)->select();

     if (count($list)==0) {
       echo null;
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

  public function proccessOrder($doc_id,$date){
    if(session('?current_user')&&(session('current_user.user_type')=='patient')){
    $order = new \Patient\Model\OrderModel();
    $data = array();
    $data["doctor_id"] = $doc_id;
    $data["patient_id"] = session('current_user.user_id');
    $data["date"] = $date;
    $order->data($data)->add();
    $returnInfo['status']=0;
    $returnInfo['info']="挂号成功!";
     $this->ajaxReturn($returnInfo);
   }else {
     $this->error("预约请先登录!",'Home-Login-Index');

   }
   }

  }
