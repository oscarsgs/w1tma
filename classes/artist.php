<?php 
	class Artist{
		private $name;
		private $songs = array();
		
		public function __construct($n){
			$this->name = $n;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($n){
			$this->name = $n;
		}
	}
 ?>