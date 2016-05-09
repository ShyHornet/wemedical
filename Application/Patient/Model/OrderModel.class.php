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
         'as_fields' => 'name:doc_name,title,gender:doc_gender,treatment_period:period,specialism,department:dpt,order_cost:cost,intro',
         ),
         'Patient'=>array(
           'mapping_type'      => self::BELONGS_TO,
           'class_name'        => 'Patient',
           'foreign_key'=>'patient_id',
           'as_fields'=>'name:pat_name,gender:pat_gender,id_card'
         ),
     );


}

?>
