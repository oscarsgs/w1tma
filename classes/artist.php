<?php 
	require_once 'song.php';



	class Artist{
		private $name;
		private $id;
		private $songs = array();

		public function __construct($i,$n){
			$this->name = $n;
			$this->id = $i;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($n){
			$this->name = $n;
		}

		public function getId(){
			return $this->name;
		}

		public function setId($i){
			$this->id = $i;
		}

		public function addSong($t,$a,$d){
			$songs[] = new Song($t,$a,$d);
		}

		public function getSongs(){
			return $this->songs;
		}

		public function getSongCount(){
			return count($this->songs);
		}
	}
 ?>