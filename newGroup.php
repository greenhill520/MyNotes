<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
include_once("control/control.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>AddGroup</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="css/topicPageCss.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
	<?php
		include_once 'control/header.php';
	?>
	<h1 id="inputbanner">创建小组</h1>
	<form action="newGroupRep.php" method="post" name="form1">
		<div id="inputcontent">
			<div class="label">小组名:</div><input type="text" name="name"/> <br/> <br/>
			
			<div class="label">小组公告:</div>
			<textarea rows="5" cols="40" name="info" ></textarea>
		    <input type="hidden" value="<?=$user->id?>" name="userid">
		    <input type="hidden" value="addGroup" name="method">
			<input class="button" type="submit" value="确认" name="submit"/>
		</div>
	</form>
	</body>
</html>