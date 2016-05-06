<?php
namespace Patient\Model;
use Think\Model;
class PatientModel extends Model{
   protected $connection = 'DB_CONFIG';

   /* 定义自动验证 */
      protected $_validate = array(
          array('vcode','[1]','短信验证码不正确，请重新获取!'),
          array('idCard_num','checkId','不是有效的身份证号!',0,'function'),
           array('idCard_num','','该身份证号已经注册过!',0,'unique',1),


      );
 }


}

?>
