<?php
class ProfileController extends Common{

	public function actionMod(){
		$model=Profile::model();
		$profile = $model->find('uid=:id',array(":id"=>$_GET['id']));
		if(!empty($_FILES)){
			if(($_FILES['Profile']['error']['pic'])===0){
				$upload=CUploadedFile::getInstance($profile,'pic');
				$randName=substr(md5(mt_rand()),0,10);
				$ext=$upload->getExtensionName();
				$fileName=$randName.'.'.$ext;
				$dir="./assets/uploads/";
				if($upload->saveAs($dir.$fileName)){
					$image=Yii::app()->Image;
					if($image->cut($fileName,100,100,550,550,'')){
						$image->thumb($fileName,200,200,'big_');
						$image->thumb($fileName,150,150,'middle_');
						$image->thumb($fileName,100,100,'small_');
						$_POST['Profile']['pic']=$fileName;
					}
				}
			}
		}
		
		if(!empty($_POST['Profile'])){
			$profile->attributes=$_POST['Profile'];
			
			if($profile->validate()){	
				$profile->birthday=strtotime($_POST['Profile']['birthday']);			
				$_POST['Profile']['birthday']=strtotime($_POST['Profile']['birthday']);
				$_POST['Profile']['signed']=htmlspecialchars($_POST['Profile']['signed']);
				if($profile->updateAll($_POST['Profile'],'uid=:uid',array(':uid'=>$_POST['Profile']['uid']))){
					Yii::app()->user->setFlash('info','update successful');
				}else{
					Yii::app()->user->setFlash('info','update failed');
				}
			}

		}
		$user=User::model()->findbypk($_GET['id']);
		$profile->username=$user->username;
		$profile->birthday=date('Y-m-d',$profile->birthday);
		
		$this->render('mod',array('model'=>$profile));
	}
}

?>