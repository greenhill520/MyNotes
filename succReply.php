<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="css/result.css" type="text/css" rel="stylesheet" />
		<title> ???? </title>
	</head>
	<body>
		<div id="overall">
	<?php 
	include_once 'control/control.php';
	include_once 'modifyFun.php';
	include_once 'control/header.php';
		
	//$mytopic = getTopicById($topicid);
	
	if(modifyChoose()) {
	?>
	
		<div id = "success">
		<img class="reply" src="images/success.jpg" alt="success"/>
			<p id="succCon">????,<a href="admin.php">??</a></p>
		</div>
	<?php }else{
	?>
		<div id ="failed">
		<img class="reply" src="images/failed.jpg" alt="failed"/>
		<p id="failCon">????,<a href="admin.php">??</a></p>
		</div>
	<?php
		}
	?>
		</div>