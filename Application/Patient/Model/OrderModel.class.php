<?php
namespace Patient\Model;
use Think\Model\RelationModel;
class OrderModel extends RelationModel{
   protected $connection = 'DB_CONFIG';
   protected $_link = array(
     'Doctor'=>array(
         'mapping_type'      => self::BELONGS_TO,
         'class_name'        => 'Doctor',
         'foreign_key'=>'doctor_id',
         'as_fields' => 'title,department:dpt,order_cost:cost',
         ),
         'Patient'=>array(
           'mapping_type'      => self::BELONGS_TO,
           'class_name'        => 'Patient',
           'foreign_key'=>'patient_id',
         ),
     );


}

?>
