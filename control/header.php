<?php
	session_start();
	include_once('control/control.php');
?>
<div>
	<style><?php include_once('css/header.css');?></style>
	<a href="index.php"><img id="logo" src="images/logo.gif" alt="logo"></img></a>
	<ul id="comheader">
	<li class="headerli"><a href="index.php">豆荚网</a></li>
<?php
	if(isset($_SESSION['userID'])){
		$user = getDataById(new ReflectionClass('User'),'user',$_SESSION['userID']);
?>
		<li class="headerli" ><a href="homepage.php"><?=$user->name?>的个人主页</a></li>
		
<?php
		if($user->isAdmin){			
?>
		<li class="headerli" ><a href="admin.php">管理</a></li>
<?php
		}
?>
		<li class="headerli" ><a href="control/logout.php">退出</a></li>

<?php
	}else{
?>
		<li class="headerli" ><a href="login.php">登录</a></li>
		<li class="headerli" ><a href="register.php">注册</a></li>
<?php
	}
?>
	</ul>
</div>