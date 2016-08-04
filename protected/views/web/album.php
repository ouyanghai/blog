<div id="stage">	
	<ul id="container">
	<?php foreach($data as $album){ ?>
		<li>
            <img src="<?php echo '/images/album/face/'.$album['pic'] ?>"/>
            <span><?php echo $album['title']; ?></span>
            <a href="<?php echo $this->createUrl('album',array('id'=>$album['id'])); ?>">打开相册</a>
        </li>
	<?php } ?>
	</ul>
</div>
<?php if(isset($_GET['id'])){ ?>

<div id='album-mask'>
	<div id="close"><a id="close-x" href="javascript:;"><img src="<?php echo $this->assets['app'] ?>/images/bt-fechar-zoomvisualizer.png"></a>
	</div>
	<div id="main-pic">
		<a id="prev" href="javascript:;"></a>
		<ul>
		<?php foreach($pdata as $val){ ?>
			<li>
				<div class="box-img"><img src="/images/album/<?php echo $val['aid'].'/'.$val['pic']; ?>"></div>
			</li>
		<?php } ?>
		</ul>
		<a id="next" href="javascript:;"></a>
	</div>
	<div id="thumb-pic">
		<div id="thumb-box">
			<a id="thumb-prev" href="javascript:;"></a>
			<ul>
			<?php foreach($pdata as $v){ ?>
				<li>
					<img src="/images/album/<?php echo $v['aid'].'/'.$v['pic']; ?>">
					<div class="img-mask"></div>
				</li>
			<?php } ?>
			</ul>
			<a id="thumb-next" href="javascript:;"></a>
		</div>
	</div>
</div>
<?php } ?>