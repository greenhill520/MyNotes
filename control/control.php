<?php
include_once("user.php");
include_once("topic.php");
include_once("feedback.php");
include_once("group.php");

function connect($user, $password) {
	$db = new PDO('mysql:host=127.0.0.1;dbname=mynotes;charset=UTF-8', 'root', '');
	$db->query("set names utf8");
	return $db;
}

$db = connect('root', '');

//******************************************常用函数*************************************************************
//addUser($userName, $countName,$password)	//成功返回user类，已存在帐号返回error，失败返回false；
//login($countName,$password)				//成功返回类，失败返回false
//modifyPassword($id,$newPassword) 			//没有检验合法性的，一旦提交就修改
//countNum($table) 							//输入表名
//addfriend($userA,$userB)					//加为好友，成功返回true，失败返回false，输入两个用户的id，双向的，顺序无关
//addInGroup($userID,$groupID)				//加入小组，成功返回true，失败返回false
//addGroup($name,$info,$adminID)			//增加小组，成功返回id，失败返回false
//addTopic($name,$info,$picPath,$author,$authorInfo,$publisher,$userID,$url)
											//增加topic，如果属性为空则为''，成功返回id，失败返回false
//addFeedback($type,$name,$info,$userID,$topicID,$isOpen = 1)
											//这里的$type只能是'comment','label','note'，成功返回id，失败返回false										//**************************************************************************************************************

//成功返回user类，已存在帐号返回error，失败返回false
function addUser($userName, $countName,$password) {
	global $db;
	try {
		$pwmd = md5(md5($password));
		$cnmd = md5($countName);

		$res = $db->query( "SELECT 1 from user where CountName = '$cnmd'" );
		$temp = $res->fetch();
		if(!empty($temp)){
			return "error 1";
		}
		
		$db->exec("INSERT INTO user VALUES(null,'$userName','$cnmd','$pwmd','','',0,null)");
		
		$id = getLastInsertId();

		$res = $db->query( "SELECT * from user order by id desc limit 1" );
		return new User($res->fetch());

	} catch (Exception $e) {
		$db->rollBack();
		return "error";
	}
}

//成功返回类，失败返回false
function login($countName,$password){
	global $db;
	try {
		$pwmd = md5(md5($password));
		$cnmd = md5($countName);
		$res = $db->query("select * from user where CountName = '$cnmd'");
		$isfind = false;
		
		foreach($res as $row)
			if($row[3] == $pwmd){
				$isfind = true;
				break;
			}
			
		if ($isfind){
			$user = new user($row);
			return $user;
		}else{
			$user = null;
			return false;
		}
			
	} catch (Exception $e) {
		$db->rollBack();
		return false;
	}
}

//没有检验合法性的，一旦提交就修改
function modifyPassword($id,$newPassword){
	global $db;
	try {
		$pwmd = md5(md5($newPassword));
		modify('user',array("Password"=>$pwmd),$id);
	} catch (Exception $e) {
		$db->rollBack();
		return false;
	}
}

//输入表名
//$table可以是一个表的名字也可以是sql的一个查询表
function countNum($table){
	global $db;	
	$res = $db->query("select count(*) from ".$table);
	$result = $res->fetch();
	return empty($result)?0:$result[0];
}

//根据一个条件来查询
function countNumbyConditoin($table, $array){
	global $db;	
	
	$condition = '';
	foreach ($array as $name => $item)
		$condition = $condition."$name = '$item' and ";
	$condition = $condition." 1 = 1 ";	
	
	$res = $db->query("select count(*) from $table where ".$condition);
	$result = $res->fetch();
	return empty($result)?0:$result[0];
}

//加为好友，成功返回true，失败返回false，输入两个用户的id，双向的，顺序无关
function addfriend($userA,$userB){
	if($userA == $userB)
		return false;
	$sql = "INSERT INTO friend VALUES(?,?)";
	return action($sql,array($userA,$userB));
}

//加入小组，成功返回true，失败返回false
function addInGroup($userID,$groupID){
	$sql = "INSERT INTO usertogroup VALUES(?,?)";
	return action($sql,array($userID,$groupID));
}

