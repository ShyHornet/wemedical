<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" charset="UTF-8" content="width=0.8*device-width, initial-scale=0.8,user-scalable=no">

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

<script type="text/javascript">
$(function(){
    $("#mePage").addClass("active");
});

</script>
<div class="container-fluid">
  <div class="row-fluid">
<div  class="panel panel-default">
  <div  class="panel-heading">
    <b>个人信息</b>
    <?php echo ($isBindWexin); ?>

  </div>
  <div  class="panel-body">
    <div class="form-group">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="max-width:180px;max-height:200px;min-width:150px;min-height:167px" ><img src="/wemedical/Public/images/placeholder/patImgHolder.png" alt="" /></div>
      <div>
        <span class="btn btn-primary btn-embossed btn-file">
           <span class="fileinput-new"><span class="fui-image"></span>上传头像</span>
           <span class="fileinput-exists"><span class="fui-gear"></span>更换头像</span>
           <input type="file" name="...">
        </span>
        <a href="#" class="btn btn-primary btn-embossed fileinput-exists" data-dismiss="fileinput"><span class="fui-trash"></span>删除头像</a>
      </div>
    </div>
  </div>
  </div>
  <ul class="list-group">
    <?php if(isset($isBindWexin)): ?><li class="list-group-item"><b>微信昵称:</b><span style="margin-left:10px;"><?php echo ($name); ?></span></li>
      <li class="list-group-item"><b>微信号:</b><span style="margin-left:10px;"><?php echo ($gender); ?></span></li><?php endif; ?>
   <li class="list-group-item"><b>姓名:</b><span style="margin-left:10px;"><?php echo ($name); ?></span></li>
   <li class="list-group-item"><b>性别:</b><span style="margin-left:10px;"><?php echo ($gender); ?></span></li>
   <li class="list-group-item"><b>手机号码:</b><span style="margin-left:10px;"><?php echo ($phone); ?></span></li>
   <li class="list-group-item"><b>身份证号:</b><span style="margin-left:10px;"><?php echo ($id_card); ?></span></li>
   <li class="list-group-item"><b>居住地:</b><span style="margin-left:10px;"><?php echo ($location); ?></span></li>
  </ul>
  <div class="modal-footer">
       <a type="button"id="bindWexin" class="btn btn-primary btn-embossed">绑定微信</a>
        <a type="button"id="logout" href="/wemedical/index.php/Patient-Me-logOut" class="btn btn-danger btn-embossed">注销</a>
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