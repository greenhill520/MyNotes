<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="css/result.css" type="text/css" rel="stylesheet" />
	<title> 添加结果 </title>
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
	<img src="images/success.jpg" alt="success"/>
	<p>添加成功，<a href="homepage.php?id=<?=$user->id?>">返回</a></p>
	</div>
	<?php }else{
	?>
	<div id ="failed">
	<img src="images/failed.jpg" alt="failed"/>
	<p>添加失败，<a href="topicPage.php">重新添加</a></p>
	</div>
	<?php
		}
	?>
	</div>
	</body>
</html>