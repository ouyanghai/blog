	<!--内容部分start-->
		<div class="content">
			
			<!--发帖按钮start-->
			<div class="send_btn">
				<div class="send">
					<a href=" <?php echo $this->createUrl('art/add',array('cid'=>$_GET['cid'])) ?>"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/home/images/pn_post.png" /></a>
				</div>
				<div style="clear:both"></div>
			</div>
			<!--发帖按钮end-->
			
			<!--帖子列表部分start-->
			<div class="post_list" >
				
				<!--帖子列表标题部分start-->
				<div class="post_title">
					<table cellspacing=0 cellpadding=0 width='100%'>
						<tr>
							<th class="list_title">帖子标题</th>
							<th class="list_author">作者</th>
							<th class="list_count">回复/查看</th>
							<th class="list_ptime">最后发表</th>
						</tr>
					</table>
				</div>
				<!--帖子列表标题部分end-->
				
				<!--帖子列表内容部分start-->
				<div class="post_content">
					<table cellspacing=0 cellpadding=0 width='100%'>
					<?php if(empty($arts)):?>
						<tr colspan="4">
						<td>亲，该板块没有文章</td>
						</tr>
					<?php endif; ?>
					<?php foreach($arts as $art): ?>
						<tr>
							<td class="list_title"><a href="<?php echo $this->createUrl('art/index',array('aid'=>$art->id)) ?>"><?php echo $art->title; ?></a></td>
							<td class="list_author">admin</td>
							<td class="list_count">10/20</td>
							<td class="list_ptime">2012-12-20</td>
						</tr>	
						<?php endforeach; ?>		
					</table>
				</div>
				<!--帖子列表内容部分end-->
				
			</div>
			<!--帖子列表部分end-->
			
			<!--友情链接部分start-->
			<div id="friend_link">
				
				<!--友情链接标题部分start-->
				<div id="fri_title">
				  <span>友情链接</span>
				</div>
				<!--友情链接标题部分end-->
				
				<!--友情链接内容部分start-->
				<div class="fri_content">
					<div class="fri_left"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/home/images/20080926_9b2baec56b95a9ae46ab8ir8uBrEJQjx.gif" /></div>
					<div class="fri_right">
					  <p><strong>Discuz! 产品</strong></p>
					  <p>Discuz! 官方网站 用户会员区</p>
					</div>
				</div>
				<!--友情链接内容部分end-->
				
			</div>
			<!--友情链接部分end-->
				
		</div>
		<!--内容部分end-->