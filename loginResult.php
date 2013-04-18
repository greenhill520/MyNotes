<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/result.css" type="text/css" rel="stylesheet" />
	<title> 成功、失败页面 </title>
	</head>
	<body>
	<div id="overall">
	<?php 
	session_start();
	include_once 'control/control.php'; 
	if( isset($_REQUEST['count_name'])){
		$countName = $_REQUEST['count_name'];
		$passWord = $_REQUEST['password'];
		$return=login($countName,$passWord);
	}
	if($return) {
		$_SESSION['userID'] = $return->id;
	?>
	<div id = "success">
	<img src="images/success.jpg" alt="success"/>
	<p>登录成功，<a href="index.php">返回主页</a></p>
    <script type="text/javascript" language="javascript">
                          window.location.href = "index.php";
					   </script>
	</div>
	<?php }else{ ?>
	<div id ="failed">
	<img src="images/failed.jpg" alt="failed"/>
	<p>登录失败，请检查您的用户名和密码 ,<a href="login.php">重新登录</a></p>
	</div>
	<?php
		}
	?>
	</div>
	</body>
</html>