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
  <script src="/wemedical/Public/JS/main.js"></script>
</head>



<body>
  <script>
$(function(){
  $('#form').ajaxForm({
    beforeSubmit:function(){
//       $('#result').html('').hide();
//       $.post('/wemedical/index.php/User-Index-checkIdUnique-id-'+$('#idCard_num').val(),function(data){
// if (data.status==0){
//   $('#result').html(data.info).show();
//         // $("body").showbanner({
//         //    title : "错误",
//         //    handle : false,
//         //    content : data.info
//         //    });
//         return false;
// }
      // },'json');

    },
    success:function(data){
      if(data.status==1){
       window.location.href = '/wemedical/index.php/User-Index-login';
      }else {
       $("body").showbanner({
          title : "错误",
          handle : false,
          content : data.info
          });
      }

    },
    dataType:'json'
  });

});

  </script>

  <div class="header">
    <div class="page_title">
      微信挂号平台
    </div>
    </div>
    <div class="result" id="result"></div>
    <form id="form" method="post" action="/wemedical/index.php/User-Index-insert">
  <div class="content">
 <div class="weui_cells weui_cells_form">
    <div class="weui_cell">
          <div class="weui_cell_hd"><label class="weui_label">手机号码</label>
          </div>
          <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" name="phone_num" id="phone_num" placeholder="请输入手机号码">
          </div>
        </div>

  <div class="weui_cell weui_vcode">
      <div class="weui_cell_hd"><label class="weui_label">短信验证码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="number"   onChange="veriCode(this.value)" placeholder="请输入验证码"/>
      </div>
      <div class="weui_cell_ft">
        <!-- <img title="点击刷新" src="./captcha.php" align="absbottom" onClick="this.src='captcha.php?'+Math.random();"></img>-->
         <input type="button" class="weui_btn weui_btn_mini weui_btn_default" onClick="textCountDown()"  id="vcode" value="点击获取" style="margin-top:15px;margin-bottom:15px;">
         <input type="text" style="display:none;" name="vcode" id="vcode_status" value="0" >
      </div>
  </div>
</div>
<div class="weui_cells_title">个人信息</div>
<div class="weui_cells weui_cells_form">
	<div class="weui_cell">
          <div class="weui_cell_hd"><label class="weui_label">姓名</label>
          </div>
          <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" name="name" placeholder="请输入真实姓名">
          </div>
        </div>

     <div class="weui_cell weui_cell_select weui_select_after">
     <div class="weui_cell_hd"><label class="weui_label">性别</label>
          </div>
          <div class="weui_cell_bd weui_cell_primary">
            <select class="weui_select" name="gender">
              <option value="1">男</option>
              <option value="0">女</option>
              </select>
            </div>
          </div>
      <div class="weui_cell">
          <div class="weui_cell_hd"><label class="weui_label">身份证号</label>
          </div>
          <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" name="idCard_num"id="idCard_num" placeholder="请输入身份证号码">
          </div>
        </div>
      <div class="weui_cell">
          <div class="weui_cell_hd"><label for="name" class="weui_label">居住地</label></div>
          <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="location" type="text" name="location" value="北京 丰台区">
          </div>
      </div>
      <script>
      $("#location").cityPicker({
      title: "选择居住地"
      });

      </script>
</div>
<input class="weui_btn weui_btn_primary" type="submit" id="login" value="注册">
</form>
</div>
<!-- <div class="weui_cells weui_cells_form">
<div class="weui_cell weui_vcode" id="captcha-container">
    <div class="weui_cell_hd"><label class="weui_label">短信验证码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" type="number"  placeholder="请输入验证码"/>
    </div>
    <div class="weui_cell_ft">
<img width="100%" height="44px" alt="验证码" src="<?php echo U('User/Index/verify_c',array());?>" title="点击刷新" style="margin-top:1px;">
    </div>
</div>
</div>
<script>
var captcha_img = $('#captcha-container').find('img')
var verifyimg = captcha_img.attr("src");
captcha_img.attr('title', '点击刷新');
captcha_img.click(function(){
    if( verifyimg.indexOf('?')>0){
        $(this).attr("src", verifyimg+'&random='+Math.random());
    }else{
        $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
    }
});
</script> -->
<body>

<footer>
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</html>