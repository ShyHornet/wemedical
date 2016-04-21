<?php
//微信类
class wechat
{
	var $appid = "wx422634c7132ba93b";
	var $appsecret = "9812ed4394deee07a0f07192f43091a2";
   public function __construct($appid = null,$appsecret = null){
		 if ($appid&&$appsecret) {
		 	$this->appid = $appid;
			$this->appsecret = $appsecret;
		 }

		 $this->lasttime = 1395049256;
		 $this->access_token = "6F228uoH06yFJ9Rv57CBdeIv2VvyaJsBFs_gQazRQTIxzZCWbdj8X2YiZiEJiAFerrpK9bVC5mXroWEQyRKm6BSxiecwrkFwWgRSjbvmRiIOwevVNplXTRIn7BJv3O-wWQVbAJAGAF";
		 if(time()>($this->lasttime + 7200)){
			 $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->$appid."&secret=".$this->$appsecret;
			 $res = httpGet($url);
			 $result = json_decode($res,true);

			 $this->access_token = $result["access_token"];
			 $this->lasttime = time();
			 var_dump($this->lasttime);
			 var_dump($this->access_token);
		 }
	 }
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
						//判断消息类型
			if(!empty( $keyword ))
							{
								$msgType = "text";
								$contentStr = "Openid:$fromUserName";
								$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
								echo $resultStr;
							}else{
								echo "Input something...";
							}

			}else {
				echo "";
				exit;
			}
	}

}
//其他公共方法
//检查身份证号的合法性
function checkId($id){
if ($id == null){
  return false;
}
$url = "http://apis.baidu.com/apistore/idservice/id$id";
$header = array(
  'apikey:08174a006a0fcb9c4b00a704a0253a2d',
);
$result = httpGet($url,$header);
$resultArray = json_decode($result,true);
if ($resultArray['errNum']!=0){
return false;

}elseif ($resultArray['retMsg'] == 'success'){
return true;

}


}
//http-get post函数
 function httpGet($url,$header = null, $data = null) {

		$curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER  ,$header);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 500);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, $url);
		//加入POST支持
		if (!empty($data)) {
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		$res = curl_exec($curl);
		curl_close($curl);
		return $res;
	}

 ?>
