<?php
namespace Help\Controller;
use Think\Controller;
class NoticeController extends Controller {
    public function index(){
       $Notice = M('Notice');
       $list = $Notice->order('notice_date desc')->select();
       $this->assign('noticelist',$list);
        $this->show();
    }
    public function delNotice(){
      $notice = M('Notice');
    if($notice->where('notice_id='+$_POST['notice_id'])->delete()=='0'){
      echo "1";
    }else{
      echo "0";
    }
    }
}
