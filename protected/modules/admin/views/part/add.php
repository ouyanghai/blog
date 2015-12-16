 <ul id="tabsmenu" class="tabsmenu">
        <li class="active"><a href="#tab1">相册管理</a></li>

    </ul>
    <div id="tab1" class="tabcontent">
    <?php $form =$this->beginWidget('CActiveForm',array('htmlOptions'=>array('enctype'=>'multipart/form-data'))) ?>
        <h3><?php echo $title ?></h3>
		<div style="color:red;text-align:center">
                <?php 
                     echo $form->error($model,'name');
                     if(Yii::app()->user->hasFlash('info')){
                        echo Yii::app()->user->getFlash('info');
                     }
                 ?>
         </div>
        <div class="form">        
            <div class="form_row">
            <?php echo $form->label($model,'name');?>
            <?php echo $form->textField($model,'name',array("class"=>"form_input")); ?>
            </div>

             <div class="form_row">
                    <?php echo $form->labelEx($model,'picname'); ?>
                    <?php echo $form->fileField($model,'pic') ?>
                </div>
             
            
            <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" />
            </div> 
            <div class="clear"></div>
        </div>
        <?php $this->endWidget() ?>
    </div>