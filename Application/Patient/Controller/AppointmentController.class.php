<?php
namespace Patient\Controller;
use Think\Controller;
class AppointmentController extends Controller {
  public function index(){
      $list= array(
        1=>array(
        "name" => "王XX",
        "title"=>"副主任医师",
        "department"=>"内科",
        "specialism"=>"内分泌失调",
        "intro"=>"擅长治疗 擅用虫类药治疗疑难病证。对类风湿性关节炎、风湿性关节炎、退行性关节病、结节病、荨麻疹、银屑病、冠心病、糖尿病、浅表性胃炎、有较好的疗效。",
        "register_remains"=>6
      ),
        2=>array(
        "name" => "李X",
        "title"=>"主任医师",
        "department"=>"外科",
        "specialism"=>"心脏外科",
        "intro"=>"擅用虫类药治疗疑难病证。对类风湿性关节炎、风湿性关节炎、退行性关节病、结节病、荨麻疹、银屑病、冠心病、糖尿病、浅表性胃炎、有较好的疗效。",
        "register_remains"=>0
      ),
      3=>array(
      "name" => "张XX",
      "title"=>"副教授",
      "department"=>"儿科",
      "specialism"=>"小儿麻痹",
      "intro"=>"擅用虫类药治疗疑难病证。对类风湿性关节炎、风湿性关节炎、退行性关节病、结节病、荨麻疹、银屑病、冠心病、糖尿病、浅表性胃炎、有较好的疗效。",
      "register_remains"=>4
      )
      );
      $this->assign('list',$list);
      $this->display('index');
  }
}
