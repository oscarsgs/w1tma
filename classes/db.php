<?php 
/**
 * db.php File
 *
 * Contains the class DB
 *
 */

/**
 * Class DB
 *
 * Implements the class DB, from the class mysqli
 *
 */
class DB extends mysqli {

	/**
	 * Constructor
	 *
	 * Initialises the object DB. Connects to the database with the credentials provided in the arguments and checks for errors.
	 *
	 */
	public function __construct($host,$user,$pass,$db){
		parent::__construct($host,$user,$pass,$db);
		if($this->connect_errno){
			exit($this->connect_errno);
		}
	}
}
?>
