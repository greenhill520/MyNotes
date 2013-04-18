<?php
class User {
	public $id;
	public $name;	
	public $info;	
	public $picPath;		
	public $isAdmin;
	public $createTime;

	public function __construct($data) {		
		$this->id = (int)$data[0];
		$this->name = $data[1];
		$this->info = $data[4];
		$this->picPath = $data[5];
		
		$this->isAdmin = $data[6];
		$this->createTime = $data[7];
	}

	public function getFeedbackByTpye($type, $start, $count = 20) {
		if (!in_array($type,array('comment','note','label')))
			return false;
			
		$sql = "select * from feedback 
		where UserID = ? and Type = '$type'
		order by Date desc
		limit $start,$count";
		$type = new ReflectionClass('Feedback');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getEarlyFeedback($count=5) {
		$sql = "select * from feedback 
		where UserID = ?
		order by Date desc
		limit $count";
		$type = new ReflectionClass('Feedback');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getFeedbackByTypeNum($type){
		if (!in_array($type,array('comment','note','label')))
			return false;
			
		$table = "(select * from feedback 
		where UserID = $this->id and Type = '$type') temp";
		return countNum($table);
	}
	
	public function getGroups($start,$count = 20) {
		$sql = "select groups.* from groups,usertogroup 
		where usertogroup.UserID = ? and usertogroup.GroupID = groups.id
		order by Date desc 
		limit $start,$count";
		$type = new ReflectionClass('Group');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getGroupNum(){
		$table = "(select groups.* from groups,usertogroup 
		where usertogroup.UserID = $this->id and usertogroup.GroupID = groups.id) temp";
		return countNum($table);
	}
	
	public function getFriends($start, $count = 20) {
		$sql = "select user.*
		from user,friend
		where (user.id = friend.UserA and friend.UserB = ?) or (user.id = friend.UserB and friend.UserA = ?)
		order by Date desc 
		limit $start,$count";
		$type = new ReflectionClass('User');
		return getClassByInput($type,$sql,array($this->id, $this->id));
	}
	
	public function getFriendNum(){
		$table = "(select user.*
		from user,friend
		where (user.id = friend.UserA and friend.UserB = $this->id) or (user.id = friend.UserB and friend.UserA = $this->id)) temp";
		return countNum($table);
	}
	
	public function getChargedGroups($start, $count = 20){
		$sql = "select * from groups 
		where groups.AdminID = ?
		order by Date desc 
		limit $start,$count";
		$type = new ReflectionClass('Group');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function isInGroup($groupID) {
		$sql = "select 1 from usertogroup 
		where usertogroup.UserID = ? and usertogroup.GroupID = ?";
		return isrecord($sql,array($this->id, $groupID));
	}
	
	public function isGroupAdmin($groupID) {
		$sql = "select 1 from groups 
		where groups.AdminID = ? and groups.id = ?";
		return isrecord($sql,array($this->id, $groupID));
	}
	
	public function isAnyGroupAdmin() {
		$sql = "select 1 from groups 
		where groups.AdminID = ?";
		return isrecord($sql,array($this->id));
	}
	
	public function isFriend($id) {
		$sql = "select 1
		from friend
		where (friend.UserA = ? and friend.UserB = ?) or (friend.UserA = ? and friend.UserB = ?)";
		return isrecord($sql,array($this->id,$id,$id,$this->id));
	}
}
?>