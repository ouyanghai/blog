<?php
class Profile extends CActiveRecord{
	public $username;
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{profile}}";
	}

	public function rules(){
		return array(
				array('uid','required','message'=>'uid can not be null'),
				array('t_name','filter','filter'=>'trim'),
				array('sex','in','range'=>array(0,1,2),'message'=>'sex not validate'),
				array('age','numerical','min'=>0,'max'=>150,'integerOnly'=>true,'message'=>'age is not validate'),
				array('sex','in','range'=>array(0,1,2,3,4,5,6),'message'=>'xueli not validate'),
				array('email','email','message'=>'email is not validate'),
				array('telphone','match','pattern'=>'/^1(([38][0-9])|(47)|(70)|(5[0-35-9]))\d{8}$/','message'=>'telphone number is not validate'),
				array('qq','match','pattern'=>'/^\d{5,12}$/','message'=>'qq 5-12 numbers'),
				array('birthday','date','format'=>'yyyy-MM-dd','message'=>'birthday wrong'),
				array('signed','filter','filter'=>'htmlspecialchars'),
				array('signed','filter','filter'=>'addslashes'),
			);
	}
}

?>