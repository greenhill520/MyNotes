﻿<html xmlns="http://www.w3.org/1999/xhtml">
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
	$topicid = $_REQUEST['topicid'];
	$type = $_REQUEST['type'];
	

	//这里的$type只能是'comment','label','note'，成功返回id，失败返回false
	
	if(addnewFeedback($topicid,$type)) {
	?>
	<div id = "success">
	<img src="images/success.jpg" alt="success"/>
	<p>添加成功，<a href="objectpage.php?id=<?=$topicid?>">返回</a></p>
	</div>
	<?php }else{
	?>
	<div id ="failed">
	<img src="images/failed.jpg" alt="failed"/>
	<p>添加失败，<a href="objectpage.php?id=<?=$topicid?>">重新添加</a></p>
	</div>
	<?php
		}
	?>
	</div>
	</body>
	</html>