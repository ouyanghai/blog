<?php
	class PublicController extends Common{
		public function actionReg(){
			$this->render('register');
		}
/*
		public function actionLogin(){
			$model=User::model();
			$model->username=$_POST['User']['username'];
			$model->password=$_POST['User']['password'];
			$model->scenario='IndexLogin';
			if($model->validate()){
				session_start();
				$_SESSION['home']['username']=$_POST['User']['username'];
				$_SESSION['home']['isLogin']=1;

				$user=$model->find('username=:user',array(":user"=>$_POST['User']['username']));
				$profile=Profile::model()->find('uid=:uid',array(':uid'=>$user->id));
				$_SESSION['home']['uid']=$user->id;
				$_SESSION['home']['pic']=$profile->pic;
				echo "<script>";
				echo "window.history.back()";
				echo "</script>";
			}else{
				$errors=$model->getErrors();
				@$userError=$errors['username'][0];
				@$passError=$errors['password'][0];
				if(!empty($userError)){
					echo "<script>";
					echo "alert('$userError');";
					echo "</script>";
				}
				if(!empty($passError)){
					echo "<script>";
					echo "alert('$passError');";
					echo "</script>";
				}
				echo "<script>";
				echo "window.history.back()";
				echo "</script>";
			}

		}
*/
		public function actionLogin(){
			$model=User::model();
			if(!empty($_POST)){
				$model->username=$_POST['username'];
				$model->password=$_POST['password'];
				$model->scenario='indexLogin';
				$result=$model->find('username=:user and password=:pass',array(':user'=>$model->username,':pass'=>md5($model->password)));
				if($result)
				//if($model->validate())
				{
					session_start();
					$_SESSION['home']['username']=$_POST['username'];
					$_SESSION['home']['isLogin']=1;

					$user=$model->find('username=:user',array(":user"=>$_POST['username']));
					$profile=Profile::model()->find('uid=:uid',array(':uid'=>$user->id));
					$_SESSION['home']['uid']=$user->id;
					$_SESSION['home']['pic']=$profile->pic;
					echo json_encode(array('code'=>'success','username'=>$_POST['username'],'pic'=>Yii::app()->request->baseUrl."/assets/uploads/small_".$profile->pic));
				
				}else{
					//$this->redirect(array('index/index'));
				}

			}
		}

		public function actionLogout(){
			session_start();
			$_SESSION['home']=array();
			$this->redirect(array('index/index'));
		}
	}

?>