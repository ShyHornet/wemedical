<?php
namespace Org\Util;

class Wechat
{

  var $appid = "wx422634c7132ba93b";
  var $appsecret = "9812ed4394deee07a0f07192f43091a2";
  //  public function __construct($appid = null,$appsecret = null){
  // 	 if ($appid&&$appsecret) {
  // 	 	$this->appid = $appid;
  // 		$this->appsecret = $appsecret;
  // 	 }
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
   public function getAccessToken(){
     $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
     $res = httpGet($url);
     $result = json_decode($res,true);

     $access_token = $result["access_token"];
     return $access_token;

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
    trace($data,"进入模板发送函数","INFO",true);
    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$this->getAccessToken();
    $res = httpGet($url,null,$data);
    trace(json_decode($res,true),"挂号成功通知模板发送","INFO",true);
    return json_decode($res,true);

  }
  public function responseMsg()
  {
  //获取post数据
  $postStr = file_get_contents("php://input");

      //解包post数据
  if (!empty($postStr)){
              //读取xml数据
              libxml_disable_entity_loader(true);
              $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
               trace($postObj,"msg recevied!",'INFO',true);
              $keyword = trim($postObj->Content);
              $MsgType = trim($postObj->MsgType);
            //如果消息不为空
                switch ($postObj->MsgType) {

                      case 'event':
                      trace($MsgType,"event triggered!",'INFO',true);
                      $this->responsEvent($postObj);
                      break;
                      case 'text':
                      trace($MsgType,"text sended!",'INFO',true);

                      $this->responsTextMsg($postObj,$keyword);
                        break;
                  default:
                    # code...
                    break;
                }
              //
              // $msgType = "text";
              // $contentStr = "Openid:$fromUsername";
              // $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);

      }else {
        echo "";
        exit;
      }
  }
  function responsEvent($postObj){
    $event = trim($postObj->Event);
    $openid = "".$postObj->FromUserName;
    switch ($event) {
      //关注事件
      case "subscribe":
      $this->responsTextMsg($postObj,"感谢您关注微信挂号平台，点击注册登录选项，进行注册并登录后即可开始预约挂号!祝您就医愉快，早日康复!");
      trace($event,"subscribe event triggered!",'INFO',true);

      trace($openid,"patient openid ".$openid,'INFO',true);
      $pat = M("Patient");

      $data['openid'] = $openid;
      if (array()==$pat->where("openid = '".$openid."'")->find()) {
        $pat->data($data)->add();
      }



        //默认新建患者用户,将openid存入患者表


        break;
        case "unsubscribe":
        trace($event,"unsubscribe event triggered!",'INFO',true);
          //删除取消订阅且未在挂号平台注册的用户
           $pat = M("Patient");
           $pat->where("openid = '".$openid."' AND name is null ")->delete();
         break;
    }


  }
  function responsTextMsg($postObj,$content){
    $fromUsername = $postObj->FromUserName;
    $toUsername = $postObj->ToUserName;
    $time = time();
    $textTpl = "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[text]]></MsgType>
  <Content><![CDATA[%s]]></Content>
  </xml>";
    $msgType = "text";
    $resultStr = sprintf($textTpl,  $postObj->FromUserName, $postObj->ToUserName, time(), $content);
    trace($resultStr,"text response sent!",'INFO',true);
    echo $resultStr;
  }
}



//公共方法
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
