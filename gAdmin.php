<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Notes</title>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="css/gAdmin.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/gAdmin.js"></script>
	</head>
	<body>
	<?php include_once('control/header.php'); 
	include_once("control/control.php");
	if (isset($_REQUEST['id'])){
		$groupid =$_REQUEST['id'];
		$group = getDataById(new ReflectionClass('Group'),'groups',$groupid);
		if ( $user == null || $group->adminID != $user->id ) {
		?>
		<h1>你不是小组管理员.</h1>
		<h4><a href="homepage.php?id=<?=$user->id?>">返回个人主页</a></h4>
	
	<?php 
		}
	
	else{
	
	?>
	<div  id='all' title=<?=$groupid?>>
	<div class="navigation">
	<ul >
	<li id='title'><a href="###" >管理主页</a></li>
	<li id="infoEdit"><a href="###" >编辑公告</a></li>
	<li id="user"><a href="###">小组成员</a></li>
	<li id='note'><a href="###" >小组笔记</a></li>
	</ul>
	</div>
	<div>你好,<?=$user->name ?></div>
	<div id="adminLi">
	</div>
	</div>
	<?php
	}
	 }?>
     <div id="footer">
     	 <div id="footer-inner">
        	 <p>
		  		 AngryBug - MyNotes/豆荚网 <br />&copy; 2012 - 2013 
          		 <a href="#" title="No href now!">Contact Us</a>
        	 </p>
     	 </div>
    </div>
</body>
</html>