<?php
namespace Patient\Controller;
use Think\Controller;
class MyOrdersController extends Controller {
  public function index() {
        if(session("?current_user")&&(session("current_user.user_type")=="patient")){

              $this->display('index');
        }else{

          $this->error("查看我的预约请先登录!","Home-Login-Index");
      }
  }
  public function getOrders($time=1){
    $orders =new \Patient\Model\OrderModel("Order");
    $list = array();
    $patient_id = session("current_user.user_id");
    if ($time==1){
    $list = $orders->relation('Doctor')->where('patient_id=\''.$patient_id.'\'AND date>=\''.date("Y-m-d").'\'')->order('date desc')->select();
  }elseif ($time==0){
      $list = $orders->relation('Doctor')->where('patient_id=\''.$patient_id.'\'AND date<\''.date("Y-m-d").'\'')->order('date desc')->select();
    }
    echo json_encode($list);
  }
  public function orderDetail($id){
    $orders =new \Patient\Model\OrderModel("Order");
    $patient_id = session("current_user.user_id");
    $condition['order_id'] = $id;
    $order = $orders->$orders->where($condition)->find(1);

  }

}
