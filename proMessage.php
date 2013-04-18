<?php

include_once("control/control.php");
if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	$userToView = getDataById(new ReflectionClass('User'),'user',$id);
}
if (isset($_REQUEST['pro'])) {
	$pro = $_REQUEST['pro'];
	if ($pro =='addFri'){
		addfriend($id,$_REQUEST['mId']);
	}
}

if (isset($_REQUEST['method'])) {
	$method = $_REQUEST['method'];
}
	if ($method == 'main') {
?>
		<div id='myMess'>
		 <img class="proImg" alt="userImg" src="<?="images/".(empty($userToView->picPath)?"user.jpg":$userToView->picPath)?>"/>
		<div>
		<label class="prompt">姓名：</label>
		<label id='userMsg'><?=$userToView->name?></label>
		</div>
		<label class="prompt">个人简介：</label>
		<p id='userMsg'>&nbsp;&nbsp;&nbsp;&nbsp;
		<?=$userToView->info?></p>
		</div>
		
		<ul class="editLi" >
		<li id="addFri"><a href="#">加为好友</a></li>
		<li id="edInfo"><a href="###">修改信息</a></li>
		<li id="edPass"><a href="###">修改密码</a></li>
		</ul>
<?php 	}
elseif ($method == 'editInfo') {
	?>

<form enctype="multipart/form-data" method="post" action="editPersInfo.php">
	<div>
    <label class="editLabel">输入姓名：</label>
	<input name="name" value="<?=$userToView->name?>" >
    </div>
	<div>
	<label class="editLabel">输入简介：</label>
	<textarea name="newInfo" rows="8" cols="35"><?=$userToView->info?></textarea>	
	</div>
	<div >
		<div>
		<label class="editLabel">当前图片</label>
		<img class="proImg" src="<?=("images/".(empty($userToView->picPath)?"user.jpg":$userToView->picPath))."?reload=".rand(0,999999); ?>">
		</div>
		<div id="upLoad">
		<label class="editLabel">上传:</label>
		<input type="file" name="picPath" value="photo"><br/>
		</div>
		<input type="hidden" name="id" value="<?=$userToView->id?>">
        <input type="hidden" name="type" value="info">
	</div>
	<div>
		<input type="submit" value="确认" name="submit"> 
        <a href="homepage.php?id=<?=$userToView->id?>"><input type="button" value="返回"> </a>
	</div>
</form>
<?php 
}
elseif ($method == 'changePass') {
	?>
<h1>修改密码</h1>
<form enctype="multipart/form-data" method="post" action="editPersInfo.php"> 
<br />
<label for='new'>输入新密码：</label>
<input type="password" name="newPass" id='new' size="16"/><br />
<input type="hidden" name="id" value="<?=$userToView->id?>">
<input type="hidden" name="type" value="password">
<input type='submit' value="确认"/>
<a href="homepage.php?id=<?=$userToView->id?>"><input type="button" value="返回"> </a>
</form>

<?php 

}

?>
