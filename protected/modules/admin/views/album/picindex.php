<link rel="stylesheet" type="text/css" href="<?php echo $this->assets['module'] ?>/css/album.css">
<script type="text/javascript" src="<?php echo $this->assets['module'] ?>/js/album.js"></script>
<div id='search_module'>
	<form id='search_form' method='post' action='<?php $this->createUrl("picindex"); ?>'>
	<ul>
		<li>相册名称:<input type="text" name='albumname'/></li>
		<li><input type='submit' value="确定" /></li>
	</ul>
	</form>
</div>
<div >
	<table class ='itemtable'>
		<tr>
			<th>ID</th>
			<th>所属相册</th>
			<th>图片</th>
			<th>操作</th>
		</tr>
		<?php foreach($data as $value){ ?>
		<tr>
			<?php foreach($value as $key => $val){ if(!empty($val)){ ?>
			<td>
				<?php if($key == 'pic'){ ?>
				<img style="width:100px;height:100px;" src="<?php echo '/images/album/'.$value['aid'].'/'.$val; ?>">
				<?php }elseif($key == 'aid'){
					if(isset($index[$val])){
						echo $index[$val];	
					}
				}else{echo $val;} ?>
			</td>
			<?php }} ?>
			<td>
			<a href="javascript:albumPicDel(<?php echo $value['id']; ?>);">删除</a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="6">
				共<?php echo $pages->itemCount; ?>条记录,当前第<?php echo $pages->currentPage+1;echo "/{$pages->pageCount}"; ?>页
				<?php $this->widget('CLinkPager',array(
					'header' => '',
					'firstPageLabel' => '首页',
					'lastPageLabel' => '尾页',
					'prevPageLabel' => '上一页',
					'nextPageLabel' => '下一页',
					'pages' => $pages,
					'maxButtonCount' => 5,
				)); ?>
			</td>
		</tr>
	</table>
</div>