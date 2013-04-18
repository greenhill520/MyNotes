<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/result.css" type="text/css" rel="stylesheet" />
	<title> 注册页面 </title>
	</head>
	<body>
	<div id="overall">
	<?php 
	include_once 'control/control.php'; 
	if( isset($_REQUEST['count_name'])){
		$countName = $_REQUEST['count_name'];
		$userName = $_REQUEST['user_name'];
		$passWord = $_REQUEST['password'];
		$return = addUser($userName,$countName,$passWord);
	}
	if($return) {
	?>
	<div id = "success">
	<img src="images/success.jpg" alt="success"/>
	<p>注册成功，<a href="login.php">登陆豆荚网</a></p>
	</div>
	<?php }else{ ?>
	<div id ="failed">
	<img src="images/failed.jpg" alt="failed"/>
	<p>注册失败，请检查您的输入是否符合正确的格式 ,<a href="register.php">重新注册</a></p>
	</div>
	<?php
		}
	?>
	</div>
	</body>
	</html>