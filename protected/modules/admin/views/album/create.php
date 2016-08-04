<link rel="stylesheet" type="text/css" href="<?php echo $this->assets['module'] ?>/css/album.css">
<script type="text/javascript" src="<?php echo $this->assets['module'] ?>/js/album.js"></script>
<div class="album_create">
	<form action="<?php echo $this->createUrl('dopost'); ?>" method="post" enctype="multipart/form-data">
	<fieldset style="width:600px;padding-bottom:20px;">
		<legend>创建相册</legend>
		<ul id="album_ul">
			<input type="hidden" name="id" value="<?php echo !empty($data->id)?$data->id:'' ?>"/>
			<li>相册名称:<input type="text" name="title" id="title" placeholder="请输入相册名称" value="<?php echo !empty($data->title)?$data->title:'' ?>"/></li>
			<li>封面图片:<input type="file" name="pic" id="pic" /></li>
			<li><div id='files' style="margin-left:35px;"></div></li>
			<li><input type="submit" id="sub" value="提交"/></li>
		</ul>
	</fieldset>
		
	</form>
</div>