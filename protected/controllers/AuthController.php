<?php

class AuthController extends Controller{

	public function actionLogin(){
		if(isset($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])){
            $u=addslashes(trim($_SERVER['PHP_AUTH_USER']));
            $p=addslashes(trim($_SERVER['PHP_AUTH_PW']));
            $arr=require(Yii::app()->basePath."/data/user.php");
            if( ( !empty($arr) && is_array($arr) && isset($arr[$u]) && $arr[$u]==md5($p) )){
                return true;
            }
        }
        // 弹出验证框
        header("Content-type: text/html; charset=utf-8");        
        header("WWW-Authenticate: Basic realm=Haodianpu Software");
        header("HTTP/1.0 401 Unauthorized");
        exit("<script language='javascript'>if(confirm('温馨提示： \\n\\n    您于 ".date("Y-m-d H:i:s")." 在 ".$_SERVER["REMOTE_ADDR"]." 处登录失败（取消登录）\\n\\n请问是否重新登录？\\n\\n    点击『 确定 』重新登录，点击『 取消 』关闭页面。\\n')){top.location.reload();}else{window.opener=null;window.open('','_self','');window.close();};</script>"); 
	}
}

?>