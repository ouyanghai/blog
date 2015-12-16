<?php
class Art extends CActiveRecord{

	public $username;
	public $pic;
	public $age;
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{post}}";
	}

	public function attributeLabels(){
		return array(
				'title'=>"心情标题标题：",
				'content'=>'内容：',
			);
	}

	public function rules(){
		return array(
				array('cid,uid,title,content','required','message'=>'数据不合法'),
				array('title','filter','filter'=>'trim'),
			);
	}

	public function getArt($cid){
		$art=$this->findbypk($cid);

		$author=User::model()->findbypk($art->uid);
		$art->username=$author->username;
		$profile=Profile::model()->find('uid=:uid',array(':uid'=>$art->uid));
		$art->pic=$profile->pic;
		$art->age=$profile->age;
		return $art;
	}
	
}

?>