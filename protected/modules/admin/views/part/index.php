<h2>相册列表</h2> 

<table id="rounded-corner">
    <thead>
    	<tr>
        	<th></th>
            <th>相册ID</th>
            <th>相册名称</th>
            <th>照片数量</th>
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
   		<?php foreach($parts as $part): ?>
    	<tr class="odd">
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo $part->id; ?></td>
            <td><?php echo $part->name; ?></td>
            <td><?php echo $part->total; ?></td>
            <td><a href="<?php echo $this->createUrl('Part/mod',array('id'=>$part->id)); ?>"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/admin/images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="<?php echo $this->createUrl('part/del',array('id'=>$part->id)) ?>"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/admin/images/trash.gif" alt="" title="" border="0" /></a></td>
        </tr>
    	
		<?php endforeach; ?>
        
    </tbody>
</table>

	<div class="form_sub_buttons">
	<a href="#" class="button green">Edit selected</a>
    <a href="#" class="button red">Delete selected</a>
    </div>
     <div style="color:red;text-align:center;">
                <?php 
       
                     if(Yii::app()->user->hasFlash('info')){
                        echo Yii::app()->user->getFlash('info');
                     }
                 ?>
    </div>