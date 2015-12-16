<h2>板块列表</h2> 
                    
                    
<table id="rounded-corner">
    <thead>
    	<tr>
        	<th></th>
            <th>板块ID</th>
            <th>板块名称</th>
            <th>所属分区</th>
            <th>主贴个数</th>
            <th>编辑</th>
            <th>删除</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="12">分页</td>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach($cates as $cate): ?>
    	<tr class="odd">
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo $cate->id ?></td>
            <td><?php echo $cate->name ?></td>
            <td><?php echo $cate->pname ?></td>
            <td><?php echo $cate->artTotal ?></td>
            <td><a href="<?php echo $this->createUrl('cate/mod',array('id'=>$cate->id)) ?>"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/admin/images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#"><img src="<?php echo Yii::app()->request->baseurl ?>/assets/admin/images/trash.gif" alt="" title="" border="0" /></a></td>
        </tr>
    	
    	<?php endforeach;?>
  
        
    </tbody>
</table>
