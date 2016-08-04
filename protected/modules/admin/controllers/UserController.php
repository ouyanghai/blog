<?php
class UserController extends AdminController{

	//用户列表
	public function actionIndex(){
		
		$criteria = new CDbCriteria;
		$criteria->select = 'id,username,level,created,updated';
		if(!empty($_POST['id'])){
			$criteria->addCondition('id='.$_POST['id']);
		}
		if(!empty($_POST['username'])){
			$criteria->addSearchCondition('username',$_POST['username']);
		}
		$dataProvider = new CActiveDataProvider('User',array(
				'criteria' => $criteria,
				'pagination' => array('pageSize'=>20,'pageVar'=>'page'),
			));

		$this->render('index',array(
			'data'=>$dataProvider->getData(),
			'pages' => $dataProvider->getPagination(),
		));
	}
	//用户管理
	public function actionMod(){
		$this->render('mod');
	}
	//用户管理处理修改的ajax请求
	public function actionModPass(){
		if(!empty($_POST)){
			$command = Yii::app()->db->createCommand();
			$sql = "select * from {{user}} where username like '{$_POST['username']}'";
			$row = $command->setText($sql)->queryRow();
			if(empty($row)){
				echo json_encode('没有该用户');
				exit;
			}else{
				if(empty($_POST['password'])){echo json_encode('没有输入密码');return;}
				$res = $command->update('{{user}}',array('password'=>md5($_POST['password'])),"id={$row['id']}");
				if($res){
					echo json_encode(true);exit;
				}
			}
		}
		echo false;
	}
	//用户管理处理删除的ajax请求
	public function actionDel(){
		//ajax处理
		if(isset($_POST['id'])){
			/*
			$sql = 'delete from {{user}} where id=:id';
			$command = Yii::app()->db->createCommand();
			$command->setText($sql);
			$row = $command->execute(array(':id'=>$_GET['id']));
			*/
			$row = User::model()->deleteByPk($_POST['id']);
			if($row){
				echo json_encode('ok');
			}
		}
		echo false;
	}
	//用户列表
	public function actionGetUserInfo(){
		$this->layout = '/layouts/blank';
		if(isset($_GET['id'])){
			$data = User::model()->findByPk($_GET['id']);
			$this->render('userInfo',array('data'=>$data));	
		}
	}
	
	public function actionManage(){
		if(isset($_POST['User']['id'])){
			$model = User::model()->findByPk($_POST['User']['id']);
			$model->attributes = $_POST['User'];
			if($model->save()){
				echo 'ok';
			}else{
				echo false;
			}
		}else{
			echo '服务器没接收到数据';
		}
	}

	public function filters(){
		return array('auth');
	}
}
?>