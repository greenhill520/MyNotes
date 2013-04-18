<?php 
include_once 'control/header.php';
include_once("control/control.php");
if ($user == null){
	include_once 'login.php';
}	else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Notes</title>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/profile.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/pro.js"></script>
	</head>
	<body>
<?php 

include_once 'profileheader.php';?>
<div id="content">
</div>
<?php 
$topTopics = getTopTopics(3);
$newusers=$user->getFriends(0,2);
?>
		<div class="aside">
			<div class="aside-part">
				<p class="tips">新增好友：</p>
				
				<?php foreach($newusers as $newuser) {?>
				<div class="newuser"><a href="homepage.php?id=<?=$newuser->id?>"><img class="userface" alt="userface" src="images/<?php echo empty($newuser->picPath)?'user.jpg':$newuser->picPath?>"></a>
				<a href="homepage.php?id=<?=$newuser->id?>"> <?= $newuser->name?></a>
				</div>
				<?php } ?>
			</div>
			<div class="aside-part">
				<p class="tips">排行榜：</p>
				<?php for($i=0; $i<3; $i++) { ?>
				<div class="newuser">
				<p class="range">Top.<?=$i+1?></p>
				<a href="objectpage.php?id=<?=$topTopics[$i]->id?>">《<?=$topTopics[$i]->name?>》</a>
				</div>
				<?php } ?>
			</div>
		</div>
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
<?php }?>