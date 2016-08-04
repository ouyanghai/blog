<ul class="bloglist">
	<?php if(!empty($data)){ ?>
	<?php foreach($data as $speak){ $speak->content = htmlspecialchars_decode($speak->content);?>
	<li>
		<div class="arrow_box">
		  <div class="ti"></div>
		  <!--三角形-->
		  <div class="ci"></div>
		  <!--圆形-->
		  <h2 class="title"><a href="<?php echo $this->createUrl('feel',array('id'=>"{$speak->id}")) ?>"><?php echo $speak->title; ?></a></h2>
		  <ul class="textinfo">
		    <img src="<?php echo Yii::app()->baseUrl.'/images/speak/'.$speak->pic; ?>">
		    <p><?php if(mb_strlen($speak->content) > 450){
		    		echo mb_substr($speak->content,0,450); 
		    		echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='".Yii::app()->createUrl("/web/feel",array('id'=>$speak->id))."'>详细&gt;&gt;</a>";
		    	}else{
		    		echo $speak->content;
		    	} ?>

		    </p>
		  </ul>
		  <ul class="details">
		    <li  class="likes"><a id="cpraise" href="javascript:cpraise(<?php echo $speak->id; ?>);"><?php echo $speak->praise; ?></a></li>
		    <li class="comments"><a href="javascript:;"><?php echo $speak->comment; ?></a></li>
		    <li class="icon-time"><a href="javascript:;"><?php echo $speak->updated;; ?></a></li>
		  </ul>
		</div>
		<!--arrow_box end--> 
	</li>
	<?php }}else{echo "博主暂无此类日志！！！";} ?>
</ul>