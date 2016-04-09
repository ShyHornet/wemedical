<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<!--  -->
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
        <div class="navbar-brand" style="padding-top:5px;">
          <svg class="icon icon-logo" style=""><use xlink:href="/wemedical/Public/svg/symbol-defs.svg#icon-logo"></use></svg>
        </div>

    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav">
        <li ><a href="#fakelink">医院信息</a></li>
          <li ><a href="#fakelink">登陆注册</a></li>
        <li class="active"><a href="#fakelink">预约挂号</a></li>
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
    <div class="container-fluid">

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel">
<div class="panel_top">
  <p style="width:90%">
    <span class="p_l"><?php echo ($vo["name"]); ?></span>
    <span class="p_r"><?php echo ($vo["title"]); ?></span>
  </p>
</div>
<div class="panel_middle">
    <img src="/wemedical/Public/images/img.png" alt="" />
    <span style="position:absolute;right:20%">
    <ul style="list-style:none;">
      <li>科室:<?php echo ($vo["department"]); ?></li>
      <li>专长:<?php echo ($vo["specialism"]); ?></li>
      <li><a data-toggle="collapse" data-target="#panle-collapse-<?php echo ($i); ?>">查看简介</a></li>

</div>
<div class="collapse" id="panle-collapse-<?php echo ($i); ?>">
 <div class="panel_middle_section">
    <span style="margin-left:90%;" id="panle-collapse-<?php echo ($i); ?>-close" class="fui-cross-circle"  aria-hidden="false"></span><br>
    <a>简介</a>
    <p><?php echo ($vo["intro"]); ?></p>
    <a>专家出诊时间:</a>
    <p>周日：8:30~12:00</p><a data-toggle="collapse" data-target="#panle-collapse-<?php echo ($i); ?>-1">查看排班表</a>
 </div>
</div>
<div class="collapse" id="panle-collapse-<?php echo ($i); ?>-1">
<div class="panel_middle_section">

   <span style="margin-left:90%;" class="fui-cross-circle" id="panle-collapse-<?php echo ($i); ?>-1-close" aria-hidden="true"></span><br>
   <a>简介</a>
   <p>擅长治疗 擅用虫类药治疗疑难病证。对类风湿性关节炎、风湿性关节炎、退行性关节病、结节病、荨麻疹、银屑病、冠心病、糖尿病、浅表性胃炎、有较好的疗效。</p>
   <a>专家出诊时间:</a>
   <p>周日：8:30~12:00</p>
</div>
</div>
<div class="panel_bottom">
  <p style="width:90%">

    <span class="p_l">剩余号源: <?php echo ($vo["register_remains"]); ?></span>
    <?php if($vo['register_remains'] > 5 ): ?><span class="p_r"><button class="btn btn-xs  btn-success">立即预约</button></span>
    <?php else: if($vo['register_remains'] > 0): ?><span class="p_r"><button class="btn btn-xs  btn-warning">立即预约</button></span>
      <?php else: ?><span class="p_r"><button class="btn btn-xs" disabled>暂无号源</button></span><?php endif; endif; ?>
    <!-- <span class="p_r"><button class="btn btn-xs  btn-success">立即预约</button></span> -->
  </p>
</div>
</div>
<script>
$("#panle-collapse-<?php echo ($i); ?>-close").click(function(){
       $("#panle-collapse-<?php echo ($i); ?>").collapse('hide');
});
$("#panle-collapse-<?php echo ($i); ?>-1-close").click(function(){
       $("#panle-collapse-<?php echo ($i); ?>-1").collapse('hide');
});

</script><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
<footer >
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

  </body>

</html>