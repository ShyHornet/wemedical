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
    <li ><a href="#fakelink">医院信息</a></li>
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


<style type="text/css"> 　　
@media (max-width: 767px)
.demo-content-wide{
      float: none;
      width: auto;
      padding: 0 !important;
      margin: 0 0 18px !important;

  }
.demo-content-wide > div {
  float: left;
  width: 100px;
  height: 100px;
  margin: 0 0 80px 67px;
  line-height: 100px;
  text-align: center;
  vertical-align: middle;
}

</style> 　
<div class="container">
<div class="demo-content-wide">
  <div><a href="Help-FAQ"><img src="Public/images/icons/Clipboard.png" width="72px"height="72px" alt=""><p>挂号须知</p></a></div>
    <div><a href="Help-Notice"><img src="Public/images/icons/Mail.png" width="72px"height="72px" alt=""><p>最新通知</p></a></div>
      <div><a href="Help-Feedback"><img src="Public/images/icons/support.png"  width="72px"height="72px" alt=""><p>问题反馈</p></a></div>
</div>
</div>

<footer style="margin-top:100px;">
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</body>
</html>