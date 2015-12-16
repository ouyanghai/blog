<ul id="tabsmenu" class="tabsmenu">
        <li class="active"><a href="#tab1">添加照片</a></li>
</ul>
    <?php $form=$this->beginWidget('CActiveForm',array('htmlOptions'=>array('enctype'=>'multipart/form-data'))) ?>
        <div id="tab1" class="tabcontent">
            <h3><?php //echo $title ?></h3>
            <div class="form">
     
                <div class="form_row">
                    <?php echo $form->labelEx($model,'pid'); ?>
                    <?php echo $form->dropDownList($model,'pid',$parts,array("class"=>"form_select")); ?>
                 
                </div>
                <div class="form_row">
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->fileField($model,'pic') ?>
                </div>
               
                <div class="form_row">
                     <input type="submit" class="form_submit" value="Submit" />
                </div> 
                <div class="clear"></div>
                    <?php
                        echo $form->error($model,'pid');
                        echo $form->error($model,'name');
                        if(Yii::app()->user->hasFlash('info')){
                            echo Yii::app()->user->getFlash('info');
                        }
                    ?>
                </div>
            </div>
        </div>
    <?php $this->endWidget() ?>