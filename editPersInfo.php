<?php 
include_once("control/control.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/result.css" type="text/css" rel="stylesheet" />
	<title> 添加结果 </title>
	</head>
	<body>
	<div id="overall">
	<?php 
	include_once 'control/control.php';
	include_once 'modifyFun.php';
	$id = $_REQUEST['id'];
	$type = $_REQUEST['type'];
	
	if( $type == "password" ) {
		$newPass = $_REQUEST['newPass'];
		if(!modifyPassword($id,$newPass)) {
			?>
    <div id = "success">
	<img src="images/success.jpg" alt="success"/>
	<p>修改成功，<a href="homepage.php?id=<?=$id?>">返回</a></p>
	</div>
	<?php }else{
	?>
	<div id ="failed">
	<img src="images/failed.jpg" alt="failed"/>
	<p>修改失败，<a href="homepage.php?id=<?=$id?>">重新修改</a></p>
	</div>
	<?php
		}
	}
	else {
	if(modifyUser()) {
	?>
	<div id = "success">
	<img src="images/success.jpg" alt="success"/>
	<p>修改成功，<a href="homepage.php?id=<?=$id?>">返回</a></p>
	</div>
	<?php }else{
	?>
	<div id ="failed">
	<img src="images/failed.jpg" alt="failed"/>
	<p>修改失败，<a href="homepage.php?id=<?=$id?>">重新修改</a></p>
	</div>
	<?php
		}
	}
	?>
	</div>
	</body>
	</html>