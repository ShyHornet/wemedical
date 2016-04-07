<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Flat UI Free 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
    <!-- Loading Bootstrap -->
    <link href="/wemedical/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/wemedical/Public/css/flat-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/weui.min.css">
    <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/banneralert.css">
    <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/font.css">
    <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/jquery-weui.css">
    <script src="/wemedical/Public/JS/jquery-weui.js"></script>
    <script src="/wemedical/Public/JS/flat-ui.min.js"></script>



    <!-- <link rel="shortcut icon" href="img/favicon.ico"> -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
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
    <span class="p_r">立即预约</span>
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
<footer>
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

  </body>

</html>