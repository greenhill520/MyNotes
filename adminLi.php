<?php 
include_once("control/control.php");
$size;
$pageSize = 10;
$type = $_REQUEST['type'];
$page = $_REQUEST['page'];
$method = isset($_REQUEST['method'])?$_REQUEST['method']:"";
if ($method == "removeOne") {
	if ($type == "comment" || $type == "note" || $type == "label") {
		$tp = 'feedback';
	}
	elseif ($type == "group") {
		$tp = 'groups';
	}
	elseif($type == "user") {
		$tp = 'user';
	}
	else {
		$tp = $type;
	}
	$rmele = $_REQUEST['id'];
	delete($tp,$rmele);
}
if ($method == "remove") {
	if ($type == "comment" || $type == "note" || $type == "label") {
		$tp = 'feedback';
	}
	elseif ($type == "group") {
		$tp = 'groups';
	}
	elseif($type == "user") {
		$tp = 'user';
	}
	else {
		$tp = $type;
	}
	$rms = explode(" ",$_REQUEST['rms']);
	foreach ( $rms as $rmele) {
		delete($tp,$rmele);
	}
}
if ($method == "add") {
	if ($type == "comment" || $type == "note" || $type == "label") {
		$id = $_REQUEST['topicID'];
		addFeedback($type,$_REQUEST['name'],$_REQUEST['info'],
		$_REQUEST['userID'],$_REQUEST['topicID']);
	}
	elseif ($type = "user") {
		addUser($type,$_REQUEST['countName'],$_REQUEST['password']);
	}
	elseif ($type = "topic") {
		addTopic($_REQUEST['name'],$_REQUEST['info'],$_REQUEST['picPath']
		,$_REQUEST['author'],$_REQUEST['authorInfo'],$_REQUEST['publisher']
		,$_REQUEST['userID'],$_REQUEST['url']);
	}
	elseif ($tye = "group") {
		addGroup($_REQUEST['name'],$_REQUEST['info'],$user3);
	}
}
if ($_REQUEST['type'] == 'main') {		
	$pageNum = 1;
?>
	<label>管理项目：</label>
	<div class='edEle' >
	<ul>
	<li><input type="checkbox" id='0'/>	
	 共　<?=countNum("topic")?>　个分享 
	</li>
	<li><input type="checkbox" id='1'/>	
	 共　<?=countNum("user") ?>　个用户 
	</li>
	<li><input type="checkbox" id='2'/>	
	共　<?=countNum("groups")?>　小组
	</li>
	<li></h4><input type="checkbox" id='3'/>	
	共　<?=countNum("feedback")?>　个评价反馈
	</li>
	</ul>
<?php 	}
elseif ($type == 'user') {
	$size = countNum("user");
	$pageNum = ceil(countNum("user")/ $pageSize);
	$typ = new ReflectionClass('User');
	$obj = getEarlyData($typ, 'user', $page * $pageSize, $pageSize);
	?> 
	<span><?=$type?> all  <?=$size ?></span>
	<div class='pro'>
	<input type="checkbox" id='select'/>全选
	<!--<input type="button" id='add' value="增加" />-->
	<input type="button" id='remove' value="删除" />
	</div>
	<div class='edEle' >
	<ul>
<?php	
	$objcnt = count($obj);
	$i = 0;
	foreach ($obj as $objele) {
		?>
		<li>
		<input type="checkbox" id='<?=$i?>'/>
		<a href="###" title=<?=$objele->id?>>
		<span class="title">
		<?=$objele->name?> 	
		</span>	
		<span class="info"><?=$objele->info?></span>
		
		</a>	
		</li>	
<?php
		$i++;
	}
	echo "</ul>";
}
elseif ($type == 'comment' ||  $type == 'note' || $type == 'tab') {
	$size = countNumbyConditoin("feedback",array('type'=>$type));
	$pageNum = ceil($size / $pageSize);
	$typ = new ReflectionClass('Feedback');
	$obj = getEarlyDatabyConditoin(new ReflectionClass('Feedback'), 'feedback',  $page * $pageSize, $pageSize,array('type'=>$type));
	?> 
	<span><?=$type?> all  <?=$size ?></span>
	<div class='pro'>
	<input type="checkbox" id='select'/>全选
	<!--<input type="button" id='add' value="增加" />-->
	<input type="button" id='remove' value="删除" />
	</div>
	<div class='edEle' >
	<ul>
<?php	
	$objcnt = count($obj);
	$i = 0;
	foreach ($obj as $objele) {
		?>
		<li>
		<input type="checkbox" id='<?=$i?>'/>
		<a href="###" title=<?=$objele->id?>>
		<span class="title">
		<?=$objele->name?> 	
		</span>
		<span class="info"><?=$objele->getUser()->name?>  &nbsp;
		<?=$objele->info?>		
		</span>
		</a>	
		</li>	
<?php
		$i++;
	}
	echo "</ul>";
}
elseif ($type == 'topic') {
	$size = countNum("topic");
	$pageNum = ceil($size / $pageSize);
	$typ = new ReflectionClass('Topic');
	$obj = getEarlyData($typ, 'topic', $page*$pageSize, $pageSize);
	?> 
	<span><?=$type?> all  <?=$size ?></span>
	<div class='pro'>
	<input type="checkbox" id='select'/>全选
	<!--<input type="button" id='add' value="增加" />-->
	<input type="button" id='remove' value="删除" />
	</div>
	<div class='edEle' >
	<ul>
<?php	
	$objcnt = count($obj);
	$i = 0;
	foreach ($obj as $objele) {
		?>
		<li>
		<input type="checkbox" id='<?=$i?>'/>
		<a href="###" title=<?=$objele->id?>>
		<span class="title">
		<?=$objele->name?> 	
		</span>
		<span class="info"><?=$objele->author?>  &nbsp;
		<?=$objele->publisher?> &nbsp;
		<?=$objele->info?>		
		</span>
		</a>	
		</li>	
<?php
		$i++;
	}
	echo "</ul>";
}
elseif ($type == 'group') {
	$size = countNum("groups");
	$pageNum = ceil($size / $pageSize);
	$typ = new ReflectionClass('Group');
	$obj = getEarlyData($typ, 'groups', $page*$pageSize, $pageSize);
	?> 
	<span><?=$type?> all  <?=$size ?></span>
	<div class='pro'>
	<input type="checkbox" id='select'/>全选
	<!--<input type="button" id='add' value="增加" />-->
	<input type="button" id='remove' value="删除" />
	</div>
	<div class='edEle' >
	<ul>
<?php	
	$objcnt = count($obj);
	$i = 0;
	foreach ($obj as $objele) {
		?>
		<li>
		<input type="checkbox" id='<?=$i?>'/>
		<a href="###" title=<?=$objele->id?>>
		<span class="title">
		<?=$objele->name?> 	
		</span>
		<span class="info">
		<?=$objele->getAdmin()->name?> 	&nbsp;	
		<?=$objele->info?>
		</span>
		</a>	
		</li>	
<?php
		$i++;
	}
	echo "</ul>";
}
?>

</div>
<div class='bottom'>
<?php 
if ($page != 0 && $pageNum > 1) {
	?> <a href='###' title="<?=$page-1?>" >上一页</a>
	<?php 
}

echo ($page + 1);
echo "/".$pageNum;
if ( $page < $pageNum - 1) {
	?>
	<a href='###' title="<?=$page+1?>" >下一页</a>
	<?php 
}
?>
</div>