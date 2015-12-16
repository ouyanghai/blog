<?php
	class ArtController extends Common{
		public function actionIndex(){
		$arts=Art::model()->findAll();	
		$this->render('index',array('arts'=>$arts));
		}

		public function actionArt()
		{
			$art=Art::model()->findbypk($_GET['id']);
			$this->render('art',array('art'=>$art));
		}
	}

?>