//增加小组，成功返回id，失败返回false
function addGroup($name,$info,$adminID){
	$sql_group = "INSERT INTO groups VALUES(null,?,?,?,null)";
	$array_group = array($name,$info,$adminID);
	if(action($sql_group,$array_group) == false)
		return false;
		
	$groupId = getLastInsertId();	
	return (addInGroup($adminID,$groupId)?$groupId:false);
}

//增加topic，如果属性为空则为''，成功返回id，失败返回false
function addTopic($name,$info,$picPath,$author,$authorInfo,$publisher,$userID,$url){
	$sql = "INSERT INTO topic VALUES(null,?,?,?,?,?,?,?,null,?,?)";
	$array = array($name,$info,$picPath,$author,$authorInfo,$publisher,$userID,$url,0);
	return (action($sql,$array)?getLastInsertId():false);
}

//这里的$type只能是'comment','label','note'，成功返回id，失败返回false
function addFeedback($type,$name,$info,$userID,$topicID,$isOpen = 1){
	if (!in_array($type,array('comment','note','label')))
		return false;
		
	$sql = "INSERT INTO feedback VALUES(null,?,?,?,0,?,?,?,null)";
	$array = array($type,$name,$info,$userID,$topicID,$isOpen);

	return (action($sql,$array)?getLastInsertId():false);
}

//************************************************慎用的函数******************************************************
//getDataById($type,$table,$id)						//$table是表名，$type是反射类型，成功返回type类型的对象数组
//getEarlyData($type, $table, $start, $count = 20)  //拿到最近的类,第start开始的count个，从0开始，成功返回type类型的对象数组
//delete($table,$id)								//删除一个表里面id为$id的项，成功返回ture，失败返回false
//modify($table,$array,$id)							//修改id为$id的项的内容，array为('colname'=>'value')，成功返回ture，失败返回false
//deleteItems($table,$idname,$id)					//删除表里面id名字为$idname，值为$id的记录，好友的话为 'UserA'，$id
//**************************************************************************************************************

function getTopTopics($count = 10){
	$sql = "select * from topic
		order by Score desc 
		limit 0,$count";
	$type = new ReflectionClass('Topic');
	return getClassByInput($type,$sql,array());
}

//use reflection class and prevent SQL injection
function getDataById($type,$table,$id) {
	global $db;
	
	if (!get_magic_quotes_gpc())
	$table = addslashes($table);
	
	$res = $db->query("select * from $table where id = $id");
	$class = $type->newInstance($res->fetch());
	
	return $class;
}

//想拿到user就$table = 'user',$type = new ReflectionClass('user');其他类推
function getEarlyData($type, $table, $start, $count = 20){
	$sql = "select * from $table
		order by Date desc 
		limit $start,$count";
	return getClassByInput($type,$sql,array());
}

function getEarlyDatabyConditoin($type, $table, $start, $count = 20,$array){
	$sql = "select * from $table where ";
	foreach ($array as $name => $item)
		$sql = $sql." $name = '$item' and ";
	$sql = $sql." 1 = 1 order by Date desc 
		limit $start,$count";
	return getClassByInput($type,$sql,array());
}

function delete($table,$id){
	$result = deleteItems($table,'id',$id);
	return $result;
}

function modify($table,$array,$id){
	global $db;
	try {
		$sql = "UPDATE $table SET ";
		foreach($array as $name => $value)
			$sql = $sql."$name = '$value',";
		$sql = $sql."id = $id where id = $id";
		
		return $db->exec($sql);
	} catch (Exception $e) {
		$db->rollBack();
		return false;
	}
}

function deleteItems($table,$idname,$id){
	global $db;
	try {		
		$result = true;
		switch($table){
			case 'topic':
				$result = $result?deleteItems('feedback','TopicID',$id):false;
				break;
			case 'groups':
				$result = $result?deleteItems('usertogroup','GroupID',$id):false;
				break;
			case 'user':
				$result = $result?deleteItems('friend','UserA',$id):false;
				$result = $result?deleteItems('friend','UserB',$id):false;
				$result = $result?deleteItems('group','AdminID',$id):false;
				$result = $result?deleteItems('topic','UserID',$id):false;
				break;
		}
		$result = $db->exec("DELETE FROM $table WHERE $idname = $id");
		return $result;
	} catch (Exception $e) {
		$db->rollBack();
		return false;
	}
}

