<?php
class Group {
	public $id;
	public $name;	
	public $info;	
	public $adminID;	
	public $date;

	public function __construct($data) {
		$this->id = (int)$data[0];
		$this->name = $data[1];
		$this->info = $data[2];
		$this->adminID = $data[3];
		$this->date = $data[4];
	}
	
	public function getAdmin(){
		$type = new ReflectionClass('User');
		return getDataById($type,'user',$this->adminID);
	}
	
	public function getUsers($start, $count = 20){
		$sql = "select user.* from user,usertogroup 
		where usertogroup.UserID = user.id and usertogroup.GroupID = ?
		order by user.Date desc 
		limit $start,$count";
		$type = new ReflectionClass('User');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getUserNum(){
		$table = "(select user.* from user,usertogroup 
		where usertogroup.UserID = user.id and usertogroup.GroupID = $this->id) temp";
		return countNum($table);
	}
	
	public function getNotes($start, $count = 20){
		$sql = "select feedback.* from feedback 
		where feedback.Type = 'note' and IsOpen = 1 and UserID in 
		( select usertogroup.UserID from groups,usertogroup
		  where usertogroup.GroupID = ?)
		order by feedback.Date desc 
		limit $start,$count";
		$type = new ReflectionClass('Feedback');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getNoteNum(){
		$table = "(select * from feedback 
		where Type = 'note' and IsOpen = 1 and UserID in 
		( select usertogroup.UserID from groups,usertogroup
		  where usertogroup.GroupID = $this->id)) temp";
		return countNum($table);
	}
	
	public function getFeedbacksByType($type, $start, $count = 20){
		if (!in_array($type,array('comment','note','label')))
			return false;
			
		$sql = "select feedback.* from feedback 
		where Type = '$type' and IsOpen = 1 and UserID in 
		( select usertogroup.UserID from groups,usertogroup
		  where usertogroup.GroupID = ?
		  group  by groups.id having count(groups.id)>1)
		order by feedback.Date desc 
		limit $start,$count";
		$type = new ReflectionClass('Feedback');
		return getClassByInput($type,$sql,array($this->id));
	}	
	
	public function getFeedbackNumByType($type){
		$table = "(select * from feedback 
		where Type = '$type' and IsOpen = 1 and UserID in 
		( select usertogroup.UserID from groups,usertogroup
		  where usertogroup.GroupID = $this->id
		  group  by groups.id having count(groups.id)>1)) temp";
		return countNum($table);
	}
}
?>