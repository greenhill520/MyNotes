<?php 
include_once("control/control.php");
if (isset($_REQUEST['type']))
	$type = $_REQUEST['type'];
else
	$type = "main";
if (isset($_REQUEST['type']))
	$id = $_REQUEST['id'];
else 
	$id = 1;

?>
<div id='menu'>
<input type="button" id='edbt' value="修改" />
<input type="button" id='rmbt' value="删除"/>
</div>

<div id='content' title=<?=$id?>>

<?php if ($type == "user"){
if ($id != null) {
	$obj = getDataById(new ReflectionClass('User'),$type,$id);
}

?>
<div class='msg'>
<div id='picture' >
<img alt="objPic" src="<?="images/".(empty($obj->picPath)?"user.jpg":$obj->picPath)?>">
</div>
<div class='eleDetail'>
<label class="prompt">姓名：</label>
<label class="value"><?=$obj->name ?></label>
</div>
</div>
<?php
} if ($type == "topic"){ 
	if ($id != null) {
		$obj = getDataById(new ReflectionClass('Topic'),'topic',$id);
	}
	?>
<div class='msg'>
	<div id='picture' >
		<img class="imgPic" alt="objPic" src="<?="images/".(empty($obj->picPath)?"books.jpg":$obj->picPath)?>">
	</div>
	
	<div class='eleDetail'>
		<label class="prompt">标题:</label>
		<label class="value"><?=$obj->name ?></label>
	</div>
	<div class='eleDetail'>
		<label class="prompt">作者:</label>
		<label class="value "><?=$obj->author ?></label>
	</div>
	<div class='eleDetail'>
		<label class="prompt">作者信息:</label>
		<label class="value "><?=$obj->authorInfo ?></label>
	</div>
	<div class='eleDetail'>
		<label class="prompt">出版社:</label>
		<label class="value"><?=$obj->publisher ?></label>
	</div>
	<div class='eleDetail'>
		<label class="prompt">日期:</label>
		<label class="value"><?=$obj->date ?></label>
	</div>
	<div class='eleDetail'>
		<label class="prompt">链接地址:</label>
		<label class="value"><?=$obj->url ?></label>
	</div>
</div>
<?php
} if ($type == "note"|| $type == "comment" || $type == "label"){ 
	if ($id != null) {
		$obj = getDataById(new ReflectionClass('Feedback'),'feedback',$id);
	}
	?>
<div class='msg'>
	<div id='picture' >
		<img class="imgPic" alt="objPic" src="<?="images/".(empty($obj->getTopic()->picPath->picPath)?"books.jpg":$obj->getTopic()->picPath->picPath)?>"/>
	</div>
	<div class='eleDetail'>
		<label class="prompt">书名:</label>
		<label class="value"><?=$obj->getTopic()->name ?></label>
	</div>
	<div class='eleDetail'>
		<label class="prompt">评论者:</label>
		<label class="value"><?=$obj->getUser()->name ?></label>
	</div>
	<div class='eleDetail'>
<?php if ($type == 'comment') {?>
		<label class="prompt">评论标题:</label>

<?php }
if ($type == 'note') {?>
		<label class="prompt">页码:</label>
<?php }
if ($type == 'label') {?>
		<label class="prompt">标签内容:</label>
<?php }?>
	<label class="value"><?=$obj->name ?></label>
		</div>
	<div class='eleDetail'>
<?php if ($type == 'comment') {?>
	<label class="prompt">评分:</label>
	<label class="value"><?=$obj->score ?></label>
<?php }
?>
	</div>
	<div class='eleDetail'>
		<label class="prompt">日期:</label>
		<label class="value"><?=$obj->date ?></label>
	</div>
</div>
<?php 
} if ($type =="group"){ 
	if ($id != null) {
		$obj = getDataById(new ReflectionClass('Group'),'groups',$id);
	}
	?>
<div class='msg'>
	<div class='eleDetail'>
		<label class="prompt">小组名:</label>
		<label class="value"><?=$obj->name ?></label>
	</div><br/>
	<div class='eleDetail'>
		<label class="prompt">小组管理员:</label>
		<label class="value"><?=$obj->getAdmin()->name ?></label>
	</div><br/>
	<div class='eleDetail'>
		<label class="prompt">修改日期:</label>
		<label class="value"><?=$obj->date ?></label>
	</div><br/>
</div>
<?php }

?>

<div id='brief'>
	<label class="prompt">简介：</label><br />
	<label class="value" id ="infotext"><?=$obj->info ?></label>
</div>
</div>