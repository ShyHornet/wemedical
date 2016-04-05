<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/weui.min.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/main.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/banneralert.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/font.css">
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/jquery-weui.css">
<meta >
<title>微信挂号平台</title>
<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="/wemedical/Public/JS/banneralert.min.js"></script>
<script src="/wemedical/Public/JS/jquery.validate.min.js"></script>
<script src="/wemedical/Public/JS/city-picker.js"></script>
<script src="/wemedical/Public/JS/jquery-weui.js"></script>

<script src="/wemedical/Public/JS/jquery.form.js"></script>
<script src="/wemedical/Public/JS/jquery.cookie.js"></script>
</head>



<body>
  <div class="header">
    <div class="page_title">
      微信挂号平台
    </div>
    </div>
  <form id="loginForm" method="get" action="">

  <div class="content">

      <div class="weui_cells weui_cells_form">
        <div class="weui_cell" id="name">
          <div class="weui_cell_hd"><label class="weui_label" >姓名</label>
          </div>
          <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text"  name="name" placeholder="请输入真实姓名" >
          </div>
        </div>
        <div class="weui_cell">
          <div class="weui_cell_hd"><label class="weui_label" >身份证</label>
          </div>
          <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" id="id_card" name="id_card" placeholder="请输入身份证号" required>
          </div>
        </div>

      </div>
      <div class="weui_cells_title">登陆角色(医生为医院内部注册)</div>
      <div class="weui_cells weui_cells_form">
              <div class="weui_cell weui_cell_switch">
                  <div class="weui_cell_hd weui_cell_primary">医生</div>
                  <div class="weui_cell_ft">
                      <input class="weui_switch" type="checkbox"/>
                  </div>
              </div>
          </div>
    <a href="User-index-signup" target="_self" ><div class="weui_cells_tips" align="center" > 没有账号？立即注册</div></a>
    <input class="weui_btn weui_btn_primary" type="submit" id="login" value="登陆">
    </div>
    </form>
    <script>
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