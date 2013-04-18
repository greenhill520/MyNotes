<?php 
include_once("control/control.php");
$size;
$pageNum = 1;
$pageSize = 3;
$groupId = $_REQUEST['id'];
$type = $_REQUEST['type'];
$page = $_REQUEST['page'];
$method = isset($_REQUEST['method'])?$_REQUEST['method']:"";
if ($method == "removeOne") {
	if ($type == "user" ) {
		$rmele = $_REQUEST['rmele'];
		deleteItems('usertogroup','UserID',$rmele);
	}
}
if ($method == "remove") {
		$rms = explode(" ",$_REQUEST['rms']);
		foreach ( $rms as $rmele) {
			deleteItems('usertogroup','UserID',$rmele);
		}
}
if ($method == "infoEdit") {
	$info = $_REQUEST['info'];
	modify('groups',array('Info'=>$info),$groupId);
}
$group = getDataById(new ReflectionClass('Group'),'groups',$groupId);
if ($_REQUEST['type'] == 'main') {	
	?>
   	<div id="leftpart">
	        
	        <h1 id = "grouppage-title"><span><?=$group->name?></span></h1>
			
			<div id="group-notification">
				<img align="left" alt="B202 Web2.0实验室" src="images/coffee.jpg" class="pil groupicon" valign="top">
	        	<h2 style="color:#060">小组公告板</h2>
				<p><?=$group->info?></p>
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
		            		$notes = $group->getNotes(0,10);
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
	        <h2 style="color:#060">小组成员</h2>
	        <table>
	        <tr>
			<?php
			$menbers = getUsersByGroupId($groupId);
			$indexOfUsers = 0;
			foreach($menbers as $men){
				$indexOfUsers++;
			?>
			<td>
	        <dl class="obu">
	        	<dt>
                	<?php
						if($men->picPath == null )
							$men->picPath = "user.jpg";
					?>
	        		<a class="nbg" href="homepage.php?id=<?=$userNoteId->userID?>">
	        			<img style="width:48px; height:48px;" alt="<?=$men->name?>" class="m_sub_img" src="images/<?=$men->picPath?>">
					</a>
				</dt>
                <dt>
                	<a href="homepage.php?id=<?=$userNoteId->userID?>"><?=$men->name?></a>
				</dt>
			</dl>
			</td>
			<?php
				if($indexOfUsers ==4){
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
		<?php 
}
elseif ($type == 'note') {
	echo "apc;";
	$size = $group->getNoteNum();
	$pageNum = ceil($size / $pageSize);
	?> 
	<div class='amount'><?=$type?> all  <?=$size ?></div>
	<div id="leftpart">
		<div id="menbersnotes">
	    		<table class="olt">
	       			<tbody>
	       			<tr id="menbernoteshead">
	            		<td nowrap="nowrap">笔记</td><td>作者</td><td align="right">建立时间</td>
	        		</tr>
	            	<?php
	            		$notes = $group->getNotes($page*$pageSize,$pageSize);
	            		foreach($notes as $noteforid){
	            			$noteInfo = $noteforid->info;
	            			$noteDate = $noteforid->date;
	            			$userNoteId = $noteforid->getUser();
	            			$userName = $userNoteId->name;
	            			$noteShortInfo = substr($noteInfo,0,100);
	            	?>
	            	<tr>
	                <td>
	                	<span class="pl">
	                    	<img src="http://img3.douban.com/pics/stick.gif" alt="<?=$noteShortInfo?>">
	                    </span>&nbsp;
	                    <a title="<?=$noteInfo?>" href="http://www.douban.com/group/topic/23098694/"><?=$noteShortInfo?>...</a>
	                </td>
		            <td nowrap="nowrap"><a href="homepage.php?id=<?=$userNoteId->id?>"><?=$userName?></a></td>
		            <td nowrap="nowrap" class="time"><?=$noteDate?></td>
	            	</tr>
	           		<?php
	           		}
	           		?>
	   			</tbody>
			</table>
		</div>
		
		<div id='bottom'>
		<?php 
		if ($page == 0 && $pageNum == 1) {
			echo "<a href='###'>上一页</a>";
		}
		echo ($page + 1);
		echo "/".$pageNum;
		if ( $page < $pageNum) {
			echo "<a herf='###'>下一页</a>";
		}
		
		?>
		</div>
	</div>
	<?php 
}
elseif ($type == 'user') {
	$size = $group->getUserNum();
	$pageNum = ceil($size/ $pageSize);
	?> 
	<span><?=$type?> all  <?=$size ?></span>
	<div class='Gpro'>	
	<input type="button" id='remove' value="删除" />
	</div>
	<div id="menbersnotes">
    		<table class="olt">
       			<tbody>
       			<tr id="menbernoteshead">
            		<td><input type="checkbox" id='select'/>全选</td><td >图像</td><td>姓名</td><td>个人信息</td><td align="right">操作</td>
        		</tr>
            	<?php
            		$users = $group->getUsers($page*$pageSize,$pageSize);
            		$i = 0;
            		foreach($users as $userforid){
            			$userInfo = $userforid->info;
            			$userShortInfo = substr($userInfo,0,100);
            	?>
            	<tr >
            	<td>
            	<input title="<?=$userforid->id?>" type="checkbox" id='<?=$i?>'>
            	</td>
                <td>
                	<span class="pl">
                    	<img  alt="<?=$userShortInfo?>" src="<?="images/".(empty($user->picPath)?"user.jpg":$user->picPath)?>"/>
                    </span>&nbsp;
                    <a href=<?php echo "'profile.php?id=".$userforid->id."'"?>></a>
                </td>
                <td><?=$userforid->name?></td>
	            <td nowrap="nowrap" title="<?=$userInfo?>"><?=$userShortInfo?>...</a></td>
	            <td class="delete">
	            <a href="###">
	            <img alt="rem" src="images/delete.png" id="<?=$userforid->id?>">
	            </a> </td>
            	</tr>
           		<?php
           		$i++;
           		}
           		?>
   			</tbody>
		</table>
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
	</div>
<?php }?>

