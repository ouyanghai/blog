<link rel="stylesheet" type="text/css" href="<?php echo $this->assets['module'] ?>/css/album.css">
<script type="text/javascript" src="<?php echo $this->assets['module'] ?>/js/album.js"></script>
<div class="album_create">
	<form action="<?php echo $this->createUrl('doadd'); ?>" method="post" enctype="multipart/form-data">
	<fieldset style="width:600px;padding-bottom:20px;">
		<legend>添加照片</legend>
		<ul id="album_ul">
			<li style="height:20px;overflow:hidden;">选择相册:
				<select name="album">
				<?php foreach($data as $val){ ?>
					<option value="<?php echo $val['id'] ?>"><?php echo $val['title'] ?></option>
				<?php } ?>
				</select>
			</li>
			<li>相册图片:<input type='file' name='pic[]' id='pic' multiple="multiple"/></li>
			<li><div id='files' style="margin-left:35px;"></div></li>
			<li><input type="submit" id="sub" value="提交"/></li>
		</ul>
	</fieldset>
		
	</form>
</div>