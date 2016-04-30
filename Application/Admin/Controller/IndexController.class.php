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
    public function updateDoc(){
      $dptSets =array(
      	"心血管内科","呼吸内科", "神经内科", "肾病内科", "消化内科","血液病内科","内分泌内科","普通外科","肝胆外科","胃肠外科","痔漏外科","心脏外科","骨头外科","神经外科","泌尿外科","整形外科","烧伤外科","妇科","产科","辅助生殖","儿科","眼科","口腔科","耳鼻喉科","皮肤科",
      	"中西医结合科","传染科"
      	);
      	$titles =array("副主治医师","主治医师","副主任医师","主任医师");
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

            $data['department'] =   $dptSets[$_POST['department']];
       }


       $doc-> where('doctor_id='.$_POST['doctor_id'])->setField($data);
       echo json_encode(array('status'=>'success'));

    }
    public function delDoc($id){
      echo json_encode($id);
        $doc = M('Doctor');
        $orders = M("Order");
      foreach ($id as $key => $value) {
        $orders->where('doctor_id='.$value)->delete();
        $doc->delete($value);

      }
      echo json_encode(array("status"=>"success"));
    //  $doc->delete($id);
      //连带删除其预约单

      //$orders->where('doctor_id='.$id)->delete();
    }
    //七牛上传凭证
    public function uptoken(){
      Vendor('Qiniu.Auth');
        Vendor('Qiniu.Config');
        Vendor('Qiniu.functions');
        Vendor('Qiniu.Http.Client');
        Vendor('Qiniu.Http.Request');
        Vendor('Qiniu.Http.Response');
        Vendor('Qiniu.Storage.BucketManager');
        Vendor('Qiniu.Storage.UploadManager');
    header('Access-Control-Allow-Origin:*');
      $bucket = 'wemedical';
      $accessKey = 'aAul9IYjjVq6TWfsOLzuwY72bssajGYhGsK-WUVT';
      $secretKey = 'BwB5L-W2VKFo_HnWPM6CsrsSO_WvxUK8QD6WwHWI';
      $auth = new  \Qiniu\Auth($accessKey, $secretKey);
    //   $policy = array(
    // // 'returnUrl' => 'http://localhost/wemedical-admin/',
    // 'returnBody' => '{"key": $(key), "hash": $(etag), "w": $(imageInfo.width), "h": $(imageInfo.height)}'
    //  );
    //   $upToken = $auth->uploadToken($bucket,null,3600,$policy);
    $upToken = $auth->uploadToken($bucket);
        echo  json_encode(array('uptoken'=>$upToken));
    }
}
