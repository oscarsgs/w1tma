<?php 
	require_once 'artist.php';
	class Song{
		private $title;
		private $aritst;
		private $duration;

		public function __construct($t,$a,$d){
			$this->title = $t;
			$this->artist = new Artist($a);
			$this->duration = $d; 
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($t){
			$this->title = $t;
		}

		public function getArtist(){
			return $this->artist->getName();
		}

		public function setArtist($a){
			$this->artist->setName($a);
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