//******************************************很少用的函数**********************************************************
//getClassByInput($type,$sql,$array)
//action($sql,$array)
//isrecord($sql,$array)
//**************************************************************************************************************
function getClassByInput($type,$sql,$array) {
	global $db;
	$result = array();
	$sth = $db->prepare($sql);
	$sth->execute($array);
	$res = $sth->fetchAll();
	foreach($res as $item){
		$class = $type->newInstance($item);
		array_push($result, $class);
	}	
	return $result;
}

function action($sql,$array){
	global $db;
	try {	
		foreach($array as $item)
			$item = addslashes($item);
		
		$sth = $db->prepare($sql);
		return $sth->execute($array);

	} catch (Exception $e) {
		$db->rollBack();
		return false;
	}
}

function isrecord($sql,$array){
	global $db;
	$result = array();
	$sth = $db->prepare($sql);
	$sth->execute($array);
	$res = $sth->fetch();
	return !empty($res);
}

function getLastInsertId(){
	global $db;
	return $db->lastInsertId();
}

//**************************************************没使用的函数**************************************************
//以下函数是没使用的，也就是没用的，写出来进行调试用而已
//有很多比如根据id拿到类的，但前面已经提供了一个通用的函数了！
//**************************************************************************************************************

function getDataByString($type,$table,$searchItem,$searchValue) {
	global $db;
	$result = array();
	$table = addslashes($table);
	$res = $db->query("select * from $table where $searchItem = '$searchValue'");
	
	foreach($res as $item){
		$class = $type->newInstance($item);
		array_push($result, $class);
	}
	return $result;
}

function getUserById($id) {
	global $db;
	$sth = $db->prepare("select * from user where id = ?");
	$sth->bindParam(1,$id,PDO::PARAM_INT);
	$sth->execute();
	$res = $sth->fetchAll();
	$user = new User($res[0]);
	return $user;
}

function getTopicById($id) {
	global $db;
	$sth = $db->prepare("select * from topic where id = ?");
	$sth->bindParam(1,$id,PDO::PARAM_INT);
	$sth->execute();
	$res = $sth->fetchAll();
	$topic = new Topic($res[0]);
	return $topic;
}

function getNoteById($id) {
	global $db;
	$sth = $db->prepare("select * from freeback where id = ?");
	$sth->bindParam(1,$id,PDO::PARAM_INT);
	$sth->execute();
	$res = $sth->fetchAll();
	$note = new Note($res[0]);
	return $note;
}

function getFriendsByUserId($id) {
	global $db;
	$result = array();
	$sth = $db->prepare("select user.*
	 from user,friend
	 where (user.id = friend.UserA and friend.UserB = ?) or (user.id = friend.UserB and friend.UserA = ?)");
	$sth->bindParam(1,$id,PDO::PARAM_INT);
	$sth->bindParam(2,$id,PDO::PARAM_INT);
	$sth->execute();
	$res = $sth->fetchAll();
	foreach($res as $item){
		$class = new User($item);
		array_push($result, $class);
	}	
	return $result;
}

function getUsersByGroupId($id) {
	//$sql = "select user.* from user,groups,usertogroup where 
	//usertogroup.UserID = user.id and usertogroup.GroupID = ?";
	$sql = "select user.* from user,usertogroup where 
	usertogroup.UserID = user.id and usertogroup.GroupID = ?";
	$type = new ReflectionClass('User');
	return getClassByInput($type,$sql,array($id));
}

function getGroupsByUserId($id) {
	global $db;
	$result = array();
	$sth = $db->prepare("select groups.*
	 from groups,usertogroup
	 where usertogroup.UserID = ? and usertogroup.GroupID = groups.id");
	$sth->bindParam(1,$id,PDO::PARAM_INT);
	$sth->execute();
	$res = $sth->fetchAll();
	foreach($res as $item){
		$class = new Group($item);
		array_push($result, $class);
	}	
	return $result;
}

function getDataByString2($type,$table,$searchItema,$searchValuea,$searchItemb,$searchValueb) {
	global $db;
	$result = array();
	$table = addslashes($table);
	$res = $db->query("select * from $table where $searchItema = '$searchValuea' and $searchItemb = '$searchValueb'");
	if(empty($res))	return null;
	
	foreach($res as $item){
		$class = $type->newInstance($item);
		array_push($result, $class);
	}
	return $result;
}
?>