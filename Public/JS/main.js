//短信验证码发送&倒计时
var wait=60;
function textCountDown(){
  if (wait == 60){
    $.removeCookie('vcode',{path:'/'});
    sendTextVCode();
  }
if (wait == 0){
 $("#vcode").removeAttr("disabled");
  $("#vcode").val("点击获取");
  wait = 60;
}else {
   $("#vcode").attr("disabled",true);
   $("#vcode").val("重新发送("+ wait + ")");
  wait--;
  console.log(wait);
  setTimeout(function(){
    textCountDown()
  },1000);
}

}
//发送短信验证码
function sendTextVCode(){
  var code = '';
  var phone_num = '';
  $.cookie('vcode',Math.floor(Math.random() * (999999 - 111111) + 111111),{expires:7,path:'/'});
  var vcode = $.cookie('vcode');
  console.log(vcode);
  phone_num = $("#phone_num").val();
  if (phone_num == ''){      //判断手机号是否填写
    $("body").showbanner({
       title : "错误",
       handle : false,
       content : "手机号没有填写!"
       });
       return;
  }
  var apikey = "08174a006a0fcb9c4b00a704a0253a2d";
  var base_url = "http://apis.baidu.com/kingtto_media/106sms/106sms";//基础url
  var header = {"apikey":apikey};//设置http-get请求头部
   var content = "【微信挂号平台】感谢您注册微信挂号平台，请在一分钟内输入您的验证码！验证码: "+ vcode;
  var data = {
    "mobile":phone_num,
    "tag":2,//返回json数据
    "content":content
    }//配置数据


$.ajax({
   url:base_url,
   headers:header,
   data:data,
   success:function(data){
     var json = $.parseJSON(data);
     if (json.returnstatus=="Success") {
       //验证码已发送提示
       $("body").showbanner({
          title : "验证短信已经发送",
          handle : false,
          content : "请输入短信验证码!"
          });

     }else{
      //验证码发送失败
      $("body").showbanner({
         title : "验证短信发送失败",
         handle : false,
         content : "抱歉，我们发生了系统错误!请重试!"
         });

     }
   }

})



}
//验证短信验证码是否正确
function veriCode(code){
  if (code == ''){
    $("body").showbanner({
       title : "错误",
       handle : false,
       content : "请输入短信验证码!"
       });
      return;
  }
  var vcode = $.cookie('vcode');
    if (code == vcode ) {//验证成功
      //将页面中隐藏的短信验证成功的标志置为1
      $("#vcode_status").val("1");
      $("body").showbanner({
         title : "验证成功",
         handle : false,
         content : "短信验证码验证成功!"
         });
    }else{
      $("body").showbanner({
         title : "错误",
         handle : false,
         content : "短信验证码不正确!"
         });

    }

}
