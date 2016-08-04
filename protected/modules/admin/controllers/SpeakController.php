<?php
class SpeakController extends AdminController{

	public function actionIndex(){
		$criteria = new CDbCriteria;
		$criteria->select = 'id,title,pic,created,updated';
		$criteria->order = "updated desc";
		$dataProvider = new CActiveDataProvider('speak',array(
			'criteria' => $criteria,
			'pagination' => array(
					'pageSize'=>5,
					'pageVar'=>'page',
				),
		));
		$this->render('index',array(
				'data' => $dataProvider->getData(),
				'pages' => $dataProvider->getPagination(),
			));
	}

	public function actionPost(){

		$this->render('post');
	}

	public function actionSpeakDel(){
		//接收ajax数据
		if(empty($_POST['id'])){
			echo false;
		}
		$id = $_POST['id'];
		$model = Speak::model()->findByPk($id);
		if(empty($model)){
			echo json_encode('查无此数据');
		}
		$res = $model->delete();
		if($res > 0){
			echo json_encode(true);
		}else{
			echo false;
		}
	}

	public function actionMod(){
		//如果是修改
		if(!empty($_GET['id'])){
			$model = Speak::model()->findByPk($_GET['id']);
			if(!empty($model)){
				$this->render('post',array('data'=>$model));
			}
		}
	}

	public function actionDoPost(){
		$model = '';
		//如果是修改后提交
		if(!empty($_POST['id'])){
			$model = Speak::model()->findByPk($_POST['id']);
		}
		if(empty($model)){
			$model = new Speak;
			$model->created = date('Y-m-d H:i:s',time());	
		}

		$model->title = $_POST['title'];
		$model->content = htmlspecialchars($_POST['content']);
		$pic = $this->uploadFile('speak');
		if(empty($pic)){
			Yii::app()->user->setFlash('uploadFile','文件上传失败!');
			$this->redirect('post');
		}
		$model->pic = $pic[0];
		$model->updated = date('Y-m-d H:i:s',time());
		if($model->save()){
			$this->redirect('index');
		}
		$this->redirect('post');
	}
}
?>