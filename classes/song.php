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
			$min = floor($this->duration/60);
			$sec = $this->duration % 60;
			$dur = $min . ":" . $sec;
			return $dur;
		}

		public function setDuration($d){
			$this->duration = $d;
		}
	}
 ?>