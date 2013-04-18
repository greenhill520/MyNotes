<?php
include_once("control/control.php");
//点击来源网页传送数据过来此页面，将参数传入到下面函数进行数据库查询；
$topicid = $_REQUEST["id"];
$mytopic = getTopicById($topicid);
$feedbackmsg = $mytopic->getFeedbacks(0,10);
//$earlydata = getEarlyData(new ReflectionClass('Topic'),"topic",0,5);
$earlydata =getTopTopics(5);
//print_r($mytopic);
//print_r($feedbackmsg);
$topTopic = 1;
$indexOfNote = 0;
$indexOfMesg = 0;
$arrayOfNotes = array();
$arrayOfMesgs = array();
$i = 0;
$j = 0;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>书本介绍</title>
        <link type="text/css" rel="stylesheet" href="css/objectpage.css">
		<link type="text/css" rel="stylesheet" href="css/header.css">
		<script src="js/jquery-1.7.1.min.js" type="text/javascript" ></script>
		<script src="js/objectpage.js" type="text/javascript"></script>
    </head>
    <body>
		<?php
		include_once 'control/header.php';
		?>
        <div id="wrapper">
            
            <h1 id = "objectpage-title"><span><?=$mytopic->name?></span></h1>
            <div id="content">
            	<div id="commend">
						<h2>图书排行榜</h2>
						
						<?php
							foreach($earlydata as $early){
						?>							
							<p>Top<?=$topTopic++?>:&nbsp;<a href="objectpage.php?id=<?=$early->id?>"><?=$early->name?></a>(<?=$early->score?>)</p>
						<?php
						}
						?>						
						
				</div>
                <div id="mainpic">
                    <a title="<?=$mytopic->name?>" href="#" class="nbg">
                    	<img alt="<?=$mytopic->name?>" title="点击看大图" src="images/<?=$mytopic->picPath?>">
					</a>
                    <br>
                </div>
                <div id="info">
                    <span class="pl">原作名:&nbsp</span><?=$mytopic->name?>
                    <br>
                    <span class="pl">作者:&nbsp&nbsp</span><?=$mytopic->author?>
                    <br>
                    <span class="pl">出版社:&nbsp</span><?=$mytopic->publisher?>
                    <br>
                    <span class="pl">出版年:&nbsp</span><?=$mytopic->date?>
                    <br>
                    <span class="pl">图书链接:</span><a href="<?=$mytopic->url?>"><?=$mytopic->url?></a>
                    <br>
					<div class="text_vote1" onClick="javascript:showHint('<?=$mytopic->score?>','<?=$mytopic->id?>')">
						&nbsp;&nbsp;
						
						<span id="vote_num" >
							<b id="votes" ><?=$mytopic->score?></b>
						</span><br />
						<span id="vote_txt">觉得这本书好</span>
					</div>
                </div>
                
            </div>
            <div class="gtleft">
                <span><img src="images/pen.gif">&nbsp;<a id="note" class="box" href="#">写笔记</a></span>
                <span><img src="images/pen.gif">&nbsp;<a id="comment" class="box" href="#">写书评</a></span>
                <span><img src="images/pen.gif">&nbsp;<a id="label" class="box" href="#">添加标签</a></span>
            </div>

			<div id = "writenote" style="display:none">
				<h2>写笔记</h2>
				<form action="postNoteAndComment.php" method="post" name="form1">
					<label>页数：</label>
					<input id ="article_name" class="basic-input" type="text" tabindex="1" maxlength="15" name="page">（第几页）
					<br/><br/>
					<label>内容：</label>
					<textarea rows="10" cols="30" name="pagecontent"></textarea>
					<br/><br/>
					<label>权限：</label>
					<input type="checkbox" name="autho">（只在好友和小组内共享？）
					<br/><br/>
					<input type="hidden" value="<?=$topicid?>" name="topicid">
					<input type="hidden" value="<?=$user->id?>" name="userid">
					<input type="hidden" value="note" name="type">
					<input id="button" class="btn-submit" type="submit" title="添加" tabindex="6" value="添加">
					
				</form>
			</div>
			
			<div id = "writecomment" style="display:none">
				<h2>写书评</h2>
				<form action="postNoteAndComment.php" method="post" name="form1">
					<label>题目：</label>
					<input id ="article_name" class="basic-input" type="text" tabindex="1" maxlength="15" name="title">
					<br/><br/>
					<label>内容：</label>
					<textarea rows="10" cols="30" name="commentcontent"></textarea>
					<br/><br/>
					<input type="hidden" value="<?=$topicid?>" name="topicid">
					<input type="hidden" value="<?=$user->id?>" name="userid">
					<input type="hidden" value="comment" name="type">
					<input id="button" class="btn-submit" type="submit" title="添加" tabindex="6" value="添加">
				</form>
			</div>
            <div id = "writelabel" style="display:none">
				<h2>添加标签</h2>
				<form action="postNoteAndComment.php" method="post" name="form1">
					<label>标签内容：</label>
					<input id ="article_name" class="basic-input" type="text" tabindex="1" maxlength="10" name="title">
					<br/><br/>
					<label>标签信息：</label>
					<textarea rows="5" cols="30" name="labelcontent"></textarea>
					<br/><br/>
					<input type="hidden" value="<?=$topicid?>" name="topicid">
					<input type="hidden" value="<?=$user->id?>" name="userid">
					<input type="hidden" value="label" name="type">
					<input id="button" class="btn-submit" type="submit" title="添加" tabindex="6" value="添加">
				</form>
			</div>
                
			
            <hr/>
            <div id="bookinfo">
                <h2>内容简介 ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2>
                <div class="intent">
                    <span class="short">
                    	<?php
                    		$shortInfo = substr($mytopic->info,0,299);
                    		$longInfo = substr($mytopic->info,299);
                    	?>　
						<span>
						<p><?=$shortInfo?></p>　
						<p id="hideabstruct" style="display:none"><?=$longInfo?></p>
						<img id="moreabstact" title="展开全文" src="images/showall.png"></img>
						</span>
					</span>
                    <br>
                </div>
                <h2>作者简介 ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2>
                <div class="intent">
                    <?=$mytopic->authorInfo?>
                    <br>
                </div>
            </div>
           
            <div class="blank20" id="db-tags-section">
                <h2>书本常用的标签 ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2>
                <div class="intent">
                	<?php
						foreach($feedbackmsg as $feed){
							if($feed->type == "label"){
					?>
					<a href="http://book.douban.com/tag/推理"><?=$feed->name?></a>
					<?php
							}
						
						} 
					?>
                </div>
            </div>
            <hr/>
            <div id="booknotes">
                <h2>读书笔记&nbsp;· · · · · ·&nbsp;</h2>
            </div>
			<div class="writeorreviewthebook">                              
				 <div class="write">
					<a id="note2" class="box" href="#"><span>我来写笔记</span></a>
				 </div>
			</div>
     
            <br/>
				<?php
					foreach($feedbackmsg as $feed){
						if($feed->type == "note" && $indexOfNote == 0){
						//下面的评论照片通过图片属性value='用户id'来取得.	
						$picture = getUserById($feed->userID);
						$picturePath = $picture->picPath;
						if( $picturePath == null ) {
							$picturePath = "user.jpg";
						}
						$indexOfNote++;						
					?>
				<div class="each_review">
				<a href="homepage.php?id=<?=$feed->userID?>"><img class="userpic" title="<?=$picture->name?>" src="images/<?=$picturePath?>" alt="<?=$picture->name?>"></a>
					<div class="what_review">
						<h3><?=$feed->name?></h3>
						<a href="homepage.php?id=<?=$feed->userID?>"><p class="name"><?=$picture->name?></p></a>
						<p class="intent"><?=$feed->info?></p>
						<p class="date"><?=$feed->date?></p>
					</div>
				</div>
				<br/>
				<?php
					}
				else if($feed->type == "note" && $indexOfNote > 0){
					$arrayOfNotes[$i++] = array($picture->name,$feed->name,$feed->info,$feed->date,$feed->userID);
					}
				}			
				?>
				<div id="hidenotes" title="展开全文" style="display:none">
				<?php
					for($n=0;$n<$i;$n++){
				?>
					<div class="each_review">
						<a href="homepage.php?id=<?=$arrayOfNotes[$n][4]?>"><img class="userpic" title="<?=$arrayOfNotes[$n][0]?>" src="images/<?=$picturePath?>" alt="<?=$arrayOfNotes[$n][0]?>"></a>
						<div class="what_review">
							<h3><?=$arrayOfNotes[$n][1]?></h3>
							<a href="homepage.php?id=<?=$arrayOfNotes[$n][4]?>"><p class="name"><?=$arrayOfNotes[$n][0]?></p></a>
							<p class="intent"><?=$arrayOfNotes[$n][2]?></p>
							<p class="date"><?=$arrayOfNotes[$n][3]?></p>
						</div>
					</div>
						<?php
					}
				?>
				</div>
        <div class="more_review">
			<p id="morenotes"><a style="cursor:hand">更多笔记>></a></p>
        </div>
        </div>
        <hr/>
		<div id="bookreview">
        	<h2>书评&nbsp;· · · · · ·&nbsp;</h2>
		</div>
		<div class="writeorreviewthebook">
			<div class="write">
					<a id="comment2" class="box" href="#"><span>我来写书评</span></a>
			</div>
		</div>
		<br/>
			<?php
				foreach($feedbackmsg as $feed ){
					if($feed->type == "comment" && $indexOfMesg == 0){
						$picture = getUserById($feed->userID);
						$picturePath = $picture->picPath;
						if( $picturePath == null ) {
							$picturePath = "user.jpg";
						}
						$indexOfMesg++;
			?>
			<div class="each_review">
				<a href="homepage.php?id=<?=$feed->userID?>"><img class="userpic" title="<?=$picture->name?>" src="images/<?=$picturePath?>" alt="<?=$picture->name?>"></a>
					<div class="what_review">
						<h3><?=$feed->name?></h3>
						<a href="homepage.php?id=<?=$feed->userID?>"><p class="name"><?=$picture->name?></p></a>
						<p class="intent"><?=$feed->info?></p>
						<p class="date"><?=$feed->date?></p>
					</div>
			</div>
			<br/>
			<?php
					}else if($feed->type == "comment" && $indexOfMesg > 0){
						$arrayOfMesgs[$j++] = array($picture->name,$feed->name,$feed->info,$feed->date,$feed->userID);
					}
				}			
				?>
				<div id="hidecomments" title="展开全文" style="display:none">
				<?php
				for($m=0;$m<$j;$m++){
				?>
					<div class="each_review">
						<a href="homepage.php?id=<?=$arrayOfMesgs[$m][4]?>"><img class="userpic" title="<?=$arrayOfMesgs[$m][0]?>" src="images/<?=$picturePath?>" alt="<?=$arrayOfMesgs[$m][0]?>"></a>
							<div class="what_review">
								<h3><?=$arrayOfMesgs[$m][1]?></h3>
								<a href="homepage.php?id=<?=$arrayOfMesgs[$m][4]?>"><p class="name"><?=$arrayOfMesgs[$m][0]?></p></a>
								<p class="intent"><?=$arrayOfMesgs[$m][2]?></p>
								<p class="date"><?=$arrayOfMesgs[$m][3]?></p>
							</div>
					</div>
				<?php
				}
				?>
				</div>
		</h2>
        <div class="more_review">
			<p id="morecomments"><a style="cursor:hand">更多书评>></a></p>
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
