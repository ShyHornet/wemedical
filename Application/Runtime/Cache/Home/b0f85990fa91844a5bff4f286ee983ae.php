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
  <script>
$(function(){
  $('#form').ajaxForm({
    beforeSubmit:function(){
    },
    success:function(data){
      if(data.status==1){
       window.location.href = '/wemedical/index.php/Home-Login-index';
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
  <!-- <div class="header">

    <div class="page_title">
      微信挂号平台
    </div>
    </div> -->

<div class="container">
<div class="content">
<form id="form" method="post" action="/wemedical/index.php/Home-Login-insert">

<div class="weui_cells_title">手机短信验证</div>
<div class="row">
  <div class="col-sm-6">
    <div class="input-group form-group">
      <span class="input-group-addon login-field-icon glyphicon glyphicon-earphone" style="top:0px;"></span>
        <input class="form-control" type="text" name="phone_num" id="phone_num" placeholder="请输入手机号码" />
    </div>
  </div>
</div>
  <div class="alert alert-danger" id="phone_error" role="alert" style="display:none;"></div>


<div class="row">
<div class="col-sm-6">
  <div class="input-group form-group">
    <input class="form-control" type="text"   onChange="veriCode(this.value)"  placeholder="请输入验证码">
      <span class="input-group-btn">
        <button class="btn btn-default mrs" type="button" onClick="textCountDown()"  id="vcode" style="margin-left:1px;">点击发送</button>
      </span>
    </div>
  </div>
</div>
<div class="alert alert-danger" id="vcode_error" role="alert"style="display:none;"></div>
<div class="alert alert-success" id="vcode_ok" role="alert"style="display:none;"></div>
<input type="text" style="display:none;" name="vcode" id="vcode_status" value="0" >
<div class="weui_cells_title">个人信息</div>
<div class="row">
  <div class="col-lg-6">
    <div class=" input-group form-group">
       <span class="input-group-addon login-field-icon fui-user" ></span>
        <input class="form-control" type="text" name="name" placeholder="请输入真实姓名"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="input-group form-group">
      <select data-toggle="select" class="form-control select select-primary mrs mbm" width="100px">
          <optgroup label="性别">
              <option value="1">男</option>
              <option value="0">女</option>
          </optgroup>
      </select>
    </div>
  </div>
</div>


<script>
$("select").select2({dropdownCssClass: 'dropdown-inverse'});
</script>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group input-group">
          <span class="input-group-addon icon-profile" ></span>
            <input class="form-control" type="text" name="idCard_num" id="idCard_num" placeholder="请输入身份证号码"/>
        </div>
    </div>
</div>
    <center>
        <button style="width:90%;" class="btn btn-hg btn-primary btn-wide">注册</button>
    </center>
</div>




</form>
</div>
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
</body>

<footer>
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</html>