<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function getAllDocs($order){
      $doc =new \Doctor\Model\DoctorModel("Doctor");
      // echo $week;
      $orderStr = array();
      if ($order=="asc"){
          $orderStr = array('order','doctor_id'=>'asc');
      }else{
        $orderStr = array('order','doctor_id'=>'desc');
      }
      //$fields = array('doctor_id','name','title','department','specialism','order_cost' =>'cost','orders_per_day','treatment_period' =>'period','work_days','intro');
       $list= $doc->order('doctor_id')->select();

       if (count($list)==0) {
         echo null;
         return;
       }
      echo json_encode($list);
    }
    public function updateDoc($id){
      $data = array();
      $doc = M("Doctor");
       if (isset($_POST['name'])) {
            $data['name'] = $_POST['name'];
       }
       if (isset($_POST['id_card'])) {
            $data['id_card'] = $_POST['id_card'];
       }
       if (isset($_POST['title'])) {

              $data['title'] = $titles[$_POST['title']];
       }
       if (isset($_POST['gender'])) {
            $data['gender'] = $_POST['gender'];
       }
       if (isset($_POST['phone'])) {
        $data['phone'] = $_POST['phone'];
       }
       if (isset($_POST['department'])) {

            $data['department'] = $_POST['department'];
       }


       $doc-> where('id='.$id)->setField($data);

    }
    public function delDoc($id){
      $doc = M('Doctor');
      $doc->delete($id);
      //连带删除其预约单
      $orders = M("Order");
      $orders->where('doctor_id='.$id)->delete();
    }
}
