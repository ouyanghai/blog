<?php

class MainController extends AdminController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin(){
		$this->layout = '/layouts/loginMain';
		$model = new User;
		if(isset($_POST['User']) && !empty($_POST['User'])){
			$model->attributes = $_POST['User'];
			if($model->login()){
				echo json_encode('1');exit;
			}else{
				echo json_encode('用户名或密码错误');exit;
			}
		}
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect('login');
	}

	public function filters(){
		return array(
			'auth - login'
		);
	}
}