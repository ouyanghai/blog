<?php
	class User extends CActiveRecord{
		public $captcha;
		public $oldpass;
		public $newpass;
		public $repass;
		public static function model($className=__CLASS__){
			return parent::model($className);
		}

		public function tableName(){
			return "{{user}}";
		}

		public function rules(){
			return array(
					array('captcha','captcha','message'=>"对不起，验证码错误",'on'=>'login'),
					array('username','required','message'=>'username can not be null','on'=>'login,add,IndexLogin'),
					array('password','required','message'=>"password cannot be null",'on'=>'login,add,IndexLogin'),
					array('password','checkPass','on'=>'login,IndexLogin'),

					array('oldpass','checkOldPass','on'=>'modepass'),
					array('newpass','required','message'=>'newpass can not be null','on'=>'modepass'),
					array('repass','compare','compareAttribute'=>'newpass','message'=>'两次密码不一致','on'=>'modepass'),

					array('repass','compare','compareAttribute'=>'password','message'=>'两次密码不一致','on'=>'add'),
					array('username','unique','className'=>'User','message'=>'用户名已经被使用','on'=>'add'),
				);
		}

		public function checkOldPass(){
			$result=$this->find("username=:user and password=:pass",array(':user'=>$this->username,":pass"=>md5($this->oldpass)));
			if(is_null($result)){
				$this->addError('oldpass','原始密码错误');
			}
		}

		public function checkPass(){
			if(!$this->hasErrors()){
				$result=$this->find('username=:user and password=:pass',array(':user'=>$this->username,':pass'=>md5($this->password)));
				if(is_null($result)){

					//如果用户名或密码错误，将错误提示添加到验证码出，
					//目的在于让“提示”显示在验证码错误的提示位置
					$this->addError('captcha','username or password wrong');
				}
			}
		}
	}