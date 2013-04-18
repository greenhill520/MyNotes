<div id="MyZone">
<?php
include_once("control/control.php");
include_once 'modifyFun.php';
/*
* upload the photos for the new users
* return the error messages.
* */
	/*
	if ($_REQUEST['submit'] != null) {
		if ($_REQUEST['newPass'] != null) {
			modifyPassword($edid,$_REQUEST['newPass']);
		}
		 modifyUser();
	}
	*/
	if (isset($_REQUEST['id'])){
		$userId = $_REQUEST['id'];
		$type = new ReflectionClass('User');
		$userView = getDataById($type,'user',$userId);
		if ( $user != null && $userId == $user->id){
				?>
		<h2 id='userHead' title="<?php echo $user->id?>" style="color:#060">我的读书主页<a href="topicPage.php">发布Topic</a></h2>
<?php }			
		elseif ($user != null && $user->isFriend($userView->id)) {
			$userId = $userId."f";
				?>
			<h2 id='userHead' title=<?= "o".$userId?>><?=$userView->name?>的读书主页</h2>
		<?php 
		}
		elseif ($user != null && !($user->isFriend($userView->id))) {
			$userId = $userId."u".$user->id;
				?>
			<h2 id='userHead' title=<?= "o".$userId?>><?=$userView->name?>的读书主页</h2>
		<?php 
		}
 }	
else {
	?>
	<h2 id='userHead' title="<?php echo $user->id?>" style="color:#060">我的读书主页<a href="topicPage.php">发布Topic</a></h2>
<?php 
}

?>
<ul class="shadetabs" >
<li id="homeTab"><a href="###">个人主页</a></li>
<li id="note"><a href="###">笔记</a></li>
<li id="comment"><a href="###">书评</a></li>
<li id='group'><a href="###">小组</a></li>
<li id='friend'><a href="###">好友动态</a></li>
</ul>
</div>