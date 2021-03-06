<?php 
/**
 * song.php file
 *
 * Contains the class Song
 *
 */

 	/**
	 * Class Song
	 *
	 * Implements the class Song
	 *
	 * @var string $title Contains the title of the Song.
	 * @var int $duration Contain the duration of the Song in seconds.
	 *
	 */
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

		/**
		 * getDuration
		 *
		 * Returns the duration of the Song in the format mm:ss
		 *
		 */
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