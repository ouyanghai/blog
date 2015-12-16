<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panelo - Free Admin Template</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseurl ?>/assets/admin/css/style.css" />

</head>
<body>
<div id="loginpanelwrap">
  	
	<div class="loginheader">
    <div class="logintitle"><a href="#">用户后台登录</a></div>
    </div>
    
    <?php $form=$this->beginWidget('CActiveForm');?>
    <div style="text-align:center;color:red;margin:10px;padding:0px">
     <?php echo $form->error($model,'captcha');?>
    </div>

    <div class="loginform">
        
        <div class="loginform_row">
        <label>用户名:</label>
        <?php echo $form->textField($model,"username",array("class"=>"loginform_input","style"=>"width:200px")); ?>
             <div style="text-align:center;color:red;margin:10px;padding:0px">
                  <?php echo $form->error($model,"username");?>
             </div>
        </div>

        
		<div class="loginform_row">
        <label>密码:</label>
        <?php echo $form->passwordField($model,'password',array("class"=>"loginform_input","style"=>"width:200px")) ?>
             <div style="text-align:center;color:red;margin:10px;padding:0px">
                <?php echo $form->error($model,'password');?>
            </div>
        </div>

        <div class="loginform_row">
        <label>验证码:</label>
        <?php echo $form->textField($model,'captcha',array("class"=>"loginform_input","style"=>"width:200px")) ?>
        
        <?php $this->widget('CCaptcha',array('clickableImage'=>true,'showRefreshButton'=>false,'imageOptions'=>array('style'=>'cursor:pointer;margin-left:5px'))) ?>
        
        </div>


        <div class="loginform_row">
        <input type="submit" class="loginform_submit" value="Login" />
        </div> 

        <div class="clear"></div>
    </div>
	<?php $this->endWidget();?>
</div>

    	
</body>
</html>