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


<div class="btn-group btn-group-justified" style="margin-top:-30px;" >
              <a class="btn btn-primary" id="tab-left" href="#">当前预约</a>
              <a class="btn btn-default" href="#" id="tab-right">历史预约</a>
            </div>
<div class="container-fluid"style="min-height:420px;padding-top:50px;padding-bottom:30px;">

  <a title="" data-placement="top" data-toggle="tooltip" class="" type="button" data-original-title="点击预约编号查看详情"><span class="fui-info-circle" style="margin-left:10px;"></span></a>
<table class="table table-striped table-bordered" >
        <thead>
          <tr>
            <th>#</th>
            <th>日期</th>
            <th>号源类型</th>
            <th>科室</th>
            <th>挂号费</th>
          </tr>
        </thead>
        <tbody id="orders">
        </tbody>
      </table>
</div>
<script type="text/javascript">
$(function(){
   $('[data-toggle="tooltip"]').tooltip()
  getOrders(1);
  $("#tab-left").click(function(){

      getOrders(1);
      $(this).addClass("btn-primary");
      $("#tab-right").removeClass("btn-primary").addClass("btn-default");


  });
  $("#tab-right").click(function(){
    getOrders(0);
    $(this).addClass("btn-primary");
    $("#tab-left").removeClass("btn-primary").addClass("btn-default");

  });
});
function getOrders(time){

    if(time==1){
      //获取当前预约
      $("#orders").html("");
      $.getJSON("/wemedical/index.php/Patient-MyOrders-getOrders",{time:1},function(json){
            if (json!=null){
              $.each(json,function(index,array){
                console.log(array);

            $("#orders").
            append("<tr data-id="+array['order_id']+" ></tr>");
            $("[data-id="+array['order_id']+"]")
            .append("<td><a>"+array['order_id']+"</a></td>")
            .append("<td>"+array['date']+"</td>")
            .append("<td>"+array['title']+"</td>")
            .append("<td>"+array['dpt']+"</td>")
            .append("<td>"+array['cost']+"￥</td>");

              });
            }
            });
    }else{
      //获取历史预约
      $("#orders").html("");
      $.getJSON("/wemedical/index.php/Patient-MyOrders-getOrders",{time:0},function(json){
            if (json!=null){
              $.each(json,function(index,array){

                $("#orders").
                append("<tr data-id="+array['order_id']+" ></tr>");
                $("[data-id="+array['order_id']+"]")
                .append("<td><a>"+array['order_id']+"</a></td>")
                .append("<td>"+array['date']+"</td>")
                .append("<td>"+array['title']+"</td>")
                .append("<td>"+array['dpt']+"</td>")
                .append("<td>"+array['cost']+"￥</td>");
              });
            }
            });
         }

}
</script>

<footer >
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</body>
</html>