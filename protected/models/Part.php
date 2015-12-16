<?php
class Part extends CActiveRecord{
	public $total=0;
	public $cates=array();
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){

		return "{{part}}";
	}

	public function attributeLabels(){
 		return array(
 				'name'=>'相册名称:',
 				'picname'=>'相册封面图片：'
 			);

 	}

 	public function rules(){
 		return array(
 				array('name','required','message'=>'分区名称不能为空'),
 				array('name','unique','className'=>'part','message'=>'分区名称不能重复'),
 			);
 	}

 	public function getAllParts($criteria){
 		$data=$this->findAll($criteria);
 		foreach($data as $part){
 			$part->total=$this->getCount($part->id);
 		}
 		return $data;
 	}

 	private function getcount($pid){
 		$model=Cate::model();
 		return $model->count('pid=:pid',array(':pid'=>$pid));
 	}

 	public function getList(){
 		$data=$this->findAll();
		foreach($data as $part){
			$parts[$part->id]=$part->name;
		}
		return $parts;
 	}

 	//前台数据的遍历
 	public function getPartList(){
 		$parts=$this->findAll();
 		foreach($parts as $part){
 			$part->cates=$this->getCateList($part->id);
 		}
 		return $parts;
 	}

 	private function getCateList($pid){
 		return Cate::model()->findAll('pid=:pid',array(":pid"=>$pid));
 	}
}

?>