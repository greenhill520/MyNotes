<?	
include_once("control/control.php");
$method = $_REQUEST['method'];
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$isMe = $_REQUEST['isme'];
$page = $_REQUEST['page'];
$size;
$pageNum = 1;
$pageSize = 8;
$user = getDataById(new ReflectionClass('User'),'user',$id);
if ($isMe == "true") {
	$name = "你";
}
else {
	$name = $user->name;
}

if ($method == 'group') {
	$size = $user->getGroupNum();
	?>
	<h4 class="tips"><a href="newGroup.php">创建小组</a></h4>
	<p class="tips"><?=$name?>共加入了  <?=$size ?> 个小组</p>
		<?php 
	if ($size != 0) {
		$pageNum = ceil($size / $pageSize);
		$obj = $user->getGroups( $page*$pageSize, $pageSize);
		?> 

		<div class='edEle' >
		<ul id="myGroup">
	<?php	
		$objcnt = count($obj);
		$i = 0;
		foreach ($obj as $objele) {
			?>
			<li class="bord">
			<div>
			<a href="grouppage.php?id=<?=$objele->id?>" title=<?=$objele->id?>>
			<?=$objele->name?> 	&nbsp;
			</a>
			<span class="gAdmin">管理员:	&nbsp;</span>
			<a href="homepage.php?id=<?=$objele->getAdmin()->id?>">
			<?=$objele->getAdmin()->name?> 
			</a>		
			</div>
			&nbsp;&nbsp;&nbsp;<?=$objele->info?>
				
			</li>	
	<?php
			$i++;
		}
		echo "</ul>";
	}
}
elseif ($method == 'note' || $method == 'comment') {
	$size = $user->getFeedbackByTypeNum($type);
	if ($size != 0) {
		$pageNum = ceil($size / $pageSize);
		?> 
		<p class="tips"><?=$name?>共提供了 <?=$size ?>个
		<?php if ($type == "comment") {
			echo "评论";	
	} elseif ($type == "note") {
		echo "笔记";	
	}
	
	?>
		</p>
		<div class='edEle' >
		<ul id="myComm">
	<?php	
		$obj = $user->getFeedbackByTpye( $type,$page*$pageSize, $pageSize);
		$objcnt = count($obj);
		$i = 0;
		
		foreach ($obj as $comm) {
			?>
			<li>
			<div id="v1">
			<div class="bord">
				<p><a href="homepage.php?id=<?=$comm->getTopic()->id?>">
				<img class="userface" alt="userface" src="images/<?php echo empty($comm->getTopic()->picPath)?'user.jpg':$comm->getTopic()->picPath?>"></a>
				<a href="homepage.php?id=<?=$comm->id?>"><?= $comm->name?></a>
				<br/>
				<span> <?=$comm->date ?><?=$name?>在<a href="objectpage.php?id=<?=$comm->getTopic()->id?>">《<?= $comm->getTopic()->name?>》</a>上
				<?php 
				if ($comm->type == "note") {
					echo $comm->name."写笔记";
				}
				if ($comm->type == "comment") {
					echo "写书评";
				}
				?>
				</span>
				<br/>
				</p>
				<p class="comment1"><?=$comm->info?></p>
			</div>
				
			</li>	
	<?php
			$i++;
		}
		echo "</ul>";	
	}
}
elseif ($method == 'friend') {
	$size = $user->getFriendNum();
	if ($size != 0) {
		$pageNum = ceil($size / $pageSize);
		$obj = $user->getFriends( $page*$pageSize, $pageSize);
		?> 
		<p class="tips"><?=$name?>共添加了  <?=$size ?> 位好友</p>
		<div class='edEle' >
		<ul id="myComm">
	<?php	
		$objcnt = count($obj);
		$i = 0;
		
		foreach ($obj as $objele) {
			$comm = $objele->getEarlyFeedback(1);
			?>
			<li>
			<div id="v1">
			<div class="bord">
				<p><a href="homepage.php?id=<?=$comm[0]->getTopic()->id?>">
				<img class="userface" alt="userface" src="images/<?php echo empty($objele->picPath)?'user.jpg':$objele->picPath?>"></a>
				<a href="homepage.php?id=<?=$objele->id?>"><?= $objele->name?></a>
				<br/>
				<span> <?=$comm[0]->date ?> 在<a href="objectpage.php?id=<?=$comm[0]->getTopic()->id?>">《<?= $comm[0]->getTopic()->name?>》</a>上
				<?php 
				if ($comm[0] == "note") {
					echo "写笔记";
				}
				if ($comm[0] == "comment") {
					echo "写书评";
				}
				else {
					echo "加标签";
				}
				
				?>
				</span>
				<br/>
				</p>
				<p class="comment1"><?=$comm[0]->info?></p>
			</div>
				
			</li>	
	<?php
			$i++;
		}
		echo "</ul>";	
	}
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

