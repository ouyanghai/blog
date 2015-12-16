<h2>会员管理</h2> 

<table id="rounded-corner">
    <thead>
    	<tr>
        	<th></th>
            <th>会员ID</th>
            <th>用户名</th>
            <th>用户等级</th>
            <th>注册时间</th>
            <th>注册IP</th>
            <th>编辑</th>
            <th>删除</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="12"><?php  $this->widget('CLinkPager',array(
        		'pages'=>$pager,
        		'prevPageLabel'=>'上一页',
        		'nextPageLabel'=>'下一页',
        		'firstPageLabel'=>'首页',
        		'lastPageLabel'=>'尾页',
        		'header'=>'',
        		'footer'=>'会员记录',
        	)) ?></td>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach($data as $user):?>
    	<tr class="odd">
        	<td><input type="checkbox" name="" /></td>
            <td> <?php echo $user->id;  ?></td>
            <td><?php  echo $user->username; ?></td>
            <td><?php  echo $user->level?></td>
            <td><?php echo date("Y-M-D H:i:s",$user->rtime);  ?></td>
            <td><?php echo long2ip($user->rip);  ?></td>
            <td><a href="<?php echo $this->createUrl('profile/mod',array('id'=>$user->id)) ?>"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/admin/images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="<?php echo $this->createUrl('user/delete',array('id'=>$user->id)) ?>"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/admin/images/trash.gif" alt="" title="" border="0" /></a></td>
        </tr>
    	
  <?php endforeach; ?>
        
    </tbody>
</table>

	<div class="form_sub_buttons">
	<a href="#" class="button green">Edit selected</a>
    <a href="#" class="button red">Delete selected</a>
    </div>
     <div style="color:red;text-align:center">
                <?php 
       
                     if(Yii::app()->user->hasFlash('info')){
                        echo Yii::app()->user->getFlash('info');
                     }
                 ?>
           </div>