<?php
include_once("control/control.php");

//获取最新的topic
$topics = getEarlyData(new ReflectionClass('Topic'), 'topic', 0, 9);
//获取新增的好友
$newusers=getEarlyData(new ReflectionClass('User'), 'user', 0, 6);
//获取最新的反馈
$newfeedbacks=getEarlyData(new ReflectionClass('Feedback'), 'feedback', 0, 100);
//获取最新的小组
$newgroups=getEarlyData(new ReflectionClass('Group'), 'groups', 0, 6);
//获取前十的topics
$toptopics=getTopTopics(10);
//新建评论，初始化
$newcomments=array();
// 获取评论
foreach($newfeedbacks as $newfeedback){
	if($newfeedback->type =='comment')
		array_push($newcomments,$newfeedback);
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>豆荚网</title>
	<link href="css/index.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<div id="wrapper">
		<?php
		include_once 'control/header.php';
		?>

		<div id="content">
			<div class="fleft">
				<div class="tips"><span>My Notes/豆荚网</span></div>
				<div class="roll" id="roll">
					<a href="javascript:void(0);" class="btn_left"></a>
					<a href="javascript:void(0);" class="btn_right"></a>
					<div class="wrap">
						<ul>
						<?php
						foreach($topics as $topic){
						?>
						<li><a href="objectpage.php?id=<?=$topic->id?>"><img class="img2" src="images/<?php echo empty($topic->picPath)?'books.jpg':$topic->picPath?>"></a></li>
						<?php } ?>
						</ul>
					</div>
				</div>
			<div class="newbook">
			<div class="tips">新书速递
				<a href="javascript:void(0);" id="goright" class="btn2_right fright"></a>
				<a href="javascript:void(0);" id="goleft" class="btn2_left fright"></a>
                <hr/>
			</div>
			<div id="book1">
			<?php for($i=0;$i<3;$i++) {?>
				<div class="bookitem">
				<a href="objectpage.php?id=<?=$topics[$i]->id?>"><img class="fright" alt="book" src="images/<?php echo empty($topics[$i]->picPath)?'books.jpg':$topics[$i]->picPath?>"></a>
				<h2><a href="objectpage.php?id=<?=$topics[$i]->id?>"><?=$topics[$i]->name?></a></h2>
				<p class="color-gray">
				<?php 
				$m=$topics[$i]->info;
				$n=substr($m,0,450);	
				?>
				<?=($n."...")?>
				</p>
				</div>
			<?php } ?>
			</div>
			<div id="book2">
			<?php for($i=3;$i<6;$i++) {?>
				<div class="bookitem">
				<a href="objectpage.php?id=<?=$topics[$i]->id?>"><img class="fright" alt="book" src="images/<?php echo empty($topics[$i]->picPath)?'books.jpg':$topics[$i]->picPath?>"></a>
				<h2><a href="objectpage.php?id=<?=$topics[$i]->id?>"><?=$topics[$i]->name?></a></h2>
				<p class="color-gray">
				<?php 
				$m=$topics[$i]->info;
				$n=substr($m,0,450);	
				?>
				<?=($n."...")?>
				</p>
				</div>
			<?php } ?>
			</div>
			<div id="book3">
			<?php for($i=6;$i<9;$i++) {?>
				<div class="bookitem">
				<a href="objectpage.php?id=<?=$topics[$i]->id?>"><img class="fright" alt="book" src="images/<?php echo empty($topics[$i]->picPath)?'books.jpg':$topics[$i]->picPath?>"></a>
				<h2><a href="objectpage.php?id=<?=$topics[$i]->id?>"><?=$topics[$i]->name?></a></h2>
				<p class="color-gray">
				<?php 
				$m=$topics[$i]->info;
				$n=substr($m,0,450);	
				?>
				<?=($n."...")?>
				</p>
				</div>
			<?php } ?>
			</div>
			</div>
		<div class="tips">最新评论
			<a href="javascript:void(0);" id="p1" class="btn2_right fright"></a>
			<a href="javascript:void(0);" id="p2" class="btn2_left fright"></a>
            <hr/>
        	</div>
		<div class="comments">
			<div id="v1">
			<?php for($i=0;$i<4;$i++) { ?>
			<div class="bord">
				<p><a href="homepage.php?id=<?=$newcomments[$i]->getTopic()->id?>">
				<img class="userface" alt="userface" src="images/<?php echo empty($newcomments[$i]->getUser()->picPath)?'user.jpg':$newcomments[$i]->getUser()->picPath?>"></a>
				<a href="homepage.php?id=<?=$newcomments[$i]->getUser()->id?>"><?= $newcomments[$i]->getUser()->name?></a>
				<br/>
				<span>评论<a href="objectpage.php?id=<?=$newcomments[$i]->getTopic()->id?>">《<?= $newcomments[$i]->getTopic()->name?>》</a></span>
				<br/>
				</p>
				<p class="comment1"><?=$newcomments[$i]->info?></p>
			</div>
			<?php } ?>
			</div>
			<div id="v2">
			<?php for($i=4;$i<8;$i++) { ?>
			<div class="bord">
				<p><a href="homepage.php?id=<?=$newcomments[$i]->getTopic()->id?>">
				<img class="userface" alt="userface" src="images/<?php echo empty($newcomments[$i]->getUser()->picPath)?'user.jpg':$newcomments[$i]->getUser()->picPath?>"></a><!-- 需要通过feedback找到该作者user-->
				<a href="homepage.php?id=<?=$newcomments[$i]->getUser()->id?>"> <?= $newcomments[$i]->getUser()->name?></a>
				<br/>
				<span>评论<a href="objectpage.php?id=<?=$newcomments[$i]->getTopic()->id?>">《<?= $newcomments[$i]->getTopic()->name?>》</a></span>
				<br/>
				</p>
				<p class="comment1"><?=$newcomments[$i]->info?></p>
			</div>
			<?php } ?>
			</div>
			<div id="v3">
			<?php for($i=8;$i<12;$i++) { ?>
			<div class="bord" style="bottom:-700px">
				<p><a href="homepage.php?id=<?=$newcomments[$i]->getTopic()->id?>">
				<img class="userface" alt="userface" src="images/<?php echo empty($newcomments[$i]->getUser()->picPath)?'user.jpg':$newcomments[$i]->getUser()->picPath?>"></a>
				<a href="homepage.php?id=<?=$newcomments[$i]->getUser()->id?>"><?= $newcomments[$i]->getUser()->name?></a>
				<br/>
				<span>评论<a href="objectpage.php?id=<?=$newcomments[$i]->getTopic()->id?>">《<?= $newcomments[$i]->getTopic()->name?>》</a></span>
				<br/>
				</p>
				<p class="comment1"><?=$newcomments[$i]->info?></p>
			</div>
			<?php } ?>
			</div>
			<div id="v4">
			<?php for($i=12;$i<16;$i++) { ?>
			<div class="bord" style="bottom:-700px">
				<p><a href="homepage.php?id=<?=$newcomments[$i]->getTopic()->id?>">
				<img class="userface" alt="userface" src="images/<?php echo empty($newcomments[$i]->getUser()->picPath)?'user.jpg':$newcomments[$i]->getUser()->picPath?>"></a>
				<a href="homepage.php?id=<?=$newcomments[$i]->getUser()->id?>"><?= $newcomments[$i]->getUser()->name?></a>
				<br/>
				<span>评论<a href="objectpage.php?id=<?=$newcomments[$i]->getTopic()->id?>">《<?= $newcomments[$i]->getTopic()->name?>》</a></span>
				<br/>
				</p>
				<p class="comment1"><?=$newcomments[$i]->info?></p>
			</div>
			<?php } ?>
			</div>
		</div>
	</div>
		<div class="aside">
			<div class="aside-part">
				<p class="tips">新成员</p>
				<?php foreach($newusers as $newuser) {?>
				<div class="newuser"><a href="homepage.php?id=<?=$newuser->id?>"><img class="userface" alt="userface" src="images/<?php echo empty($newuser->picPath)?'user.jpg':$newuser->picPath?>"></a>
				<a href="homepage.php?id=<?=$newuser->id?>"> <?= $newuser->name?></a>
				</div>
				<?php } ?>
			</div>
			<div class="aside-part">
				<p class="tips">排行榜</p>
				<?php for($i=0; $i<10; $i++) { ?>
				<div class="newuser">
				<p class="range">Top.<?=$i+1?></p>
				<a href="objectpage.php?id=<?=$toptopics[$i]->id?>">《<?=$toptopics[$i]->name?>》</a>
				</div>
				<?php } ?>
			</div>
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