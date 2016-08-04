<div class="blogindex">
	<div class="blog_box">
		  <h2 class="title"><a href="/" target="_blank"><?php echo $data['title']; ?></a></h2>
		  <ul class="textinfo">
		    <img style="float:left;" src="<?php echo Yii::app()->baseUrl.'/images/speak/'.$data['pic']; ?>">
		    	<?php 
		    		echo $data['content'];
		    	 ?>
		  </ul>
		  <ul class="details">
		    <li class="likes"><a id="cpraise" href="javascript:cpraise(<?php echo $data['id'] ?>);"><?php echo $data['praise'] ?></a></li>
		    <li class="comments"><a href="javascript:;"><?php echo $data['comment'] ?></a></li>
		    <li class="icon-time"><a href="javascript:;"><?php echo $data['updated']; ?></a></li>
		  </ul>
		</div>
</div>