<?php
namespace Wexin\Controller;
use Think\Controller;
define("TOKEN", "weixin");
class IndexController extends Controller {
    public function index(){
      $wechatObj = new wechatCallbackapiTest();
      if (isset($_GET['echostr'])) {
          $wechatObj->valid();
      }else{
          $wechatObj->responseMsg();
      }
    }
    public function oAuth(){
      //获得code
      if (isset($_GET['code'])){

        $code = $_GET['code'];
        //用code换取access_token
        $URL="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appId&secret=$appsercret&code=$code&grant_type=authorization_code";
        $access_token_json = json_decode(httpGet($URL),true);
        var_dump($access_token_json);
        if (isset($access_token_json['access_token'])) {
          $access_token = $access_token_json['access_token'];
             $openid = $access_token_json['openid'];
             $userInfoURL = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
              $userInfoJson = json_decode(httpGet($userInfoURL),true);

              //echo $userInfoJson;

        }else{
          echo "NO ACCESS_TOKEN";
        }
        //用access_token获取用户信息

        }else{
    echo "NO CODE";
        }

    }

}



?>
