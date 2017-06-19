<?php 
/**
 * artist.php file
 *
 * Contains the class Artist
 *
 */
	require_once 'song.php';
	require_once 'classes/db.php';

	/** 
	 * Class Artist
	 *
	 * Implements the class Artist
	 *
	 * @var string $name Contains the Artist name.
	 * @var int $id      Contains the Artist ID number.
	 * @var array $songs Contains the array of songs that belong to an Artist. 
	 */
	class Artist{
		private $name;
		private $id;
		private $songs = array();
		
		/**
		 * Constructor 
		 *
		 * Initialises the object Aritst
		 *
		 * @param int    $i The Artist ID number.
		 * @param string $n The Artist name.
		 */
		public function __construct($i,$n){
			$this->name = $n;
			$this->id = $i;
		}

		/**
		 * addSongsFromDB 
		 *
		 * Adds songs to an Artist by querying the database
		 *
		 * @param array $conf Contains the credentials to create the connection to the database.
		 */
		public function addSongsFromDB($conf){
			//Create a new DB object
			$db = new DB($conf['db_host'], $conf['db_user'], $conf['db_pass'], $conf['db_name']);
			//SQL query
			$sql = "SELECT s.title title, s.duration duration from artist a join song s on (a.id = s.artist_id) where a.id=$this->id order by a.name asc, s.title asc";
			//Query the database
			$query = $db->query($sql);
			//Get each song and add it to the Artist
			while($row = $query->fetch_array()){
				$t = $row['title'];
				$d = $row['duration'];
				$this->addSong($t,$d);
			}
			//Close the connection
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

		/**
		 * addSong
		 *
		 * Initialises the object Aritst
		 *
		 * @param string $t The Song title.
		 * @param string $d The Song duration.
		 */
		public function addSong($t,$d){
			$this->songs[] = new Song($t,$d);
		}

		public function getSongs(){
			return $this->songs;
		}

		/**
		 * getSongCount
		 *
		 * Calculates the number of songs for the Artist
		 *
		 * @return int The total of songs for the Artist
		 */
		public function getSongCount(){
			return count($this->songs);
		}
	}
 ?>