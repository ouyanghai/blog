<?php
class ArtController extends Common{


	public function actionIndex(){
		$model=Art::model();
		/*start 分页*/
		$criteria=new CDbCriteria();
		$total=$model->count($criteria);
		
		$pager=new CPagination($total);
		$pager->pageSize=10;
		$pager->applyLimit($criteria);
		/*end 分页*/
		$arts=$model->findAll($criteria);
		$this->render('index',array('arts'=>$arts,'pager'=>$pager));
	}

	public function actionDelete(){
		$model=Art::model();
		if($model->deleteByPk($_GET['id'])){
			Yii::app()->user->setFlash('info','删除成功');
		}else{
			Yii::app()->user->setFlash('info','删除失败');
		}
		$this->actionIndex();
	}

	public function actionmod(){
		$model=new Art;
		$artmodel = $model->find('id=:id',array(":id"=>$_GET['id']));
		if(!empty($_FILES)){
			if(($_FILES['Art']['error']['pic'])===0){
				$upload=CUploadedFile::getInstance($artmodel,'pic');
				$randName=substr(md5(mt_rand()),0,10);
				$ext=$upload->getExtensionName();
				$fileName=$randName.'.'.$ext;
				$dir="./assets/uploads/shuoshuo/";
				if($upload->saveAs($dir.$fileName)){
				//	$image=Yii::app()->Image;
				//	if($image->cut($fileName,100,100,550,550,'')){
					//	$image->thumb($fileName,300,300,'small_');
						$_POST['Art']['pic']=$fileName;
				//	}
				}
			}
		}
		if(!empty($_POST['Art'])){
			$artmodel->title=$_POST['Art']['title'];
			$artmodel->content=$_POST['Art']['content'];
			if(!empty($_POST['Art']['pic'])){
				$artmodel->pic=$_POST['Art']['pic'];
			}
			$artmodel->uid=1;
		//	var_dump($artmodel);
			if($artmodel->validate()){

				$artmodel->ptime=time();
				$artmodel->pip=ip2long($_SERVER['REMOTE_ADDR']);
				if($artmodel->save(false)){
					$this->actionIndex();
				}
			}
		}
		$this->render('add',array('model'=>$artmodel));
	}

	public function actionAdd(){
		$artmodel=new Art;
		if(!empty($_FILES)){
			if(($_FILES['Art']['error']['pic'])===0){
				$upload=CUploadedFile::getInstance($artmodel,'pic');
				$randName=substr(md5(mt_rand()),0,10);
				$ext=$upload->getExtensionName();
				$fileName=$randName.'.'.$ext;
				$dir="./assets/uploads/shuoshuo/";
				if($upload->saveAs($dir.$fileName)){
				//	$image=Yii::app()->Image;
				//	if($image->cut($fileName,0,0,350,350,'')){
				//		$image->thumb($fileName,100,100,'small_');
						$_POST['Art']['pic']=$fileName;
				//	}
				}
			}
		}
		if(!empty($_POST['Art'])){
			$artmodel->title=$_POST['Art']['title'];
			$artmodel->content=$_POST['Art']['content'];
			$artmodel->pic=$_POST['Art']['pic'];
			$artmodel->uid=1;
		//	var_dump($artmodel);
			if($artmodel->validate()){

				$artmodel->ptime=time();
				$artmodel->pip=ip2long($_SERVER['REMOTE_ADDR']);
				if($artmodel->save(false)){
					$this->actionIndex();
				}
			}
		}
		$artmodel->title='';
		$this->render('add',array('model'=>$artmodel));
	}
}

	
	

?>