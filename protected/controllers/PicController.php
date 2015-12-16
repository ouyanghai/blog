<?php

class PicController extends Common
{
	public $layout='//pic/home';
	public function actionIndex()
	{
		$parts=Part::model()->findAll();
		if(!empty($_GET['pid'])){
			$cate=Cate::model()->find('pid=:pid',array(':pid'=>$_GET['pid']));
			if($cate==NULL){
				unset($_GET['pid']);
				$this->render('index',array('parts'=>$parts,'ispid'=>1));
			}else{
				$this->render('index',array('parts'=>$parts));
			}
		}else{
			$this->render('index',array('parts'=>$parts));
		}
			
	}
	
}

?>
