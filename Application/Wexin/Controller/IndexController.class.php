<?php
namespace Wexin\Controller;
use Think\Controller;
use Think\Model;
define("TOKEN", "weixin");
class IndexController extends Controller {
    public function index(){
      $wechatObj = new \Org\Util\Wechat();
      if (isset($_GET['echostr'])) {
          $wechatObj->valid();
      }else{
          $wechatObj->responseMsg();
      }
    }
    public function send_templete_message(){
        $wechatObj = new \Org\Util\Wechat();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$wechatObj->getAccessToken();
        $template = array('touser'=>"odv65s4cX4bPoQ5eO0gGG5wZNn9I",
                            'template_id'=>"enSFs3n6Czl5tAB8GswzfadvxQ8xHy_cr5puaLKxK_4",
                            'url'=>"http://121.42.48.201/wemedical/Patient-MyOrders",
                            'data'=>array(
                                  'name' =>array('value'=>urlencode("王xx"),
                                                  'color'=>"#1abc9c"
                                                ),
                                                'date' =>array('value'=>urlencode("2016-05-09"),
                                                                'color'=>"#1abc9c"
                                                              ),
                                                              'week' =>array('value'=>urlencode("星期一"),
                                                                              'color'=>"#1abc9c"
                                                                            ),

                                                                            'department' =>array('value'=>urlencode("骨外科"),
                                                                                            'color'=>"#1abc9c"
                                                                                          ),
                                                                                          'period' =>array('value'=>urlencode("上午"),
                                                                                                          'color'=>"#1abc9c"
                                                                                                        ),
                                                                                                        'title' =>array('value'=>urlencode("副主任医师"),
                                                                                                                        'color'=>"#1abc9c"
                                                                                                                      ),
                                                                                                        'cost' =>array('value'=>urlencode("10￥"),
                                                                                                                        'color'=>"#1abc9c"
                                                                                                                      ),


                              ),

                            );
          trace(json_encode($template,true),"挂号成功通知内容数据","INFO",true);
        $res = httpGet($url,null,urldecode(json_encode($template)));
        trace(json_decode($res,true),"挂号成功通知模板发送","INFO",true);
        return json_decode($res,true);
    }
    public function oAuth(){
      $appId = "wx9bc6a722e1517399";
      $appsecret = "ffcb8743f9669e5a2de37dd349073aa7";
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
//http-get post函数
 function httpGet($url,$header = null, $data = null) {

    $curl = curl_init();
    if($header){
    curl_setopt($curl, CURLOPT_HTTPHEADER  ,$header);
    }
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
