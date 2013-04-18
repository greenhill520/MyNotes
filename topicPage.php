<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
include_once("control/control.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>TopicPage</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="css/topicPageCss.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
    <div id="temp">
	<?php
		include_once 'control/header.php';
	?>
    </div>
	<h1 id="inputbanner">添加新的话题</h1>
	<form enctype="multipart/form-data" action="topicPageServer.php" method="post" name="form1">
		<div id="inputcontent">
			<div class="label">书名:</div><input type="text" name="name"/> <br/> <br/>
			<div class="label">作者:</div><input type="text" name="author"/> <br/> <br/>
			<div class="label">出版社:</div><input type="text" name="publisher"/> <br/> <br/>
			<div class="label">图书链接:</div><input type="text" name="url"/> <br/> <br/>
			<div class="label">图片路径:</div><input type="file" name="picPath"/> <br/> <br/>
			
			<div class="label">作者简介:</div>
			<textarea rows="5" cols="40" name="authorInfo" ></textarea><br />
			<div class="label">内容简介:</div>
			<textarea rows="5" cols="40" name="info" ></textarea>
		    <input type="hidden" value="<?=$user->id?>" name="userid">
		    <input type="hidden" value="addTopic" name="method">
			<input class="button" type="submit" value="发布话题" />
		</div>
	</form>
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
