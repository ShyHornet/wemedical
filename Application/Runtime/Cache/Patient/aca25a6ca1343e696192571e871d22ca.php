<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<!--  -->
<head>
<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/weui.min.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/main.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/banneralert.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/font.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/jquery-weui.css">
<link href="/wemedical/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/flat-ui.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/datepicker.min.css" rel="stylesheet" type="text/css">
<link href="/wemedical/Public/css/animate.min.css" rel="stylesheet" type="text/css">

<!-- <link href="/wemedical/Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->

<meta >
<title>微信挂号平台</title>
<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="/wemedical/Public/JS/flat-ui.min.js"></script>
<script src="http://apps.bdimg.com/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<script src="/wemedical/Public/JS/banneralert.min.js"></script>
<script src="/wemedical/Public/JS/jquery.validate.min.js"></script>

<!-- <script src="/wemedical/Public/JS/jquery-weui.js"></script> -->

<script src="/wemedical/Public/JS/jquery.form.js"></script>
<script src="/wemedical/Public/JS/jquery.cookie.js"></script>
<!-- <script src="/wemedical/Public/JS/bootstrap-datetimepicker.min.js"></script>
<script src="/wemedical/Public/JS/bootstrap-datetimepicker.zh-CN.js"></script> -->
<script src="/wemedical/Public/JS/datepicker.min.js"></script>
<!-- Include English language -->
<script src="/wemedical/Public/JS/datepicker.zh.js"></script>
  <script src="/wemedical/Public/JS/main.js"></script>
</head>

  <body >
    <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
        <span class="sr-only">Toggle navigation</span>
      </button>
        <div class="navbar-brand" style="padding-top:5px;">
          <svg class="icon icon-logo" style=""><use xlink:href="/wemedical/Public/svg/symbol-defs.svg#icon-logo"></use></svg>
        </div>

    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav">
        <li ><a href="#fakelink">医院信息</a></li>
          <li ><a href="#fakelink">登陆注册</a></li>
        <li class="active"><a href="#fakelink">预约挂号</a></li>
        <li><a href="#fakelink">我的预约</a></li>
        <li><a href="#fakelink">个人中心</a></li>
      </ul>
      <form class="navbar-form navbar-right" action="#" role="search">
        <div class="form-group">
          <div class="input-group">
            <input class="form-control" id="navbarInput-01" type="search" placeholder="查找医生号源">
            <span class="input-group-btn">
              <button type="submit" class="btn"><span class="fui-search"></span></button>
            </span>
          </div>
        </div>
      </form>
    </div><!-- /.navbar-collapse -->
    </nav><!-- /navbar -->

    <div class="container-fluid">
      <div class="row"width="100%" style="background:#1abc9c;height:50px;margin-top:-30px;">
        <div style="float:left; margin-top:11.25px;margin-left:24%;margin-right:3%;">
        <span  class="fui-arrow-left" id="preDay"></span>
        </div>
        <div class=""style="float:left;text-align:center;width:35%;margin-top:4px;">
        <input type='text' class="form-control datepicker-here active" style="text-align:center;border-color:#1abc9c;" id="treat_date"  data-language='zh' value="<?php echo date('Y-m-d'); ?>"/>
        </div>
        <div class="" style="float:left;margin-top:11.25px;margin-right:22%;margin-left:3%;">
          <span class="fui-arrow-right" id="nxtDay"></span>
        </div>
      </div>
<script type="text/javascript">
  $("#treat_date").datepicker({
    minDate:new Date(),
    startDate:new Date()
  })
  $("#preDay").click(function(){
    var datePicker = $("#treat_date").datepicker().data('datepicker');
    var dateInSeconds = Math.floor(datePicker.date.getTime());
    var newDate = new Date(dateInSeconds + 60*60*24*1000);
    datePicker.date = newDate;
    datePicker.selectDate(newDate);
  });
  $("#nxtDay").click(function(){
    var datePicker = $("#treat_date").datepicker().data('datepicker');
    var dateInSeconds = Math.floor(datePicker.date.getTime());
    var newDate = new Date(dateInSeconds + 60*60*24*1000);
    datePicker.date = newDate;
    datePicker.selectDate(newDate);
  });

</script>

