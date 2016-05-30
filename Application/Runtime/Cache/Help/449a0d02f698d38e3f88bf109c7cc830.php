<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0,user-scalable=no">

<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/weui.min.css"> -->
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/main.css">
<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/banneralert.css"> -->
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/font.css">
<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/jquery-weui.css"> -->
<link href="/wemedical/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/flat-ui-pro.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/datepicker.min.css" rel="stylesheet" type="text/css">
<link href="/wemedical/Public/css/animate.min.css" rel="stylesheet" type="text/css">


<meta >
<title>微信挂号平台</title>
<script src="/wemedical/Public/JS/jquery-2.2.3.min.js"></script>
<script src="/wemedical/Public/JS/flat-ui-pro.min.js"></script>
<script src="/wemedical/Public/JS/store.min.js"></script>
<!-- <script src="/wemedical/Public/JS/banneralert.min.js"></script> -->
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

<body>
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
    <li ><a href="/wemedical/Home-HospitalInfo">医院信息</a></li>
      <li id="loginPage"><a  href="/wemedical/Home-Login-Index">登陆注册</a></li>
    <li id="aptPage"><a  href="/wemedical/Patient-Appointment-Index">预约挂号</a></li>
    <li id="myOrdersPage"><a  href="/wemedical/Patient-MyOrders-Index">我的预约</a></li>
    <li id="mePage"><a  href="/wemedical/Patient-Me-Index">个人中心</a></li>
      <li id="HelpPage"><a  href="/wemedical/Help-Menu">帮助中心</a></li>
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


<div class="container">
  <script type="text/javascript">
    $.validator.setDefaults({
      highlight:function(e){
        $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
      },
      success:function(e){
    $(e).closest(".form-group").removeClass("has-error").addClass("has-success")
    $(e).addClass("has-feedback")
  },errorElement:"span",errorPlacement:function(e,r){
    e.appendTo(r.parent())},
    errorClass:"help-block m-b-none",validClass:"help-block m-b-none"})

    $().ready(function(){
      $('#FeedbackForm').ajaxForm({
        beforeSubmit:function(){
            $("#feedback_status").removeClass("alert-danger alert-success").hide();
        },
        success:function(data){
          if(data.status=="Success"){
              $("#feedback_status").addClass("alert-success slideInLeft animated").html(data.info).show();
          }else if (data.status=="Failed") {
                $("#feedback_status").addClass("alert-danger slideInLeft animated").html(data.info).show();
            

          }

        },
        dataType:'json'
      });
        var e="<i class='fui-cross-circle'></i>"
        $("#FeedbackForm").validate({
            rules:{
              phone:{required:!0,minlength:11},
              email:{required:!0,
              email:!0},
              feedback:{required:!0,minlength:20}
            },
            messages:{
              phone:e+"请输入您的手机号码",
              email:{required:e+"请输入您的E-mail",email:e+"E-mail格式不正确"},
              feedback:{required:e+"请输入您的反馈内容",minlength:e+"反馈内容不得少于20个字"}
            }
        });

    });

  </script>
  <div class="alert alert-danger" id="feedback_status" role="alert" style="display:none;"></div>
  <form id="FeedbackForm" action="Help-Feedback-sendFeedback"  method="post">
    <div class="row col-sm-12 mbm">
      <div class="form-group">
        <label class="col-xs-3 control-label" >手机号:</label>
        <div class="col-xs-9">
          <input type="text" value="" placeholder="请输入手机号" name="phone" id="phone" class="form-control input-sm ">
        </div>
      </div>
    </div>
  <div class="row col-sm-12 mbm">
    <div class="form-group">
      <label class="col-xs-3 control-label" >邮箱:</label>
      <div class="col-xs-9">
        <input type="text" value="" placeholder="请输入邮箱" name="email"  id="eamil" class="form-control input-sm">
      </div>
    </div>
  </div>
  <div class="row col-sm-12">
    <div class="form-group">
      <div class="col-xs-12 col-offset-2">
          <textarea class="form-control" rows="5" name="feedback" id="feedback" placeholder="输入反馈内容..."></textarea>
      </div>
    </div>
    </div>
  <div class="row col-sm-12"style="margin:15px 5px auto 5px;">
    <div class="form-group">
          <button href="#fakelink" class="btn btn-block btn-primary">反馈</button>
    </div>
  </div>
  <div class="row col-sm-12">
    <center>
    <small><a href="tel://18611194036" ><span class="glyphicon glyphicon-earphone"></span>&nbsp;联系我们</a></small>
  </center>
  </div>
  </form>


</div>

<footer style="margin-top:100px;">
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</body>
</html>