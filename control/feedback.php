<?php
class Feedback {
	public $id;
	public $type;
	public $name;
	public $info;
	public $score;
	public $date;
	public $isOpen;
	public $userID;
	public $topicID;

	public function __construct($data) {
		$this->id = (int)$data[0];
		$this->type = $data[1];
		$this->name = $data[2];
		$this->info = $data[3];
		$this->score = $data[4];
		$this->isOpen = $data[7];
		$this->date = $data[8];
		
		$this->userID = $data[5];
		$this->topicID = $data[6];
	}
	
	public function getUser(){
		$type = new ReflectionClass('User');
		return getDataById($type,'user',$this->userID);
	}
	
	public function getTopic(){
		$type = new ReflectionClass('Topic');
		return getDataById($type,'topic',$this->topicID);
	}	
}
?>