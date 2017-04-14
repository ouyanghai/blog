<?php
class AdminController extends Controller{
	
	public $layout='/layouts/main';
	public $tool_menu = array();
	
	public function init(){
		parent::init();
		//后台管理菜单
		$this->tool_menu = array(
			array(
				'title' => '用户管理',
				'id' => 'admin/user',				
				array('label' => '修改用户', 'url' => '/admin/user/mod'),
				array('label' => '用户列表', 'url' => '/admin/user/index'),
			),
			array(
				'title' => '说说管理',
				'id' => 'admin/speak',				
				array('label' => '发表说说', 'url' => '/admin/speak/post'),
				array('label' => '说说列表', 'url' => '/admin/speak/index'),
			),
			array(
				'title' => '相册管理',
				'id' => 'admin/album',
				array('label' => '创建相册', 'url' => '/admin/album/create'),
				array('label' => '相册信息', 'url' => '/admin/album/index'),
				array('label' => '添加照片', 'url' => '/admin/album/add'),
				array('label' => '照片信息', 'url' => '/admin/album/picindex'),
			),

		);
	}
}
?>