<?php
class Topic {
	public $id;
	public $name;	
	public $info;	
	public $picPath;	
	public $author;
	public $publisher;
	public $userID;
	public $date;
	public $url;
	public $score;

	public function __construct($data) {
		$this->id = (int)$data[0];
		$this->name = $data[1];
		$this->info = $data[2];
		$this->picPath = $data[3];
		$this->author = $data[4];
		$this->authorInfo = $data[5];
		$this->publisher = $data[6];
		$this->userID = $data[7];
		$this->date = $data[8];
		$this->url = $data[9];
		$this->score = $data[10];
	}
	
	public function getFeedbacks($start, $count =20){
		$sql = "select * from feedback
		where feedback.TopicID = ?
		order by Date desc 
		limit $start,$count";
		$type = new ReflectionClass('Feedback');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getFeedbackNum(){
		$table = "(select * from feedback
		where feedback.TopicID = $this->id) temp";
		return countNum($table);
	}
	
	private function getFeedbackByType($type, $start, $count =20){
		if (!in_array($type,array('comment','note','label')))
			return false;
		
		$sql = "select * from feedback
		where feedback.TopicID = ? and feedback.Type = '$type'
		order by Date desc
		limit $start,$count";
		$type = new ReflectionClass('Feedback');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getFeedbackByTypeNum($type){
		if (!in_array($type,array('comment','note','label')))
			return false;
			
		$table = "(select * from feedback
		where TopicID = $this->id and Type = '$type') temp";
		return countNum($table);
	}
	
	public function getAllLabel(){
		$sql = "select * from feedback
		where TopicID = ? and feedback.Type = 'label'
		order by Date desc";
		$type = new ReflectionClass('Feedback');
		return getClassByInput($type,$sql,array($this->id));
	}
	
	public function getUser(){
		$type = new ReflectionClass('User');
		return getDataById($type,'user',$this->userID);	
	}
}
?>