<div id="doc_info">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel fadeInLeft animated " >
<div class="panel_top">
    <span class="p_l"><?php echo ($vo["name"]); ?></span>
    <span class="p_r"><?php echo ($vo["title"]); ?></span>
</div>
<div class="panel_middle">
    <div class="hd">
      <img  src="/wemedical/Public/images/img.png" alt="" />
    </div>
    <div class="bd">
      <p>科室:<?php echo ($vo["department"]); ?></p>
      <p>专长:<?php echo ($vo["specialism"]); ?></p>
      <p><a data-toggle="collapse" data-target="#panle-collapse-<?php echo ($i); ?>">查看简介</a></p>
 </div>
</div>
<div class="collapse" id="panle-collapse-<?php echo ($i); ?>">
 <div class="panel_middle_section">
    <span style="margin-left:90%;"  class="fui-cross-circle panle-collapse-close"  aria-hidden="false"></span><br>
    <a>简介</a>
    <p><?php echo ($vo["intro"]); ?></p>
    <a>专家出诊时间:</a>
    <p>周日：8:30~12:00</p><a data-toggle="collapse" data-target="#panle-collapse-<?php echo ($i); ?>-1">查看排班表</a>
 </div>
</div>
<div class="collapse" id="panle-collapse-<?php echo ($i); ?>-1">
<div class="panel_middle_section">

   <span style="margin-left:90%;" class="fui-cross-circle panle-collapse-close"  aria-hidden="false"></span><br>
   <a>简介</a>
   <p>擅长治疗 擅用虫类药治疗疑难病证。对类风湿性关节炎、风湿性关节炎、退行性关节病、结节病、荨麻疹、银屑病、冠心病、糖尿病、浅表性胃炎、有较好的疗效。</p>
   <a>专家出诊时间:</a>
   <p>周日：8:30~12:00</p>
</div>
</div>
<div class="panel_bottom">
  <p >

    <span class="p_l" >剩余号源: <?php echo ($vo["register_remains"]); ?></span>
    <?php if($vo['register_remains'] > 5 ): ?><span class="p_r"><button class="btn btn-xs  btn-success" data="<?php echo ($vo["doctor_id"]); ?>" data-toggle="modal" data-target="#myModal">立即预约</button></span>
    <?php else: if($vo['register_remains'] > 0): ?><span class="p_r"><button class="btn btn-xs  btn-warning" data="<?php echo ($vo["doctor_id"]); ?>" data-toggle="modal" data-target="#myModal">立即预约</button></span>
      <?php else: ?><span class="p_r"><button class="btn btn-xs" data="<?php echo ($vo["doctor_id"]); ?>" disabled>暂无号源</button></span><?php endif; endif; ?>
    <!-- <span class="p_r"><button class="btn btn-xs  btn-success">立即预约</button></span> -->
  </p>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>


