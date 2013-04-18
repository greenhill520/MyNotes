<?php
include_once("control/control.php");
//点击来源网页传送数据过来此页面，将参数传入到下面函数进行数据库查询；
$groupid = $_REQUEST["id"];
$mygroup = getDataById(new ReflectionClass('Group'),'groups',$groupid);
//$mygroup = getGroupById($groupid);
//print_r($mygroup);
$indexOfUsers = 0;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>小组页面</title>
        <link type="text/css" rel="stylesheet" href="css/grouppage.css">
		<link type="text/css" rel="stylesheet" href="css/header.css">
		<script src="js/jquery-1.7.1.min.js" type="text/javascript" ></script>
		<script src="js/grouppage.js" type="text/javascript"></script>
		<script src="js/clock.js" type="text/javascript"></script>
		
    </head>
    <body>
		<?php
		include_once 'control/header.php';
		?>
    	<div id="leftpart">
	        
	        <h1 id = "grouppage-title"><span><?=$mygroup->name?></span></h1>
			
			<div id="group-notification">
				<a href="gAdmin.php?id=<?=$groupid?>"><?=($user->isGroupAdmin($groupid))?"小组管理":""?></a>
				<img align="left" alt="煲汤实验室" src="images/coffee.jpg" class="pil groupicon" valign="top">
	        	<h2>小组公告板</h2>
				<p><?=$mygroup->info?></p>
				<br>
				<br>
			</div>
			<div id="menbersnotes">
		    		<table class="olt">
		       			<tbody>
		       			<tr id="menbernoteshead">
		            		<td nowrap="nowrap">笔记</td><td>作者</td><td align="right">建立时间</td>
		        		</tr>
		            	<?php
		            		$notes = $mygroup->getNotes(0,10);
		            		foreach($notes as $noteforid){
		            			$noteInfo = $noteforid->info;
		            			$noteDate = $noteforid->date;
		            			$userNoteId = $noteforid->getUser();	
								$userName = $userNoteId->name;
		            			$noteShortInfo = substr($noteInfo,0,84);
		            	?>
		            	<tr id="eachnotemesg">
		                <td><a title="<?=$noteInfo?>" id="shortmesg" href="#"><?=$noteShortInfo?>...</a></td>		            
						<td nowrap="nowrap"><a href="homepage.php?id=<?=$userNoteId->userID?>"><?=$userName?></a></td>
			            <td nowrap="nowrap" class="time"><?=$noteDate?></td>
		            	</tr>
		           		<?php
		           		}
		           		?>
		   			</tbody>
				</table>
			</div>
			
		</div>
		<div id="groupmenbers">
			<?php include_once 'calendarPicker.php';?>
	        <h2>小组成员</h2>
	        <table>
	        <tr>
			<?php
			$menbers = getUsersByGroupId($groupid);
			foreach($menbers as $men){
				$indexOfUsers++;
			?>
			<td>
	        <dl class="obu">
	        	<dt>
	        		<a class="nbg" href="homepage.php?id=<?=$userNoteId->userID?>">
	        			<img style="width:48px; height:48px;" alt="<?=$men->name?>" class="m_sub_img" src="images/<?=empty($men->picPath)?"user.jpg":$men->picPath?>">
					</a>
				</dt>
                <dt>
                	<a href="homepage.php?id=<?=$userNoteId->userID?>"><?=$men->name?></a>
				</dt>
			</dl>
			</td>
			<?php
				if($indexOfUsers == 2){
				?>
				</tr>
				<tr>
				<?php
				$indexOfUsers=0;
				}
			}
			?>
		</tr>
		</table>
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