 <ul id="tabsmenu" class="tabsmenu">
        <li class="active"><a href="#tab1">用户操作</a></li>
    </ul>
    <div id="tab1" class="tabcontent">
        <h3>修改密码</h3>

		<?php  $form=$this->beginWidget('CActiveForm') ?>

        <div class="form">
             
            <div class="form_row">
            <div style="color:red;text-align:center">
                <?php 
                     echo $form->error($model,'oldpass'); 
                     echo $form->error($model,'newpass'); 
                     echo $form->error($model,'repass'); 
                     if(Yii::app()->user->hasFlash('info')){
                        echo Yii::app()->user->getFlash('info');
                     }
                 ?>
           </div>
            <label>管理员账号:</label>
          
           

            <?php echo $form->textField($model,"username",array("class"=>"form_input",'disabled'=>'disabled')) ?>
            </div>
             
            <div class="form_row">
            <label>原始密码:</label>
        
            <?php echo $form->passwordField($model,"oldpass",array("class"=>"form_input")) ?>
            </div>

            <div class="form_row">
            <label>新密码:</label>
             <?php echo $form->passwordField($model,"newpass",array("class"=>"form_input")) ?>
            </div>

           <div class="form_row">
            <label>确认密码:</label>
             <?php echo $form->passwordField($model,"repass",array("class"=>"form_input")) ?>
            </div>
            <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" />
            </div> 
            <div class="clear"></div>
        </div>

   
    </div>
         <?php  $this->endWidget(); ?>