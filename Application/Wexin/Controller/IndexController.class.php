<?php
namespace Wexin\Controller;
use Think\Controller;
use Think\Model;
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
//微信类
class wechat
{
	var $appid = "wx422634c7132ba93b";
	var $appsecret = "9812ed4394deee07a0f07192f43091a2";
  //  public function __construct($appid = null,$appsecret = null){
	// 	 if ($appid&&$appsecret) {
	// 	 	$this->appid = $appid;
	// 		$this->appsecret = $appsecret;
	// 	 }
   //
	// 	 $this->lasttime = 1395049256;
	// 	 $this->access_token = "6F228uoH06yFJ9Rv57CBdeIv2VvyaJsBFs_gQazRQTIxzZCWbdj8X2YiZiEJiAFerrpK9bVC5mXroWEQyRKm6BSxiecwrkFwWgRSjbvmRiIOwevVNplXTRIn7BJv3O-wWQVbAJAGAF";
	// 	 if(time()>($this->lasttime + 7200)){
	// 		 $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->$appid."&secret=".$this->$appsecret;
	// 		 $res = httpGet($url);
	// 		 $result = json_decode($res,true);
   //
	// 		 $this->access_token = $result["access_token"];
	// 		 $this->lasttime = time();
	// 		 var_dump($this->lasttime);
	// 		 var_dump($this->access_token);
	// 	 }
	//  }
	 //验证消息是否来自微信
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }



	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	//发送模板消息
	public function send_templete_message($data)
	{
		$url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$this->access_token;
		$res = httpGet($url,$data);
		return json_decode($res,true);

	}
	public function responseMsg()
	{
	//获取post数据
	$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

			//解包post数据
	if (!empty($postStr)){
							//读取xml数据
							libxml_disable_entity_loader(true);
							$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
							$keyword = trim($postObj->Content);
							$MsgType = trim($postObj->MsgType);
						//如果消息不为空
			if(!empty( $keyword ))
							{
								switch ($MsgType) {
									case 'text':
										responsTextMsg($postObj);
										break;

									default:
										# code...
										break;
								}

							}else{
								echo "输入为空!";
							}

			}else {
				echo "";
				exit;
			}
	}

}
function responsEvent($postObj){
	$event = $postObj->Event;
	switch ($event) {
		//关注事件
		case 'subscribe':
      //默认新建患者用户,将openid存入患者表
      $pat = M("Patient");
      $data['openid'] = $postObj->fromUsername;
      $pat->data($data)->add();

			break;

		default:
			# code...
			break;
	}
}
function responsTextMsg($postObj){
	$fromUsername = $postObj->FromUserName;
	$toUsername = $postObj->ToUserName;
	$keyword = trim($postObj->Content);
	$time = time();
	$textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>0</FuncFlag>
</xml>";
$msgType = "text";
$contentStr = "Openid:$fromUserName";
$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
echo $resultStr;
}



?>
