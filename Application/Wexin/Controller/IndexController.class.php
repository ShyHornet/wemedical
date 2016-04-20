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
      $appId = "wx422634c7132ba93b";
      $appsercret = "9812ed4394deee07a0f07192f43091a2";
      //获得code
      if (isset($_GET['code'])){

        $code = $_GET['code'];
        //用code换取access_token
        $access_token_params = array(
          'appid' =>$appId,
          'secret'=>$appsercret,
          'code'=>$code,
          'grant_type'=>'authorization_code'
        );
        $access_token_query_string = http_build_query($access_token_params);
        $URL='https://api.weixin.qq.com/sns/oauth2/access_token?'.$access_token_query_string;
        $access_token_json = json_decode(httpGet($URL),true);
        if (isset($access_token_json['access_token'])) {
          $access_token = $access_token_json['access_token'];
             $openid = $access_token_json['openid'];
             $userInfoURL = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
              $userInfoJson = json_decode(httpGet($userInfoURL),true);

              var_dump($userInfoJson);

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
