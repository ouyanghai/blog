<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>论坛后台管理</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseurl ?>/assets/admin/css/style.css" />
<!-- jQuery file -->
<script src="<?php echo Yii::app()->request->baseurl ?>/assets/adminjs/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseurl ?>/assets/adminjs/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var $ = jQuery.noConflict();
$(function() {
$('#tabsmenu').tabify();
$(".toggle_container").hide(); 
$(".trigger").click(function(){
	$(this).toggleClass("active").next().slideToggle("slow");
	return false;
});
});
</script>
</head>
<body>
<div id="panelwrap">
  	
	<div class="header">
   <div class="title"><a href="#">后台管理</a></div>
    <div class="header_right">欢迎您, <?php echo Yii::app()->session['admin']['username'] ?> <a href="<?php echo $this->createUrl('user/modpass') ?>" class="settings">修改密码</a> <a href="<?php echo $this->createUrl('public/logout') ?>" class="logout">退出</a> </div>
    
    <div class="menu">
    <ul>
    <li><a href="<?php echo $this->createUrl('default/index') ?>" class="selected">首页</a></li>
    <li><a href="#">设置</a></li>
    <li><a href="#">添加模块</a></li>
    <li><a href="#">编辑模块</a></li>
    <li><a href="#">模块</a></li>
    <li><a href="#">提示</a></li>
    <li><a href="#">后台设置</a></li>
    <li><a href="#">帮助</a></li>
    </ul>
    </div>
    
    </div>
    
    <div class="submenu">
    <ul>
    <li><a href="#" class="selected">设置</a></li>
    <li><a href="#">用户</a></li>
    <li><a href="#">模块</a></li>
    <li><a href="#">编辑模块</a></li>
    <li><a href="#">模板</a></li>
    </ul>
    </div>          
                    
    <div class="center_content">  
 
    <div id="right_wrap">
            
   <div id="right_content">
<?php echo $content ?>
   </div>
   </div>



    <div class="sidebar" id="sidebar">
    <h2>会员管理</h2>
    
        <ul>
            <li><a href="<?php echo $this->createUrl("User/add") ?>" class="selected">添加会员</a></li>
            <li><a href="<?php echo $this->createUrl("User/index") ?>">会员列表</a></li>
           
        </ul>
        <!--
    <h2>分区管理</h2>
    
        <ul>
            <li><a href="<?php echo $this->createUrl("Part/add") ?>">添加分区</a></li>
            <li><a href="<?php echo $this->createUrl("Part/index") ?>">分区列表</a></li>
        </ul> 
      
    <h2>板块管理</h2>
    
        <ul>
            <li><a href="<?php echo $this->createUrl("Cate/add") ?>">添加板块</a></li>
            <li><a href="<?php echo $this->createUrl("Cate/index") ?>">板块列表</a></li>
        </ul>   
         -->

     <h2>心情管理</h2>
        <ul>
            <li><a href="<?php echo $this->createUrl("Art/add") ?>">添加心情</a></li>
            <li><a href="<?php echo $this->createUrl("Art/index") ?>">心情列表</a></li>
        </ul>  
    <h2>相册管理</h2>
        <ul>
            <li><a href="<?php echo $this->createUrl("Part/add") ?>">添加相册</a></li>
            <li><a href="<?php echo $this->createUrl("Part/index") ?>">相册列表</a></li>
            <li><a href="<?php echo $this->createUrl("cate/add") ?>">添加照片</a></li>
        </ul>
    <h2>视频管理</h2>
        <ul>
         <li><a href="<?php echo $this->createUrl("Part/add") ?>">添加视频</a></li>
            <li><a href="<?php echo $this->createUrl("Cate/index") ?>">视频列表</a></li>
        </ul>
    <h2>音乐管理</h2>
        <ul>
            <li><a href="<?php echo $this->createUrl("Part/add") ?>">添加音乐</a></li>
            <li><a href="<?php echo $this->createUrl("Cate/index") ?>">音乐列表</a></li>
        </ul>
    <h2>原创文章管理</h2>
        <ul>
             <li><a href="<?php echo $this->createUrl("Part/add") ?>">添加原创</a></li>
            <li><a href="<?php echo $this->createUrl("Cate/index") ?>">原创文章列表</a></li>
        </ul>
    <h2>前端模板管理</h2>
        <ul>
            <li><a href="<?php echo $this->createUrl("Part/add") ?>">添加前端模板</a></li>
            <li><a href="<?php echo $this->createUrl("Cate/index") ?>">前端模板列表</a></li>
        </ul>
    <h2>推荐文章管理</h2>
        <ul>
            <li><a href="<?php echo $this->createUrl("Part/add") ?>">添加推荐文章</a></li>
            <li><a href="<?php echo $this->createUrl("Cate/index") ?>">推荐文章列表</a></li>
        </ul> 
            

    <h2>回帖管理</h2>
    
        <ul>
            <li><a href="">回帖列表</a></li>
        </ul> 
    <h2>版权申明</h2> 
    <div class="sidebar_section_text">
        此系统版权归ouyang所有！！！
    </div>         
    
    </div>             
    
    
    <div class="clear"></div>
    </div> <!--end of center_content-->
    
    <div class="footer">
Panelo - Free Admin Collect from <a href="http://www.mycodes.net/" title="网站模板" target="_blank">网站模板</a>
</div>

</div>

        
</body>
</html>