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
    $orders =new \Patient\Model\OrderModel();
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
    $week = ["星期一","星期二","星期三","星期四","星期五"];
    $orders = new \Patient\Model\OrderModel();
    $patient_id = session("current_user.user_id");
    $order = $orders->where("order_id = '".$id."'")->relation(true)->find();

    $this->assign("date","<a>".$order['date']."</a>");
    $this->assign("week","<a>".$week[date('w',strtotime($order['date'])-1)]."</a>");
    $this->assign("period","<a>".($order['period']==0?"上午":"下午")."</a>");
    $this->assign("department","<a>".$order['dpt']."</a>");
    $this->assign("doc_gender","<a>".($doc_gender = $order['doc_gender']==1?"男":"女")."</a>");
    $this->assign("pat_gender","<a>".($pat_gender = $order['doc_gender']==1?"男":"女")."</a>");
    $this->assign("doc_name","<a>".$order['doc_name']."</a>");
    $this->assign("pat_name","<a>".$order['pat_name']."</a>");
    $this->assign("department1","<a>".$order['dpt']."</a>");
    $this->assign("title","<a>".$order['title']."</a>");
    $this->assign("title1","<a>".$order['title']."</a>");
    $this->assign("cost","<a>".$order['cost']." ￥</a>");
    $this->assign("specialism","<a>".$order['specialism']."</a>");
    $this->assign("intro","<a>".$order['intro']."</a>");
      $this->assign("age","<a>".(date("Y")-substr($order['id_card'],"6","4"))."</a>");
      $this->display('orderDetail');

  }

}
