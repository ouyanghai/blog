<?php
class UserController extends Common{


	public function actionModPass(){
		$usermodel=User::Model();
		$usermodel->scenario='modepass';
		$usermodel->username=Yii::app()->session['admin']['username'];

		if(!empty($_POST['User'])){
			$usermodel->attributes=$_POST['User'];
			if($usermodel->validate()){
				$result=$usermodel->updateAll(array('password'=>md5($_POST['User']['newpass'])),'username=:user',array(":user"=>$usermodel->username));
				if($result>0){
					Yii::app()->user->setFlash('info','密码修改成功');
				}else{
					Yii::app()->user->setFlash('info','密码修改失败');
				}
			}
		}
		$this->render('modepass',array('model'=>$usermodel));
	}

	public function actionAdd(){
		//$usermodel=User::Model();
		 $usermodel=new User;
		if(!empty($_POST['User'])){
			$usermodel->username=$_POST['User']['username'];
			$usermodel->password=md5($_POST['User']['password']);
			$usermodel->repass=md5($_POST['User']['repass']);
			$usermodel->scenario='add';
			if($usermodel->validate()){
				$usermodel->rtime=time();
				$usermodel->rip=ip2long($_SERVER['REMOTE_ADDR']);
				if($usermodel->save()){

					$id=$usermodel->getPrimaryKey();
					$profile=new profile;
					$profile->uid=$id;
					if($profile->save(false)){
						Yii::app()->user->setFlash('info','添加用户成功');
					}
					else{
					Yii::app()->user->setFlash('info','添加用户失败');	
				}
				
				}
			}
		}
		$usermodel->username="";
		$usermodel->password="";
		$usermodel->repass="";
		$this->render('add',array('model'=>$usermodel));
	}

	public function actionIndex(){
		
		
		$model=User::model();
		/*start 分页*/
		$criteria=new CDbCriteria();
		$total=$model->count($criteria);
		
		$pager=new CPagination($total);
		$pager->pageSize=5;
		$pager->applyLimit($criteria);
		/*end 分页*/
		$data=$model->findAll($criteria);
		

		$this->render('index',array('data'=>$data,'pager'=>$pager));
	}

	public function actionDelete(){
		$model=User::model();
		if($model->deleteByPk($_GET['id'])){
			Yii::app()->user->setFlash('info','删除成功');
		}else{
			Yii::app()->user->setFlash('info','删除失败');
		}
		$this->redirect(array('index'));
	}
}

?>