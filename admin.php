
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Notes</title>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="css/admin.css" type="text/css" rel="stylesheet" />
		<link href="css/header.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/admin.js"></script>
	</head>
	<body>
<?php 
	include_once 'control/header.php';	
	if (!$user->isAdmin) {
		?>
		<h1>你不是管理员.</h1>
		<h4><a href="homepage.php?id=<?=$user->id?>">返回个人主页</a></h4>
	
	<?php 
	}else {
	
?>
	<div  id='all'>
	<div class="navigation">
	<ul>
	<li id='title'><a href="###" >管理主页</a></li>
	<li id="topic"><a href="###" >分享主题</a></li>
	<li id="note"><a href="###">笔记</a></li>
	<li id='comment'><a href="###" >书评</a></li>
	<li id='group'><a href="###">小组</a></li>
	<li id='user'><a href="###" >用户</a></li>
	</ul>
	</div>
	<label>你好，<?=$user->name ?></label>
	<div id="adminLi">
	</div>
	</div>
	<?php }?>
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