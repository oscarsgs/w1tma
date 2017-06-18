<?php 
	require_once 'song.php';
	require_once 'classes/db.php';


	class Artist{
		private $name;
		private $id;
		private $songs = array();

		public function __construct($i,$n){
			$this->name = $n;
			$this->id = $i;
		}

		public function addSongsFromDB($conf){
			$db = new DB($conf['db_host'], $conf['db_user'], $conf['db_pass'], $conf['db_name']);
			$sql = "SELECT s.title title, s.duration duration from artist a join song s on (a.id = s.artist_id) where a.id=$this->id order by a.name asc, s.title asc";
			$query = $db->query($sql);
			while($row = $query->fetch_array()){
				$t = $row['title'];
				$d = $row['duration'];
				$this->addSong($t,$d);
			}
			$db->close();
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

		public function addSong($t,$d){
			$songs[] = new Song($t,$d);
		}

		public function getSongs(){
			return $this->songs;
		}

		public function getSongCount(){
			return count($this->songs);
		}
	}
 ?>