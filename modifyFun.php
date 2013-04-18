	<?php 
		include_once 'control/control.php';;
		
		function addnewTopic(){
			
			if(isset($_REQUEST['name']))
				$name = $_REQUEST['name'];
			if(isset($_REQUEST['userid']))
				$myid = $_REQUEST['userid'];
			if(isset($_REQUEST['publisher']))
				$publisher = $_REQUEST['publisher'];
			if(isset($_REQUEST['url']))
				$url = $_REQUEST['url'];
			//if(isset($_REQUEST['picPath']))
				$picPath = upload($myid,"topic");
			if(isset($_REQUEST['info']))
				$info = $_REQUEST['info'];
			if(isset($_REQUEST['author']))
				$author = $_REQUEST['author'];
			if(isset($_REQUEST['authorInfo']))
				$authorInfo = $_REQUEST['authorInfo'];
				
			return addTopic($name,$info, $picPath, $author,$authorInfo,$publisher,$myid,$url);
		}

		function modifyTopic($id){
			$is_succ = false;
			if(isset($_REQUEST['name']))
				$is_succ = modify('user',array('Name'=>$_REQUEST['name']),$id);
			if(isset($_REQUEST['publisher']))
				$is_succ = modify('user',array('Publish'=>$_REQUEST['publisher']),$id);
			if(isset($_REQUEST['url']))
				$is_succ = modify('user',array('Url'=>$_REQUEST['url']),$id);
			if(isset($_REQUEST['picPath']))
				$is_succ = modify('user',array('PicPath'=>$_REQUEST['picPath']),$id);
			if(isset($_REQUEST['info']))
				$is_succ = modify('user',array('Info'=>$_REQUEST['info']),$id);
			if(isset($_REQUEST['author']))
				$is_succ = modify('user',array('Author'=>$_REQUEST['author']),$id);
			if(isset($_REQUEST['authorInfo']))
				$is_succ = modify('user',array('AuthorInfo'=>$_REQUEST['authorInfo']),$id);
			
			return $is_succ;
	}
	
	function modifyFeedback($type){
		if (isset($_REQUEST['submit'])) {
			if ($_REQUEST['feedbackid'] != null) {
				$feedbackId = $_REQUEST['feedbackid'];
			}
			else {
				return false;
			}
		
			if($type == "note"){
				$page = $_REQUEST['page'];
				$pagecontent = $_REQUEST['pagecontent'];
				(isset($_REQUEST['autho']))?$autho = $_REQUEST['autho']:$autho = 1;//判断权限
				($autho=="on")?$autho = 0:$autho = 1;
				$modifyArray = array("Name"=>$page,"Info"=>$pagecontent,"IsOpen"=>$auto);
				return modify('feedback',$modifyArray,$feedbackId);	
			}else{
				$title = $_REQUEST['title'];
				$commentcontent = $_REQUEST['commentcontent'];
				$modifyArray = array("Name"=>$title,"Info"=>$commentcontent);
				return modify('feedback',$modifyArray,$feedbackId);	
			}
		}
		return $is_succ;
	}
	
	function addnewFeedback($topicid,$type){
		
		if(!isset($_REQUEST['userid'])) return false;
		
		$userid = $_REQUEST['userid'];
		
		if($type == "note"){
			$page = $_REQUEST['page'];
			$pagecontent = $_REQUEST['pagecontent'];
			(isset($_REQUEST['autho']))?$autho = $_REQUEST['autho']:$autho = 1;//判断权限
			($autho=="on")?$autho = 0:$autho = 1;
			return addFeedback('note',$page,$pagecontent,$userid,$topicid,$autho);	
		}
		else if( $type == "comment"){
			$title = $_REQUEST['title'];
			$commentcontent = $_REQUEST['commentcontent'];
			return addFeedback('comment',$title,$commentcontent,$userid,$topicid,$isOpen = 1);
		}
		else {
			$title = $_REQUEST['title'];
			$labelcontent = $_REQUEST['labelcontent'];
			return addFeedback('label',$title,$labelcontent,$userid,$topicid,$isOpen = 1);
		}
	}
	
	function addnewUser(){
		if( isset($_REQUEST['count_name'])){
			$countName = $_REQUEST['count_name'];
			$userName = $_REQUEST['user_name'];
			$passWord = $_REQUEST['password'];
			
			$result = addUser($userName,$countName,$passWord);
			return $result;
		}
	}
	
	function modifyUser() {
		$is_succ = false;
		if (isset($_REQUEST['submit'])) {
			//echo $_REQUEST['id'];
			if ($_REQUEST['id'] != null) {
				$userId = $_REQUEST['id'];
			}
			else {
				return false;
			}
			if (isset($_REQUEST['name'])) {
				$is_succ = modify("user",array("Name"=>$_REQUEST['name']),$userId);
			}
			if (isset($_REQUEST['newInfo'])) {
				$is_succ = modify("user",array("Info"=>$_REQUEST['newInfo']),$userId);
			}
			if ($_FILES["picPath"]["error"] <=0) {
				$is_succ = modify("user",array("PicPath"=>upload($userId,"user")),$userId);
			}
		}
		return $is_succ;
	}
	
	function addnewGroup(){
		if( isset($_REQUEST['submit'])){
			$groupName = $_REQUEST['name'];
			$info = $_REQUEST['info'];
			$userId = $_REQUEST['userid'];
			return addGroup($info,$groupName,$userId);
		}
	}

	function modifyGroup() {
		$is_succ = false;
		$groupId;
		if (isset($_REQUEST['submit'])) {
			if ($_REQUEST['id'] != null) {
				$groupId = $_REQUEST['id'];
			}
			else {
				return false;
			}
			if ($_REQUEST['newInfo'] != null) {
				$is_succ = modify("user",array("Info"=>$_REQUEST['newInfo']),$groupId);
			}
			if ($_REQUEST['name'] != null) {
				$is_succ = modify("user",array("Name"=>$_REQUEST['name']),$groupId);
			}
		}
		return $is_succ;
	}
	
	function upload($path,$type){		
		// check if it has file upload
		if ($_FILES["picPath"]["error"] > 0)  {
			return;
		  }
		else	{
	  		$uploaddir = "images/";		// the directory to save
	 
		  	// limit photo size
		  	if ( $_FILES["picPath"]["size"] > 100000)
		  		return "Photos uploaded too larges.\n";
		  	// deal with the photo name
			$fileName = $_FILES["picPath"]["name"];//得到上传文件的名字
		  	$imgType = explode(".", $fileName);
		  	if ($type == "user") {
		  		$uploadfile = strval("u".$path.".".$imgType[1]);
		  	}
		  	else {
		  		$uploadfile = strval("s".$path.".".$imgType[1]);
		  	}
		  	// move to the right directory
		  	move_uploaded_file($_FILES['picPath']['tmp_name'],$uploaddir.$uploadfile);
		  	return ($uploadfile);
	  	}
	}
	
	function modifyChoose() {
		$is_succ = false;
		if (isset($_REQUEST['method'])){
			if ($_REQUEST['method']=="addTopic") {
				if (addnewTopic())
					$is_succ = true;
			}
			elseif ($_REQUEST['method'] == "addFeedback") {
				$type =  $_REQUEST['type'];
				$id = isset($_REQUEST["topicid"])?$_REQUEST["topicid"] : -1;
				
				if (addnewFeedback($type,$id))
					$is_succ = true;
			}
			elseif ($_REQUEST['method'] == 'addUser') {
				if (addnewUser()) {
					$is_succ = true;
				}
			}
			elseif ($_REQUEST['method'] == "addGroup") {
				if (addnewGroup()) {
					$is_succ = true;
				}
			}
				if ($_REQUEST['method']=="modifyTopic") {
				if (modifyTopic())
					$is_succ = true;
			}
			elseif ($_REQUEST['method'] == "modifyFeedback") {
				if (modifyback())
					$is_succ = true;
			}
			elseif ($_REQUEST['method'] == 'modifyUser') {
				if (modifyUser()) {
					$is_succ = true;
				}
			}
			elseif ($_REQUEST['method'] == "modifyGgroup") {
				if (modifyGroup()) {
					$is_succ = true;
				}
			}
		}
		return ($is_succ);
	}
	?>