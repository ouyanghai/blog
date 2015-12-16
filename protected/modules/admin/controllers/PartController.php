<?php
class PartController extends Common{

	public function Modepic($filename,$new_width,$new_height){
		//header('Content-Type: image/jpeg');

		list($width, $height,$type) = getimagesize($filename);
		//$new_width = $width * $percent;
		//$new_height = $height * $percent;

		// Resample
		$image_p = imagecreatetruecolor($new_width, $new_height);
		if($type==3){
			$image = imagecreatefrompng($filename);
		}else{
			$image = imagecreatefromjpeg($filename);
		}
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		// Output
		//imagejpeg($image_p, null, 100);
		return $image_p;
	}

	public function actionAdd(){
		$partmodel=new Part();
		if(!empty($_FILES)){
		
			if(($_FILES['Part']['error']['pic'])===0){
				$upload=CUploadedFile::getInstance($partmodel,'pic');
				$randName=substr(md5(mt_rand()),0,10);
				$ext=$upload->getExtensionName();
				$fileName=$randName.'.'.$ext;
				$dir="./assets/uploads/album/cover/";
				if($upload->saveAs($dir.$fileName)){
					$img=$this->Modepic($dir.$fileName,195,255);
					imagejpeg($img,$dir.$fileName);
					imagedestroy($img);

					$_POST['Part']['pic']=$fileName;
				}
			}
		}
		if(!empty($_POST['Part'])){
			$partmodel->name=$_POST['Part']['name'];
			$partmodel->picname=$_POST['Part']['pic'];
			if($partmodel->save()){
				Yii::app()->user->setFlash('info','添加成功');
			}else{
				Yii::app()->user->setFlash('info','添加失败');
			}
		}
		$partmodel->name="";
		$this->render('add',array('model'=>$partmodel,'title'=>"添加相册"));
	}

	public function actionIndex(){
		$model=Part::model();
		$criteria=new CDbCriteria();
		$total=$model->count($criteria);
		$pager=new CPagination($total);
		$pager->pageSize=5;
		$pager->applyLimit($criteria);

		$data=$model->getAllParts($criteria);
		$this->render('index',array('parts'=>$data,'pager'=>$pager));
	}

	public function actionMod(){
		$partmodel=Part::model();
		$data=$partmodel->findbyPk($_GET['id']);
		if(!empty($_FILES)){
		
			if(($_FILES['Part']['error']['pic'])===0){
				$upload=CUploadedFile::getInstance($data,'pic');
				$randName=substr(md5(mt_rand()),0,10);
				$ext=$upload->getExtensionName();
				$fileName=$randName.'.'.$ext;
				$dir="./assets/uploads/album/cover/";
				if($upload->saveAs($dir.$fileName)){
					$img=$this->Modepic($dir.$fileName,195,255);
					imagejpeg($img,$dir.$fileName);
					imagedestroy($img);
					$_POST['Part']['pic']=$fileName;
				}
			}
		}
		if(!empty($_POST['Part'])){
			$data->name=$_POST['Part']['name'];
			if(!empty($_POST['Part']['pic'])){
				$data->picname=$_POST['Part']['pic'];
			}
			if($data->validate()){
				$data->updateByPk($_GET['id'],array('name'=>$_POST['Part']['name'],'picname'=>$_POST['Part']['pic']));
				Yii::app()->user->setFlash('info','修改成功');
			}else{
				Yii::app()->user->setFlash('info','修改失败');
			}
		}
		$this->render('add',array('model'=>$data,'title'=>'修改相册名称'));
	}

	public function actionDel(){
		$data=Cate::model()->count('pid=:pid',array(':pid'=>$_GET['id']));
		if(intval($data)==0){
			if(Part::model()->deletebyPk($_GET['id'])){
				Yii::app()->user->setFlash('info','删除成功');
			}else{
				Yii::app()->user->setFlash('info','删除失败');
			}
		}else{
			Yii::app()->user->setFlash('info','该分区下还有板块，不能删除');
		}
		$this->redirect(array('part/index'));
	}
}

?>