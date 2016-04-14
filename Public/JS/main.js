
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
  if ($("#phone_num").val() == '') {
    return;

  }
   $("#vcode").attr("disabled",true);
   $("#vcode").html("重新发送("+ wait + ")");
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
     $("#phone_num").parent(".form-group").addClass("has-error",1000, "easeIn",function(){
setTimeout(function(){
  $("#phone_num").parent(".form-group").removeClass("has-error",1000, "swing");
},1000)


     });

      //  $("#phone_num").parent(".form-group").removeClass("has-error", 2000, "easeOut");

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
     $("#vocde").parent().parent(".input-group").addClass("has-error");
      return;
  }
  $("#vocde").parent().parent().removeClass("has-success");//去除输入框的错误或正确提示色
  $("#vocde").parent().parent().removeClass("has-error");
  var vcode = $.cookie('vcode');
    if (code == vcode ) {//验证成功
      //将页面中隐藏的短信验证成功的标志置为1
      $("#vcode_status").val("1");

      $("#vocde").parent().parent(".input-group").addClass("has-success");
    }else{
    $("#vocde").parent().parent(".input-group").addClass("has-error");

    }



}
(function () {
    'use strict';
    if (window && window.addEventListener) {
        var cache = Object.create(null); // holds xhr objects to prevent multiple requests
        var checkUseElems,
            tid; // timeout id
        var debouncedCheck = function () {
            clearTimeout(tid);
            tid = setTimeout(checkUseElems, 100);
        };
        var unobserveChanges = function () {
            return;
        };
        var observeChanges = function () {
            var observer;
            window.addEventListener('resize', debouncedCheck, false);
            window.addEventListener('orientationchange', debouncedCheck, false);
            if (window.MutationObserver) {
                observer = new MutationObserver(debouncedCheck);
                observer.observe(document.documentElement, {
                    childList: true,
                    subtree: true,
                    attributes: true
                });
                unobserveChanges = function () {
                    try {
                        observer.disconnect();
                        window.removeEventListener('resize', debouncedCheck, false);
                        window.removeEventListener('orientationchange', debouncedCheck, false);
                    } catch (ignore) {}
                };
            } else {
                document.documentElement.addEventListener('DOMSubtreeModified', debouncedCheck, false);
                unobserveChanges = function () {
                    document.documentElement.removeEventListener('DOMSubtreeModified', debouncedCheck, false);
                    window.removeEventListener('resize', debouncedCheck, false);
                    window.removeEventListener('orientationchange', debouncedCheck, false);
                };
            }
        };
        var xlinkNS = 'http://www.w3.org/1999/xlink';
        checkUseElems = function () {
            var base,
                bcr,
                fallback = '', // optional fallback URL in case no base path to SVG file was given and no symbol definition was found.
                hash,
                i,
                Request,
                inProgressCount = 0,
                isHidden,
                url,
                uses,
                xhr;
            if (window.XMLHttpRequest) {
                Request = new XMLHttpRequest();
                if (Request.withCredentials !== undefined) {
                    Request = XMLHttpRequest;
                } else {
                    Request = XDomainRequest || undefined;
                }
            }
            if (Request === undefined) {
                return;
            }
            function observeIfDone() {
                // If done with making changes, start watching for chagnes in DOM again
                inProgressCount -= 1;
                if (inProgressCount === 0) { // if all xhrs were resolved
                    observeChanges(); // watch for changes to DOM
                }
            }
            function attrUpdateFunc(spec) {
                return function () {
                    if (cache[spec.base] !== true) {
                        spec.useEl.setAttributeNS(xlinkNS, 'xlink:href', '#' + spec.hash);
                    }
                };
            }
            function onloadFunc(xhr) {
                return function () {
                    var body = document.body;
                    var x = document.createElement('x');
                    var svg;
                    xhr.onload = null;
                    x.innerHTML = xhr.responseText;
                    svg = x.getElementsByTagName('svg')[0];
                    if (svg) {
                        svg.setAttribute('aria-hidden', 'true');
                        svg.style.position = 'absolute';
                        svg.style.width = 0;
                        svg.style.height = 0;
                        svg.style.overflow = 'hidden';
                        body.insertBefore(svg, body.firstChild);
                    }
                    observeIfDone();
                };
            }
            function onErrorTimeout(xhr) {
                return function () {
                    xhr.onerror = null;
                    xhr.ontimeout = null;
                    observeIfDone();
                };
            }
            unobserveChanges(); // stop watching for changes to DOM
            // find all use elements
            uses = document.getElementsByTagName('use');
            for (i = 0; i < uses.length; i += 1) {
                try {
                    bcr = uses[i].getBoundingClientRect();
                } catch (ignore) {
                    // failed to get bounding rectangle of the use element
                    bcr = false;
                }
                url = uses[i].getAttributeNS(xlinkNS, 'href').split('#');
                base = url[0];
                hash = url[1];
                isHidden = bcr && bcr.left === 0 && bcr.right === 0 && bcr.top === 0 && bcr.bottom === 0;
                if (bcr && bcr.width === 0 && bcr.height === 0 && !isHidden) {
                    // the use element is empty
                    // if there is a reference to an external SVG, try to fetch it
                    // use the optional fallback URL if there is no reference to an external SVG
                    if (fallback && !base.length && hash && !document.getElementById(hash)) {
                        base = fallback;
                    }
                    if (base.length) {
                        // schedule updating xlink:href
                        xhr = cache[base];
                        if (xhr !== true) {
                            // true signifies that prepending the SVG was not required
                            setTimeout(attrUpdateFunc({
                                useEl: uses[i],
                                base: base,
                                hash: hash
                            }), 0);
                        }
                        if (xhr === undefined) {
                            xhr = new Request();
                            cache[base] = xhr;
                            xhr.onload = onloadFunc(xhr);
                            xhr.onerror = onErrorTimeout(xhr);
                            xhr.ontimeout = onErrorTimeout(xhr);
                            xhr.open('GET', base);
                            xhr.send();
                            inProgressCount += 1;
                        }
                    }
                } else {
                    if (!isHidden) {
                        if (cache[base] === undefined) {
                            // remember this URL if the use element was not empty and no request was sent
                            cache[base] = true;
                        } else if (cache[base].onload) {
                            // if it turns out that prepending the SVG is not necessary,
                            // abort the in-progress xhr.
                            cache[base].abort();
                            cache[base].onload = undefined;
                            cache[base] = true;
                        }
                    }
                }
            }
            uses = '';
            inProgressCount += 1;
            observeIfDone();
        };
        // The load event fires when all resources have finished loading, which allows detecting whether SVG use elements are empty.
        window.addEventListener('load', function winLoad() {
            window.removeEventListener('load', winLoad, false); // to prevent memory leaks
            tid = setTimeout(checkUseElems, 0);
        }, false);
    }
}());
