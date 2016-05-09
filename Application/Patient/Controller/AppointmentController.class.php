<?php
namespace Patient\Controller;
use Think\Controller;
class AppointmentController extends Controller {
  public function index() {
      $this->display('index');
  }
  public function getDoc($num,$date = null){
    $doc =new \Doctor\Model\DoctorModel("Doctor");
    $num--;
    if ($num>0){
      $num += 2;
    }
    $start = $num;
    $num_per_time = $num==0?3:1;
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
    if(F('intro'.$id)){
      echo json_encode(F('intro'.$id));
    }else{
    $doc = M("Doctor");
    $map['doctor_id'] = $id;
    $intro = $doc->field('intro,treatment_period as period,work_days')->where($map)->select();
    F('intro'.$id,$intro);

    echo json_encode($intro);
  }
  }

  public function proccessOrder($doc_id,$date){

    if(session("?current_user")&&(session("current_user.user_type")=="patient")){
    $order = new \Patient\Model\OrderModel();
    $data = array();
    $data["doctor_id"] = $doc_id;
    $data["patient_id"] = session('current_user.user_id');
    $data["date"] = $date;
    $order->data($data)->add();
    $pat = M("Patient");
    $patInfo = $pat->where("patient_id='".session('current_user.user_id')."'")->find();
    if(array()!=$patInfo){
      $doc = M("Doctor");
      $field = array("name","department","title","treatment_period"=>"period","order_cost"=>"cost");
      $docInfo =  $doc->field($field)->where("doctor_id='".$doc_id."'")->find();
      $week = ["星期一","星期二","星期三","星期四","星期五"];
      trace($patInfo,"预约患者信息",'INFO',true);
      $openid = $patInfo['openid'];
      if ($openid) {
          trace($patInfo,"预约患者信息",'INFO',true);
          $template = array('touser'=>$openid,
                            'template_id'=>"enSFs3n6Czl5tAB8GswzfadvxQ8xHy_cr5puaLKxK_4",
                            'url'=>"http://121.42.48.201/wemedical/Patient-MyOrders",
                            'data'=>array(
                                  'name' =>array('value'=>urlencode($docInfo['name']),
                                                  'color'=>"#1abc9c"
                                                ),
                                                'date' =>array('value'=>urlencode($date),
                                                                'color'=>"#1abc9c"
                                                              ),
                                                              'week' =>array('value'=>urlencode( $week[date('w', strtotime($date))-1]),
                                                                              'color'=>"#1abc9c"
                                                                            ),

                                                                            'department' =>array('value'=>urlencode($docInfo['department']),
                                                                                            'color'=>"#1abc9c"
                                                                                          ),
                                                                                          'period' =>array('value'=>urlencode($docInfo['period']==0?"上午":"下午"),
                                                                                                          'color'=>"#1abc9c"
                                                                                                        ),
                                                                                                        'title' =>array('value'=>urlencode($docInfo['title']),
                                                                                                                        'color'=>"#1abc9c"
                                                                                                                      ),
                                                                                                        'cost' =>array('value'=>urlencode($docInfo['cost']."￥"),
                                                                                                                        'color'=>"#1abc9c"
                                                                                                                      ),


                              ),

                            );
                            trace(json_encode($template),"挂号通知内容","INFO",true);
          $wechatObj = new \Org\Util\Wechat();
          $wechatObj->send_templete_message(urldecode(json_encode($template)));
      }
 }
    $returnInfo['status']=1;
    $returnInfo['info']="挂号成功!";
     $this->ajaxReturn($returnInfo);
   }else {
     $this->error("预约请先登录!",U('Home-Login-Index'));

   }
   }

  }
