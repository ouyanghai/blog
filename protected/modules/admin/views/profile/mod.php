<style>
	#Profile_sex label{
		float:none;
	}
</style>


<ul id="tabsmenu" class="tabsmenu">
        <li class="active"><a href="#tab1">会员管理</a></li>
       
    </ul>
    <?php $form=$this->beginWidget('CActiveForm',array('htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
    <div id="tab1" class="tabcontent">
        <h3>修改会员信息</h3>
        <div style="color:red;text-align:center">
        <?php
            if(Yii::app()->user->hasFlash('info')){
                    echo Yii::app()->user->getFlash('info');
                }
        ?>
        </div>
        <div class="form">
            
			<div class="form_row">
            <label>用户ID:</label>
            <?php echo $form->textField($model,'uid', array('class'=>'form_input','readonly'=>'readonly')) ?>
            </div>

            <div class="form_row">
            <label>用户名:</label>
            <?php  echo $form->textField($model,'username', array('class'=>'form_input','disabled'=>'disabled')) ?>
            </div>

            <div class="form_row">
            <label>真实姓名:</label>
            <?php  echo $form->textField($model,'t_name', array('class'=>'form_input')) ?>
            </div>
             
			<div class="form_row">
            <label>性别:</label>
            <?php echo $form->radioButtonList($model,'sex',array('保密','男','女'),array('separator'=>'')); ?>
            </div>

            <div class="form_row">
            <label>年龄:</label>
            <?php echo $form->numberField($model,'age',array('class'=>'form_input')); ?>
            </div>
			
			<div class="form_row">
            <label>学历:</label>
            <?php echo $form->dropDownList($model,'edu',array('请选择','小学','初中','高中','大专','本科','硕士','博士'),array('class'=>'form_input')) ?>
            </div>

            <div class="form_row">
            <label>Email:</label>
            <?php echo $form->emailField($model,'email',array('class'=>'form_input')) ?>
            </div>
            
            <div class="form_row">
            <label>电话:</label>
            <?php echo $form->textField($model,'telphone',array('class'=>'form_input')) ?>
            </div>
            
			<div class="form_row">
            <label>QQ:</label>
             <?php echo $form->numberField($model,'qq',array('class'=>'form_input')) ?>
            </div>

            <div class="form_row">
            <label>出生日期:</label>
             <?php echo $form->dateField($model,'birthday',array('class'=>"form_input")) ?>
            </div>

			<div class="form_row">
            <label>头像:</label>
            <?php echo $form->fileField($model,'pic') ?>
            </div>
			
             <div class="form_row">
            <label>个性签名:</label>
           <?php echo $form->textArea($model,'signed',array('class'=>'form_textarea')) ?>
            </div>
            <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" />
            </div> 
            <div class="clear"></div>
            <?php
            	echo $form->error($model,'uid');
            	echo $form->error($model,'age');
            	echo $form->error($model,'sex');
            	echo $form->error($model,'edu');
            	echo $form->error($model,'email');
            	echo $form->error($model,'qq');
            	echo $form->error($model,'birthday');
            	echo $form->error($model,'telphone');
            	echo $form->error($model,'signed');
            	
            ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>