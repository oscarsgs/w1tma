<?php 
class DB extends mysqli {

	public function __construct($host,$user,$pass,$db){
		parent::__construct($host,$user,$pass,$db);
		if($this->connect_errno){
			exit($this->connect_errno);
		}
	}
}
?>
