<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/weui.min.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/main.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/banneralert.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/font.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/jquery-weui.css">
<link href="/wemedical/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/flat-ui.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/animate.min.css" rel="stylesheet">
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
        <li class="active"><a href="#fakelink">登陆注册</a></li>
      <li><a href="#fakelink">预约挂号</a></li>
      <li><a href="#fakelink">我的预约</a></li>
      <li><a href="#fakelink">个人中心</a></li>
    </ul>
    <!-- <form class="navbar-form navbar-right" action="#" role="search">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" id="navbarInput-01" type="search" placeholder="查找医生号源">
          <span class="input-group-btn">
            <button type="submit" class="btn"><span class="fui-search"></span></button>
          </span>
        </div>
      </div>
    </form> -->
  </div><!-- /.navbar-collapse -->
  </nav><!-- /navbar -->
    <div class="container-fluid"style="margin-top:40px;margin-bottom:120px;">
        <div class="content">
          <div class="alert" id="login_result" role="alert" style="display:none;"></div>
  <form id="loginForm" method="post" action="/wemedical/index.php/Home-Login-checkLogin">

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group input-group "id="name_animate_box">
                <span class="input-group-addon login-field-icon fui-user" ></span>

                <input class="form-control login-field" type="text" name="name" id="name" placeholder="请输入真实姓名"/>
            </div>
        </div>
    </div>
    <div class="alert alert-danger" id="name_error" role="alert" style="display:none;"></div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group input-group" id="id_card_num_animate_box">
                <span class="input-group-addon login-field-icon icon-profile" ></span>
                <input class="form-control" type="text" name="id_card" id="id_card_num" placeholder="请输入身份证号码"/>
            </div>
        </div>
    </div>
    <div class="alert alert-danger" id="id_card_error" role="alert" style="display:none;"></div>

      <div class="weui_cells_title">登陆角色(医生为医院内部注册)</div>
      <div class="row">
        <div class="col-lg-6">
          <select class="form-control select select-primary select-block mbl">
              <optgroup label="角色">
                  <option value="1">患者</option>
                  <option value="0">医生</option>
              </optgroup>
          </select>
        </div>
      </div>
    <div class="weui_cells_tips" align="center" > <a href="/wemedical/index.php/Home-Login-signup" target="_self" >没有账号？立即注册</a></div>
    <center>
        <button class="btn btn-hg btn-primary btn-wide" style="margin-top:20px;width:90%;" id="login">登录</button>
    </center>
    </form>
      </div>
  </div>

    <script>
$("select").select2({dropdownCssClass: 'dropdown-inverse'});
	$().ready(function() {
    var name = $("#name").val();
    var id_card = $("#id_card_num").val();
    $('#loginForm').ajaxForm({
      beforeSubmit:function(){
        $('#login_result').removeClass("alert-success alert-danger",1000,"ease-out").html("").hide();
      },
      success:function(data){
        console.log(data);
        if(data.status==1){
        $('#login_result').addClass("alert-success").html(data.info).show();

        }else {
         $('#login_result').addClass("alert-danger").html(data.info).show();
        }

      },
      dataType:'json'
    });




		$("#loginForm").validate({
		rules:{
			name:{
         checkName:true
       },
			 id_card:{
        checkId:true
      }
			  }
});
$.validator.addMethod("checkName",function(value,element,params){
  $("#name_error").html("").hide();
  var nameRegex = /^[\u4e00-\u9fa5]{2,}$/;
  return this.optional(element)||nameRegex.test(value);
},function(){
    $("#name_error").html("姓名至少为两位中文字符").show();
    $("#name_animate_box").removeClass("shake animated");
    $("#name_animate_box").toggleClass("shake animated");
});
$.validator.addMethod("checkId",function(value,element,params){
  $("#id_card_error").html("").hide();
  var idRegex15 = /^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/;
  var idRegex18 = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
  return this.optional(element)||idRegex15.test(value)||idRegex18.test(value);
},function(){
    $("#id_card_error").html("身份证号格式不正确").show();
    $("#id_card_num_animate_box").removeClass("shake animated");
    $("#id_card_num_animate_box").toggleClass("shake animated");
});

});

    </script>
</body>

<footer>
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</html>