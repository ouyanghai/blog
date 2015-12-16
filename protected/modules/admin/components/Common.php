<?php
class Common extends Controller{
	public $layout='/layouts/admin';
	public function init(){
		//session_start();
		if(empty(Yii::app()->session['admin']['islogin'])){
			$this->redirect(array('public/login'));
			exit;
		}
	}
}

?>