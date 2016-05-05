<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="/wemedical/Public/JS/jquery-2.2.3.min.js"></script>
  <link href="/wemedical/Public/css/flat-ui-pro.min.css" rel="stylesheet">
  <script src="/wemedical/Public/JS/flat-ui-pro.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 48px; }
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 200px; font-weight: normal; line-height: 120px; margin-bottom: 48px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 48px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
</head>
<body>
<div class="system-message">
<?php if(isset($message)) {?>
<h1><span style="color: #2ecc71;"class="fui-check-circle"></span></h1>
<p class="success"><?php echo($message); ?></p>
<?php }else{?>
<h1><span style="color:#e74c3c;" class="fui-cross"></span></h1>
<p class="error"><?php echo($error); ?></p>
<?php }?>
<p class="detail"></p>
<p class="jump">
<h2>页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></h2>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>