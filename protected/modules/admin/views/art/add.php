<style>
	#Profile_sex label{
		float:none;
	}
</style>
<style>
    .title{
        width:90%;
      
        margin-bottom:5px;
        padding-left:0px;
        padding-bottom:0px;
        padding-top: 0px;
    }
    .content{
        width:90%;
        min-height:300px;
    }
</style>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/ue/ueditor.config.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/ue/ueditor.all.min.js"></script>

<ul id="tabsmenu" class="tabsmenu">
        <li class="active"><a href="#tab1">今日心情</a></li>
       
</ul>
    <?php $form=$this->beginWidget('CActiveForm',array('htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
        <div id="tab1" class="tabcontent">
            <h3>今日心情</h3>
            <div style="color:red;text-align:center">
                <?php
                    if(Yii::app()->user->hasFlash('info')){
                            echo Yii::app()->user->getFlash('info');
                        }
                ?>
            </div>
            <div class="form">
                <div class="form_row">
                    <div>
                        <label>头像:</label>
                        <?php echo $form->fileField($model,'pic') ?>
                    </div>

                    <br/>
                    <div class="form_row">
                         <?php echo $form->textField($model,'title',array('class'=>'title','placeholder'=>'请输入文章标题')) ?>
                    </div>

                    <div class="form_row">
                         <?php echo $form->textArea($model,'content',array('class'=>'content','id'=>'content')) ?>
                    </div>
        			
        			
                    <div class="form_row">
                        <input type="submit"  value="Submit" />
                    </div> 
                    
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php $this->endWidget(); ?>
<script>
var ue=UE.getEditor('content');
</script>