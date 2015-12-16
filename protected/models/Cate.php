<?php
class Cate extends CActiveRecord{
	public $pname;
	public $artTotal;
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){

		return "{{cate}}";
	}

	public function attributeLabels(){
		return array(
				'pid'=>'请选择相册',
				'name'=>'照片位置',
			);
	}

	public function rules(){
		return array(
				array('pid','numerical','min'=>1,'integerOnly'=>true,'message'=>'请选择合法的分区名称'),
			//	array('name','required','message'=>'板块名称不能为空'),
			);
	}

	public function getAllCates(){
		$cates=$this->findAll();
		foreach($cates as $cate){
			$part=Part::model()->find('id=:id',array(':id'=>$cate->pid));
			$cate->pname=$part->name;
			$cate->artTotal=$this->getArtCount($cate->id);
		}
		return $cates;
	}

	private function getArtCount($cid){
		return Art::model()->count('cid=:cid',array(':cid'=>$cid));
	}
}


?>