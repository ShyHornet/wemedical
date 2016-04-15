<?php if (!defined('THINK_PATH')) exit();?>
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
<link href="/wemedical/Public/css/flat-ui-pro.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/datepicker.min.css" rel="stylesheet" type="text/css">
<link href="/wemedical/Public/css/animate.min.css" rel="stylesheet" type="text/css">
<link href="/wemedical/Public/css/loadingSpinner.css" rel="stylesheet" type="text/css">

<!-- <link href="/wemedical/Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->

<meta >
<title>微信挂号平台</title>
<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="/wemedical/Public/JS/flat-ui-pro.min.js"></script>

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
    <div  class="modal fade" id="register_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            <a type="button" class="btn btn-primary btn-xxs" data-dismiss="modal">确定</a>
            <a type="button" class="btn btn-default btn-xxs">取消</a>
          </div>
        </div>
      </div>
    </div>
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
        <input type='text' class="form-control datepicker-here active" style="text-align:center;border-color:#1abc9c;" id="treat_date"  data-language='zh'  value="<?php echo date('Y-m-d'); ?>"/>
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
  $("#preDay").click(function(){/*选择前一天*/
    var datePicker = $("#treat_date").datepicker().data('datepicker');
    var dateInSeconds = datePicker.date.getTime();
    var newDate = (new Date(dateInSeconds - 60*60*24*1000));/*当前时间减一天*/
    /*时分秒归0，方便比较时间*/
    newDate.setUTCHours("-8");/*当前时区为8，归0默认为8点，所以将时区-8，得到标准格林威治时间*/
    newDate.setUTCMinutes("0");
    newDate.setUTCSeconds("0");
    console.log(newDate);
    var now = new Date();
    now.setUTCHours("-8");
    now.setUTCMinutes("0");
    now.setUTCSeconds("0");
    console.log(now);
    if (newDate<now){ /*如果要选择的日期早于当前时间则将日期选择器归为当前日期*/
      var current = new Date();
      datePicker.date = current;
        datePicker.selectDate(current);
      return;
    }
    datePicker.date = newDate;
    datePicker.selectDate(newDate);
  });
  $("#nxtDay").click(function(){/*选择后一天*/
    var datePicker = $("#treat_date").datepicker().data('datepicker');
    var dateInSeconds = datePicker.date.getTime();
    var newDate = (new Date(dateInSeconds + 60*60*24*1000));
    newDate.setUTCHours("0");
    newDate.setUTCMinutes("0");
    newDate.setUTCSeconds("0");

    var now = new Date();
    now.setUTCHours("0");
    now.setUTCMinutes("0");
    now.setUTCSeconds("0");
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
      <img  src="/wemedical/Public/images/img2.jpeg" alt="" />
    </div>
    <div class="bd">
      <p>科室:<?php echo ($vo["department"]); ?></p>
      <p>专长:<?php echo ($vo["specialism"]); ?></p>
      <p><btn class="show_intro btn btn-xs btn-primary" data-toggle="collapse" data-target="#panle-collapse-<?php echo ($i); ?>">查看简介</btn></p>
 </div>
</div>
<div class="collapse intro" id="panle-collapse-<?php echo ($i); ?>" data-id="<?php echo ($vo["doctor_id"]); ?>">
 <div class="panel_middle_section" style="min-height:100px;" >

 </div>
</div>
<div class="collapse" id="panle-collapse-<?php echo ($i); ?>-1">
<div class="panel_middle_section">
    <span style="margin-left:90%;"  class="fui-cross-circle panle-collapse-close"  aria-hidden="false"></span><br>
  <ul class="media-list">
    <li class="media">
      <div class="media-left">
        <a href="#">
          <img class="img-rounded img-responsvie" src="/wemedical/Public/images/img.png" width="64px"height="64px" alt="...">
        </a>
      </div>
      <div class="media-body">
        <b class="media-heading">一只傻鸟</b>
        <p>这位医生真是太神了，解决了我常年的风湿病困扰!</p>
      </div>
    </li>
    <li class="media">
      <div class="media-left">
        <a href="#">
          <img class="media-object img-rounded img-responsvie" src="/wemedical/Public/images/img.png" width="64px"height="64px" alt="...">
        </a>
      </div>
      <div class="media-body">
        <b class="media-heading">另一只傻鸟</b>
        <p>这位医生很有办法!遇到他真是我的幸运！</p>
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object img-rounded img-responsvie" src="/wemedical/Public/images/img2.jpeg" width="64px"height="64px" alt="...">
            </a>
          </div>
          <div class="media-body">
          <b class="media-heading">王xx</b>
          <p>为患者解决病痛是我的职责！</p>
          </div>
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object img-rounded img-responsvie" src="/wemedical/Public/images/img.png" width="64px"height="64px" alt="...">
              </a>
            </div>
            <div class="media-body">
              <b class="media-heading">另一只傻鸟</b>
            <p>现在像您这样的好医生真的不多！</p>
            </div>
        </div>
      </div>
    </li>
  </ul>
</div>
</div>
<div class="panel_bottom">
  <p >

    <span class="p_l" >挂号费用:<?php echo ($vo['cost']); ?>￥</span>
    <!-- <?php if($vo['register_remains'] > 5 ): ?><span class="p_r"><button class="btn btn-xs  btn-success" data="<?php echo ($vo["doctor_id"]); ?>" data-toggle="modal" data-target="#myModal">立即预约</button></span>
    <?php else: if($vo['register_remains'] > 0): ?><span class="p_r"><button class="btn btn-xs  btn-warning" data="<?php echo ($vo["doctor_id"]); ?>" data-toggle="modal" data-target="#myModal">立即预约</button></span>
      <?php else: ?><span class="p_r"><button class="btn btn-xs" data="<?php echo ($vo["doctor_id"]); ?>" disabled>暂无号源</button></span><?php endif; endif; ?> -->
    <span class="p_r"><button class="btn btn-xs  btn-success" data-toggle="modal" data-target="#register_confirm">立即预约</button></span>
  </p>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="spinner"style="display:none;">
  <div class="bounce1"></div>
  <div class="bounce2"></div>
  <div class="bounce3"></div>
</div>
</div>

</div>


<!-- Modal -->

<script >

$(function(){
  //为现有的预约面板添加显示简介事件
  $('.intro').on('show.bs.collapse', function () {
    console.log("collapse show!");

    var content = $(this).children(".panel_middle_section");
    showIntroPanle(content,$(this));
  });
    var i = 1;
    var j = 1;
    //设置当前页数
    var win = $(window);
    win.scroll(function () {
      if ($(document).height() - win.height() == win.scrollTop()){
        $(".spinner").show();
        setTimeout(function(){
          },1000);
            $.getJSON("/wemedical/index.php/Patient-Appointment-getThreeMore",{num:i},function(json){
                if(json){
                    var str = "";
                    $.each(json,function(index,array){

                        var name = array['name'];
                        var title = array['title'];
                        var department = array['department'];
                        var specialism = array['specialism'];
                        var doctor_id = array['doctor_id'];
                        //var intro = array['intro'];
                        //var register_remains = array['register_remains'];
                        var cost = array['cost'];

                        var panel_top = "<div class=\"panel_top\">"+
                                        "<span class=\"p_l\">"+name+"</span>"+
                                        "<span class=\"p_r\">"+title+"</span>"+
                                        "</div>";
                        var panel_middle_s1 = "<div class=\"panel_middle\"><div class=\"hd\">"+
                                               "<img src=\"/wemedical/Public/images/img.png\" alt=\"\" /></div>"+
                                               "<div class=\"bd\">"+
                                               "<p>科室:"+department+"</p>"+
                                               "<p>专长:"+specialism+"</p>"+
                                               "<p><btn class=\"show_intro btn btn-xs btn-primary\" data-toggle=\"collapse\" data-target=\"#panle-collapse-"+(i+3+j)+"\">"+
                                               "查看简介</btn></p></div></div>";
                        var panel_middle_s2 = "<div class=\"collapse intro\" id=\"panle-collapse-"+(i+3+j)+"\" data-id=\""+doctor_id+"\">"+
                                                 "<div class=\"panel_middle_section\"></div></div>";
                        var panel_middle_s3 = "<div class=\"collapse\" id=\"panle-collapse-"+(i+3+j)+"-1\">"+
                                                 "<div class=\"panel_middle_section\">"+
                                                 "<span style=\"margin-left:90%;\" class=\"fui-cross-circle panle-collapse-close\" aria-hidden=\"false\"></span><br>"+
                                                  "<a>简介</a>"+
                                                  "<p>擅长治疗 擅用虫类药治疗疑难病证。对类风湿性关节炎、风湿性关节炎、退行性关节病、结节病、荨麻疹、银屑病、冠心病、糖尿病、浅表性胃炎、有较好的疗效。</p>"+
                                                  "<a>专家出诊时间:</a>"+
                                                  "<p>周日：8:30~12:00</p></div></div>";
                        var panel_bottom = "<div class=\"panel_bottom\">"+
                                            "<p >"+
                                            "<span class=\"p_l\">挂号费用:"+cost+"￥</span>"+
                                            "<span class=\"p_r\"><button class=\"btn btn-xs  btn-success\">立即预约</button></span></p></div></div></div>";
                          var str = "<div class=\"panel fadeInLeftBig animated\" >"+panel_top+panel_middle_s1+panel_middle_s2+panel_middle_s3+panel_bottom+"</div>";


                        $("#doc_info").append(str);
                        //为新添加的预约面板添加显示简介事件
                        var intro = "[data-id="+doctor_id+"]";
                      $(intro).on('show.bs.collapse', function () {
                        console.log("collapse show!");

                        var content = $(this).children(".panel_middle_section");
                        showIntroPanle(content,$(this));
                      });
                        j++;
                    });
                    i++;
                }else{

                    alert("没有更多数据了。。。");
                    return false;
                }



            });

            $(".spinner").hide();
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