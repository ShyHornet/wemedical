<?php
namespace Help\Controller;
use Think\Controller;
class FeedbackController extends Controller {
    public function index(){
        $this->show();
    }
    public function sendFeedback(){
      $feedback = M("Feedback");
      if($feedback->create()){
        //如果同一个人2个小时内发送过反馈，则返回失败信息
        $checkTime = M("Feedback");
        if(array()!=$checkTime->where("(phone='".$_POST['phone']."' AND  email='".$_POST['email']."') AND  TIMESTAMPDIFF(HOUR,datetime,now())<1 ")->find())
        {

            $data['status']  = "Failed";
            $data['info'] = '反馈太频繁，请1小时后再反馈!';
            $this->ajaxReturn($data);

        }else{
        $feedback->add();
        $data['status']  = "Success";
        $data['info'] = '反馈发送成功，工作人员将会在1个工作日后与您联系！';
        $this->ajaxReturn($data);
        }
      }else{
        $data['status']  = "Failed";
        $data['info'] = '反馈发送失败，请重试';
        $this->ajaxReturn($data);
      }
    }
}
