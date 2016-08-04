<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html charset=utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->assets['module']; ?>/css/login.css" />
	<script type="text/javascript" src="<?php echo $this->assets['app']; ?>/js/jquery-1.7.2.js"></script>	
</head>
<body>
<?php
echo $content;
?>
</body>
</html>