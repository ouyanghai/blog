<?php
class PublicController extends Controller{
	public $layout='/layouts/login';

	public function actionLogin(){
		$usermodel= User::model();
		$usermodel->scenario="login";
		if(!empty($_POST['User'])){
			$usermodel->attributes=$_POST['User'];

			if($usermodel->validate()){
			//	session_start();
				$_SESSION['admin']['islogin']=1;
				$_SESSION['admin']['username']=$_POST['User']['username'];
				$this->redirect(array('default/index'));
			}
		}

		
		//var_dump(Yii::app()->db);
		$this->render('login',array('model'=>$usermodel));
	}

	public function actions(){
		return array(
				'captcha'=>array(
						'class'=>'system.web.widgets.captcha.CCaptchaAction',
						'width'=>145,
						'height'=>36,
						'backColor'=>0xefcdab,
						'minLength'=>4,
						'maxLength'=>4,
						'offset'=>5
					)
			);
	}

	public function actionLogout(){
	//	$_SESSION['admin']=array();
		session_start();
		$_SESSION['admin']=array();
		if(empty($_SESSION['admin'])){
			$this->redirect(array('public/login'));
		}
	}
}

?>