<?php 
/**
 * functions.php File.
 *
 * Contains a set of useful functions
 *
 */
require_once 'classes/db.php';
require_once 'classes/artist.php';
require_once 'includes/config.php';

/**
 * addArtists
 *
 * Creates an array of Artist by querying the database.
 *
 * @var array $c Contains the credentials to connect to the database.
 *
 * @return array $artists The array of Artist.
 *
 */
function addArtists($c){
	$artists = array();
	$db = new DB($c['db_host'], $c['db_user'], $c['db_pass'], $c['db_name']);
	$sql = "SELECT id, name from artist order by name asc";
		$query = $db->query($sql);
		while($row = $query->fetch_array()){
			$i = $row['id'];
			$n = $row['name'];
			$artists[] = new Artist($i,$n);
		}
		$db->close();
		return $artists;
}

/**
 * addSummary
 *
 * Implements the summary of Artist and Song.
 *
 * @var array $c Contains the credentials to connect to the database.
 *
 * @return the html template formated with the summary
 *
 */
function addSummary($c){
	$aside_template = "templates/aside-summary.html";
	$template = file_get_contents($aside_template);
	$db = new DB($c['db_host'], $c['db_user'], $c['db_pass'], $c['db_name']);
	$sql = "SELECT * from song";
	$query = $db->query($sql);
    $songs = str_replace('%%-total_songs-%%', $query->num_rows, $template);
	$sql = "SELECT distinct artist_id from artist a join song s on (a.id = s.artist_id)";
	$query = $db->query($sql);
	$result = str_replace('%%-total_artists-%%', $query->num_rows, $songs);
	$db->close();
	return $result;
}

 ?>