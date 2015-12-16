<?php
//header('Content-Type: image/jpeg');


class CateController extends Common{
	

	public function Modepic($filename,$new_width,$new_height){
		list($width, $height) = getimagesize($filename);
		//$new_width = $width * $percent;
		//$new_height = $height * $percent;

		// Resample
		$image_p = imagecreatetruecolor($new_width, $new_height);
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		// Output
		//imagejpeg($image_p, null, 100);
		return $image_p;
	}

	public function actionAdd(){

		$model=new Cate();
		$partmodel=Part::model();

		if(!empty($_FILES)){
		
			if(($_FILES['Cate']['error']['pic'])===0){
				$upload=CUploadedFile::getInstance($model,'pic');
				$randName=substr(md5(mt_rand()),0,10);
				$ext=$upload->getExtensionName();
				$fileName=$randName.'.'.$ext;
				$dir="./assets/uploads/album/";
				if($upload->saveAs($dir.$fileName)){
					$img=$this->Modepic($dir.$fileName,67,104);
					imagejpeg($img,$dir.$randName.'-thumb.'.$ext);
					$model->thumbname=$randName.'-thumb.'.$ext;
					imagedestroy($img);
					//exit();
					$_POST['Cate']['pic']=$fileName;
				
				}
			}
		}
		if(!empty($_POST['Cate'])){
			$model->pid=$_POST['Cate']['pid'];
			$model->name=$_POST['Cate']['pic'];
			if($model->validate()){
				if($model->save(false)){
					Yii::app()->user->setFlash('info','添加成功');
				}else{
					Yii::app()->user->setFlash('info','添加失败');
				}
			}
		}
		$parts=$partmodel->getList();

		$this->render('add',array('model'=>$model,'parts'=>$parts,'title'=>'添加照片'));
	}

	public function actionIndex(){
		$cates=Cate::model()->getAllCates();

		$this->render('index',array('cates'=>$cates));
	}

	public function actionMod(){
		$cate=Cate::model()->findbypk($_GET['pid']);
		if(!empty($_POST['Cate'])){
			$cate->attributes=$_POST['Cate'];
			if($cate->validate()){
				if($cate->updatebypk($_GET['id'],array('pid'=>$_POST['Cate']['pid'],'name'=>$_POST['Cate']['name']))){
					Yii::app()->user->setFlash('info','修改成功');
				}else{
					Yii::app()->user->setFlash('info','修改失败');
				}
			}
		}
		$parts=Part::model()->getList();
		
		$this->render('add',array('model'=>$cate,'parts'=>$parts,'title'=>'添加板块'));
	}
}

?>