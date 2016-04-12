<?php
namespace Docter\Model;
use Think\Model;
class PatientModel extends Model{
   protected $connection = 'DB_CONFIG';

   /* 定义自动验证 */
 //      protected $_validate = array(
 //          array('name', '/^[\x{4e00}-\x{9fa5}]{2,}$/u', '姓名少于两位或非中文字符!'),
 //          array('vcode','[1]','短信验证码不正确，请重新获取!'),
 //          array('idCard_num','checkId','不是有效的身份证号!',0,'function'),
 //           array('idCard_num','','该身份证号已经注册过!',0,'unique',1),
 //
 //
 //      );
 //
 //   protected $_auto = array(
 //       array('create_time', 'createTime', self::MODEL_INSERT, 'callback')
 //   );
 //
 //
 //
 //   public function createTime() {
 //   return time();
 // }


}
?>
