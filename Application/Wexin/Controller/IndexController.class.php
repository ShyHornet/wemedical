<?php
namespace Wexin\Controller;
use Think\Controller;
define("TOKEN", "weixin");
class IndexController extends Controller {
    public function index(){
      $wechatObj = new wechat();
      if (isset($_GET['echostr'])) {
          $wechatObj->valid();
      }else{
          $wechatObj->responseMsg();
      }
    }
    public function oAuth(){
      $appId = "wx422634c7132ba93b";
      $appsecret = "9812ed4394deee07a0f07192f43091a2";
      //获得code
      if (isset($_GET['code'])){

        $code = $_GET['code'];
        //用code换取access_token
        $access_token_params = array(
          'appid' =>$appId,
          'secret'=>$appsecret,
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
              $userInfoArray = json_decode(httpGet($userInfoURL),true);

              if (session('?current_user')&&(session('current_user.user_type')=='patient')) {
                $pat = M('Patient');
                $data['openid'] = $userInfoArray['openid'];
                $condition['patient_id'] = session('current_user.user_id');
                $pat->where($condition)->save();
                $this->success("微信绑定成功!","Patient-Me-index");
              }
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
