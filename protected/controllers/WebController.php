<?php
class WebController extends TopController{
	public $layout = '//layouts/main';
	public $_command='';
	public $speak=array();
	public $album = array();
	public function init(){
		parent::init();
		$this->_command = Yii::app()->db->createCommand();
		$speak_sql = "select id,title from ou_speak order by updated desc limit 5";
		$this->speak = $this->_command->setText($speak_sql)->queryAll();
		$album_sql = "select id,title,pic from ou_album order by updated desc limit 3";
		$this->album = $this->_command->setText($album_sql)->queryAll();
	}

	public function actionIndex(){
		$this->render('index');
	}
	//3D旋转相册
	public function actionAlbum(){
		$this->layout = '//layouts/malbum';
		$command = Yii::app()->db->createCommand();
		$sql = "select * from ou_album";
		$res = $command->setText($sql)->queryAll();
		$pres='';
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			$pSql = "select id,aid,pic from ou_albumpic where aid={$id}";
			$pres = $command->setText($pSql)->queryAll();
		}
		$this->render('Album',array('data'=>$res,'pdata'=>$pres));
	}
	//具体某类照片
	public function actionPic(){
		$this->render('pic');
	}

	//说说列表
	public function actionSpirit(){
		$criteria = new CDbCriteria;
		if(!empty($_GET['s'])){
			$criteria->addSearchCondition('title',htmlspecialchars($_GET['s']));
		}
		$criteria->select = "id,praise,comment,title,pic,content,updated";
		$criteria->order = "updated desc";
		$dataProvider = new CActiveDataProvider('speak',array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 6,
				'pageVar' => 'page',
			),
		));
		$this->render('spirit',array(
			'data' => $dataProvider->getData(),
			'pages' => $dataProvider->getPagination(),
		));
	}
	//具体某条说说
	public function actionFeel(){
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			$sql = "select * from ou_speak where id={$id}";
			$res = $this->_command->setText($sql)->queryRow();
			$content = htmlspecialchars_decode($res['content']);
			$res['content'] = preg_replace("/^<p>*(.*)<\/p>$/", '$1', $content);
			$this->render('feel',array('data'=> $res));	
		}else{
			Yii::app()->redirect('/web/spirit');
		}
		
	}
	public function actionCpraise(){
		$msg = array(
			'success' => false,
			'praise' => 0,
		);
		if(!empty($_POST['click']) && !empty($_POST['id'])){
			$id = $_POST['id'];
			$model = speak::model()->findByPk($id);
			if(!empty($model)){
				$model->praise += 1;
				$model->save();
				$msg['praise'] = $model->praise;
				$msg['success'] = true;
				echo json_encode($msg);
				Yii::app()->end();
			}
		}
		echo json_encode($msg);
		Yii::app()->end();
	}

	public function actionKnowledge(){
		$this->render('knowledge');
	}

	public function actionShare(){
		$this->render('share');
	}

	public function actionAbout(){
		$this->render('about');
	}
}
?>