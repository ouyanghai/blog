<?php
class Common extends Controller{
	public $model=null;
	public function init(){
			$this->model=User::model();
	}
}

?>