<!-- Modal -->
<div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">挂号确认</h4>
      </div>
      <div class="modal-body">
        <span style="float:left;margin-top:13px;margin-right:5px;" class="fui-document"></span><span ><h6>号源信息</h6></span>
        <table class="table table-striped" width="100%">
          <tbody>
            <tr>
              <td>就诊日期</td>
              <td>2016-04-11</td>
            </tr>
            <tr>
              <td>就诊星期</td>
              <td>星期一</td>
            </tr>
            <tr>
              <td>就诊时段</td>
              <td>下午</td>
            </tr>
            <tr>
              <td>就诊科室</td>
              <td>神经外科</td>
            </tr>
            <tr>
              <td>医师姓名</td>
              <td>王XX</td>
            </tr>
            <tr>
              <td>号源类型</td>
              <td>副主任医师</td>
            </tr>
            <tr>
              <td>挂号费</td>
              <td>￥10.0</td>
            </tr>
          </tbody>
        </table>
        <span style="float:left;margin-bottom:13px;margin-right:5px;" class="fui-new"></span><span><h6>挂号信息</h6></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(function(){
$(".panle-collapse-close").click(function(){
  //用于关闭预约面板的中间页

$(this).parent(".panel_middle_section").parent(".collapse").collapse('hide');
});
});
</script>
<script >
$(function(){
    var i = 1; //设置当前页数
    var win = $(window);
    win.scroll(function () {
      if ($(document).height() - win.height() == win.scrollTop()){
            $.getJSON("/wemedical/index.php/Patient-Appointment-getThreeMore",{num:i},function(json){
                if(json){
                    var str = "";
                    $.each(json,function(index,array){
                       var j = 1;
                        var name = array['name'];
                        var title = array['title'];
                        var department = array['department'];
                        var specialism = array['specialism'];
                        var intro = array['intro'];
                        var register_remains = array['register_remains'];
                        var treatment_period = array['treatment_period'];
                        var treatment_period_convert = (function(){if(treatment_period==0){
                          return "8:30~12:00";
                        }else {
                          return "14:30~18:00";
                        }}());
                        console.log(treatment_period_convert);
                        var panel_top = "<div class=\"panel_top\">"+
                                        "<span class=\"p_l\">"+name+"</span>"+
                                        "<span class=\"p_r\">"+title+"</span>"+
                                        "</div>";
                        var panel_middle_s1 = "<div class=\"panel_middle\"><div class=\"hd\">"+
                                               "<img src=\"/wemedical/Public/images/img.png\" alt=\"\" /></div>"+
                                               "<div class=\"bd\">"+
                                               "<p>科室:"+department+"</p>"+
                                               "<p>专长:"+specialism+"</p>"+
                                               "<p><a data-toggle=\"collapse\" data-target=\"#panle-collapse-"+(i+3+j)+"\">"+
                                               "查看简介</a></p></div></div>";
                        var panel_middle_s2 = "<div class=\"collapse\" id=\"panle-collapse-"+(i+3+j)+"\">"+
                                                 "<div class=\"panel_middle_section\">"+
                                                    "<span style=\"margin-left:90%;\"class=\"fui-cross-circle panle-collapse-close\"  aria-hidden=\"false\"></span><br>"+
                                                    "<a>简介</a>"+
                                                    "<p>"+intro+"</p>"+
                                                    "<a>专家出诊时间:</a>"+
                                                    "<p>周日:"+treatment_period_convert+"</p>"+
                                                    "<a data-toggle=\"collapse\" data-target=\"#panle-collapse-"+(i+3+j)+"-1\">查看排班表</a></div></div>";
                        var panel_middle_s3 = "<div class=\"collapse\" id=\"panle-collapse-"+(i+3+j)+"-1\">"+
                                                 "<div class=\"panel_middle_section\">"+
                                                 "<span style=\"margin-left:90%;\" class=\"fui-cross-circle panle-collapse-close\" aria-hidden=\"false\"></span><br>"+
                                                  "<a>简介</a>"+
                                                  "<p>擅长治疗 擅用虫类药治疗疑难病证。对类风湿性关节炎、风湿性关节炎、退行性关节病、结节病、荨麻疹、银屑病、冠心病、糖尿病、浅表性胃炎、有较好的疗效。</p>"+
                                                  "<a>专家出诊时间:</a>"+
                                                  "<p>周日：8:30~12:00</p></div></div>";
                        var panel_bottom = "<div class=\"panel_bottom\">"+
                                            "<p >"+
                                            "<span class=\"p_l\">剩余号源:"+register_remains+"</span>"+
                                            "<span class=\"p_r\"><button class=\"btn btn-xs  btn-success\">立即预约</button></span></p></div></div></div>";
                        // var scripts = "\$(\"#panle-collapse-"+(i+3+j)+
                        //               "-close\").click(function(){$("#panle-collapse-"+(i+3+j)+
                        //               "").collapse('hide');});\$(\"#panle-collapse-"+(i+3+j)+
                        //               "-1-close\").click(function(){$("#panle-collapse-"+(i*3+j)+
                        //               "-1").collapse('hide');});";
                          var str = "<div class=\"panel fadeInLeftBig animated\">"+panel_top+panel_middle_s1+panel_middle_s2+panel_middle_s3+panel_bottom+"</div>";


                        $("#doc_info").append(str);
                        $(".panle-collapse-close").click(function(){
                          //用于关闭预约面板的中间页

                        $(this).parent(".panel_middle_section").parent(".collapse").collapse('hide');
                        });


                        j++;
                    });
                    i++;
                }else{

                    alert("没有更多数据了。。。");
                    return false;
                }
            });
        }
    });
});
</script>
<footer >
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

  </body>

</html>