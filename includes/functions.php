<?php 
require_once 'includes/config.php';
require_once 'classes/db.php';
require_once 'classes/artist.php';
function addArtists(){
	$artists = array();
	$db = new DB($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
	$sql = "SELECT id, name from artist order by name asc";
		$query = $db->query($sql);
		while($row = $query->fetch_array()){
			$t = $row['id'] = $i;
			$t = $row['name'] = $n;
			$artists[] = new Artist($i,$n);
		}
		$db->close();
		return $artists;
}

 ?>