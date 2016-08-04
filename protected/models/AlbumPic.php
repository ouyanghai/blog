<?php
class AlbumPic extends CActiveRecord{
	static public function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return '{{albumpic}}';
	}

	public function rules(){
		return array(
			array('aid,pic','safe'),
		);
	}
}

?>