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
  <div class="msg">
    <div class="weui_msg">
      <div class="weui_icon_area">
        <i class="weui_icon_success weui_icon_msg"></i>
      </div>

    <div class="weui_text_area">
      <h2 class="weui_msg_title">注册成功</h2>
      <p class="weui_msg_desc"style="display:none;"></p>
    </div>
    </div>

    </div>
</body>
<script type="text/javascript">
  $(".weui_msg_desc").show();
  wait = 4;
  function countDown(){
    if (wait==0){
window.location = "/wemedical/index.php/Home-Login-index";

    }
    $(".weui_msg_desc").html("正在跳转:("+wait+"s )");

    wait--;
    console.log(wait);
    setTimeout(function(){
      countDown()
    },1000);
  }
  countDown();

</script>

<footer>
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</html>