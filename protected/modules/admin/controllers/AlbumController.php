<?php
class AlbumController extends AdminController{
	public function actionIndex(){
		$criteria = new CDbCriteria;
		$criteria->select = "id,title,pic,created,updated";
		$dataProvider = new CActiveDataProvider('album',array(
			'criteria' => $criteria,
			'pagination' => array(
				'pagesize' => 5,
				'pageVar' => 'page',
			),
		));
		$this->render('index',array(
			'data' => $dataProvider->getData(),
			'pages' => $dataProvider->getPagination(), 
		));
	}

	public function actionCreate(){
		$this->render('create');
	}
	public function actionDoPost(){
		$model = '';
		//如果是修改后提交
		if(!empty($_POST['id'])){
			$model = Album::model()->findByPk($_POST['id']);
		}
		if(empty($model)){
			$model = new Album;
			$model->created = date('Y-m-d h:i:s',time());	
		}

		$model->title = CHtml::encode($_POST['title']);
		$pic = $this->uploadFile("album/face");
		if(empty($pic)){
			Yii::app()->user->setFlash('uploadFile','文件上传失败!');
			$this->redirect('create');
		}
		$model->pic = $pic[0];
		$model->updated = date('Y-m-d h:i:s',time());
		if($model->save()){
			$this->redirect('index');
		}
		$this->redirect('create');
	}

	public function actionAlbumDel(){
		//接收ajax数据
		if(empty($_POST['id'])){
			echo false;
		}
		$id = $_POST['id'];
		$model = Album::model()->findByPk($id);
		if(empty($model)){
			echo json_encode('查无此数据');
			Yii::app()->end();
		}
		$res = $model->delete();
		if($res > 0){
			echo json_encode(true);
			Yii::app()->end();
		}else{
			echo false;
			Yii::app()->end();
		}
	}

	public function actionAlbumPicDel(){
		//接收ajax数据
		if(empty($_POST['id'])){
			echo false;
		}
		$id = $_POST['id'];
		$model = AlbumPic::model()->findByPk($id);
		if(empty($model)){
			echo json_encode('查无此数据');
			Yii::app()->end();
		}
		$res = $model->delete();
		if($res > 0){
			echo json_encode(true);
			Yii::app()->end();
		}else{
			echo false;
			Yii::app()->end();
		}
	}

	public function actionMod(){
		//如果是修改
		if(!empty($_GET['id'])){
			$model = Album::model()->findByPk($_GET['id']);
			if(!empty($model)){
				$this->render('create',array('data'=>$model));
			}else{
				$this->render('index');
			}
		}
	}

	public function actionAdd(){
		$command = Yii::app()->db->createCommand();
		$sql = "select * from `ou_album`";
		$res = $command->setText($sql)->queryAll();
		$this->render('add',array('data'=>$res));
	}

	public function actionDoAdd(){
		$aid = $_POST['album'];
		$pics = $this->uploadFile("album/{$aid}/");
		foreach($pics as $pic){
			$model = new AlbumPic;
			$model->aid = $aid;
			$model->pic = $pic;
			$result = $model->save();
		}
		$this->redirect('add');
	}

	public function actionPicIndex(){
		$albumaid = '';
		$command = Yii::app()->db->createCommand();
		$sql = "select id,title from `ou_album`";
		$res = $command->setText($sql)->queryAll();
		$arr = array();
		foreach($res as $val){
			$arr[$val['id']] = $val['title'];
			if(!empty($_POST['albumname']) && $_POST['albumname']==$val['title']){
				$albumaid = $val['id'];
			}
		}

		$criteria = new CDbCriteria;
		if(!empty($albumaid)){
			$criteria->addCondition("aid={$albumaid}");
		}
		$criteria->select = "id,aid,pic";
		$pic_provider = new CActiveDataProvider('albumpic',array(
			'criteria' => $criteria,
			'pagination' => array(
				'pagesize' => 10,
				'pageVar' => 'page',
			),
		));
		$data = array();
		if(!empty($res)){
			$data = $pic_provider->getData();
		}
		$this->render('picindex',array(
			'data' => $data,
			'index' => $arr,
			'pages' => $pic_provider->getPagination(),
		));
	}
}

?>