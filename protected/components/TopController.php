<?php 
class TopController extends Controller{
	public $menu;
	public $layout = "//layouts/main";
	public function init(){
		parent::init();
		$this->menu = array(
			array('label'=>'首页','title'=>'首页','url'=>'/web/index'),
			array('label'=>'随记','title'=>'心情','url'=>'/web/spirit'),
			array('label'=>'照片','title'=>'照片','url'=>'/web/album'),
			array('label'=>'学无止境','title'=>'学无止境','url'=>'/web/knowledge'),
			array('label'=>'分享','title'=>'分享','url'=>'/web/share'),
			array('label'=>'关于我','title'=>"关于我","url"=>'/web/about'),
		);
	}
}
?>