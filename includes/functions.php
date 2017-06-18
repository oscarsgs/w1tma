<?php 

require_once 'classes/db.php';
require_once 'classes/artist.php';
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
/*
function addSongsFromDB($a){
	$db = new DB($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
	$sql = "SELECT s.title title, s.duration duration from artist a join song s on (a.id = s.artist_id) where a.id=$a->getId() order by a.name asc, s.title asc";
	$query = $db->query($sql);
	while($row = $query->fetch_array()){
		$t = $row['title'] = $t;
		$t = $row['duration'] = $d;
		$a->addSong($t,$d);
	}
	$db->close();
}

*/
 ?>