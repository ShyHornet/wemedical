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
        <div class="navbar-brand" >
          <!-- <span ><svg class="icon icon-logo" style=""><use xlink:href="/wemedical/Public/svg/symbol-defs.svg#icon-logo"></use></svg></span> -->
          <a  href="#" >微挂号</a>
        </div>

    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#fakelink">医院信息</a></li>
        <li><a href="#fakelink">预约挂号</a></li>
      </ul>
      <form class="navbar-form navbar-right" action="#" role="search">
        <div class="form-group">
          <div class="input-group">
            <input class="form-control" id="navbarInput-01" type="search" placeholder="查找医生">
            <span class="input-group-btn">
              <button type="submit" class="btn"><span class="fui-search"></span></button>
            </span>
          </div>
        </div>
      </form>
    </div><!-- /.navbar-collapse -->
    </nav><!-- /navbar -->
    <div class="container-fluid"style="margin-top:40px;margin-bottom:120px;">
        <div class="content">
  <form id="loginForm" method="get" action="">

    <div class="row-fluid">
        <div class="col-lg-6">
            <div class="form-group">
                <input class="form-control" type="text" name="name" id="name" placeholder="请输入真实姓名"/>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-lg-6">
            <div class="form-group">
                <input class="form-control" type="text" name="id_card" id="id_card_num" placeholder="请输入身份证号码"/>
            </div>
        </div>
    </div>

      <div class="weui_cells_title">登陆角色(医生为医院内部注册)</div>
      <div class="row-fluid">
        <div class="col-lg-6">
          <select class="form-control select select-primary select-block mbl">
              <optgroup label="角色">
                  <option value="1">患者</option>
                  <option value="0">医生</option>
              </optgroup>
          </select>
        </div>
      </div>
    <div class="weui_cells_tips" align="center" > <a href="User-index-signup" target="_self" >没有账号？立即注册</a></div>
    <center>
        <button class="btn btn-hg btn-primary btn-wide" style="margin-top:20px;" id="login">登录</button>
    </center>
    </form>
      </div>
  </div>

    <script>
$("select").select2({dropdownCssClass: 'dropdown-inverse'});
	$.validator.setDefaults({

		submitHandler: function() {

			alert("login!");

		}

	});
	$().ready(function() {

		$("#loginForm").validate({
		rules:{
			name:{
			   required:true,
			   minlength:2
				},
			 id_card:{
				 required:true,
				 minlength:15,
				 maxlength:19
      }
			  },
		messages:{
			name:{
				required:function(){
					$("body").showbanner({
						title : "错误",
						handle : false,
						content : "姓名不能为空!",
						show_duration:0,
						hide_duration:0
						});

				},
			   minlength:function(){

				$("body").showbanner({
						title : "错误",
						handle : false,
						content : "姓名至少为两位字符!"
						});
						}
				},
				id_card:{
					required:function(){
					$("body").showbanner({
						title : "错误",
						handle : false,
						content : "身份证号不能为空!"
						});

				},
					minlength:function(){
            $("body").showbanner({
    						title : "错误",
    						handle : false,
    						content : "身份证号至少为18位!"
    						});
          },
					maxlength:function(){
						$("body").showbanner({
						title : "错误",
						handle : false,
						content : "身份证号最多19位!"
						});
						}
			}
}
});
});
    </script>
</body>

<footer>
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</html>