<?php 
	class Song{
		private $title;
		private $duration;

		public function __construct($t,$d){
			$this->title = $t;
			$this->duration = $d; 
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($t){
			$this->title = $t;
		}

		public function getDuration(){
			date_default_timezone_set("GMT");
			$dur = date('i:s',$this->duration);
			return $dur;
		}

		public function setDuration($d){
			$this->duration = $d;
		}
	}
 ?>