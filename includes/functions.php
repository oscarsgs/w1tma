<?php 

require_once 'classes/db.php';
require_once 'classes/artist.php';
require_once 'includes/config.php';
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

 ?>