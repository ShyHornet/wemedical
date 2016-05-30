<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=0.9,user-scalable=no">

<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/weui.min.css"> -->
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/main.css">
<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/banneralert.css"> -->
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/font.css">
<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/jquery-weui.css"> -->
<link href="/wemedical/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/flat-ui-pro.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/datepicker.min.css" rel="stylesheet" type="text/css">
<!-- <link href="/wemedical/Public/css/animate.min.css" rel="stylesheet" type="text/css"> -->
<!-- <link href="/wemedical/Public/css/loadingSpinner.css" rel="stylesheet" type="text/css"> -->

<!-- <link href="/wemedical/Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->

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

<div class="container">
  <div class="col-md-12">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          号源信息
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <ul class="list-group">
        <li class="list-group-item">就诊日期:   <?php echo ($date); ?></li>
        <li class="list-group-item">就诊星期:   <?php echo ($week); ?></li>
        <li class="list-group-item">就诊时段:   <?php echo ($period); ?></li>
        <li class="list-group-item">就诊科室:   <?php echo ($department); ?></li>
        <li class="list-group-item">号源类型:   <?php echo ($title); ?></li>
        <li class="list-group-item">挂号费:   <?php echo ($cost); ?></li>
      </ul>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        医生信息
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <ul class="list-group">
        <li class="list-group-item">医生姓名:   <?php echo ($doc_name); ?></li>
        <li class="list-group-item">性别:   <?php echo ($doc_gender); ?></li>
        <li class="list-group-item">职称:   <?php echo ($title1); ?></li>
        <li class="list-group-item">科室:   <?php echo ($department1); ?></li>
        <li class="list-group-item">专长:   <?php echo ($specialism); ?></li>
        <li class="list-group-item">简介:   <?php echo ($intro); ?></li>
      </ul>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          患者信息
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <ul class="list-group">
        <li class="list-group-item">患者姓名:   <?php echo ($pat_name); ?></li>
        <li class="list-group-item">性别:   <?php echo ($pat_gender); ?></li>
        <li class="list-group-item">年龄:   <?php echo ($age); ?></li>
      </ul>
    </div>
  </div>
</div>
  </div>
</div>

<footer >
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</body>
</html>