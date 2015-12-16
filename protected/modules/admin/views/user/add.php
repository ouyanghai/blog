 <ul id="tabsmenu" class="tabsmenu">
        <li class="active"><a href="#tab1">会员管理</a></li>
        
    </ul>
    <?php  $form=$this->beginWidget('CActiveForm'); ?>
    <div id="tab1" class="tabcontent">
        <h3>添加会员</h3>
        <div style="color:red;text-align:center">
                <?php 
                     echo $form->error($model,'username');
                     echo $form->error($model,'password'); 
                     echo $form->error($model,'repass'); 
                     if(Yii::app()->user->hasFlash('info')){
                        echo Yii::app()->user->getFlash('info');
                     }
                 ?>
           </div>
        <div class="form">
            
            <div class="form_row">
            <label>用户名：</label>
           <?php echo $form->textField($model,"username",array("class"=>"form_input")) ?>
            </div>
             
            <div class="form_row">
            <label>密码：</label>
             <?php echo $form->passwordField($model,"password",array("class"=>"form_input")) ?>
            </div>
             <div class="form_row">
            <label>确认密码：</label>
            <?php echo $form->passwordField($model,"repass",array("class"=>"form_input")) ?>
            </div>
         
            
           
            <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" />
            </div> 
            <div class="clear"></div>
        </div>
        </div>
        <?php  $this->endWidget(); ?>