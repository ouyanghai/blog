<?php
	class ForumController extends Common{

	/*	public function filters(){
			return array(
					'system.web.widgets.COutputCache+index',
					'duration'=>200,
					'varyByParam'=>array('cid'),
				)
		}*/

		public function actionIndex(){
			if(!$arts=Yii::app()->cache->get('forum-index-'.$_GET['cid'])){
				$cid=$_GET['cid'];
				$arts=Art::model()->findAll('cid=:cid',array(':cid'=>$cid));

				Yii::app()->cache->set('forum-index-'.$_GET['cid'],$arts);
			}
			$this->render('index',array('arts'=>$arts));
		} 
	}
?>