<?php 
	require_once 'includes/config.php';
	require_once 'classes/db.php';
	require_once 'classes/song.php';

	$db = new DB($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
	$sql = "SELECT count(*) from song";
	$query = $db->query($sql);
	if ($row = $query->fetch_assoc()) {
    	$songs = str_replace('%%-total_songs-%%', $row['count(*)'], $template);
	}
	$sql = "SELECT count(distinct artist_id)from artist a join song s on (a.id = s.artist_id)";
	$query = $db->query($sql);
	if ($row = $query->fetch_assoc()) {
    	$summary .= str_replace('%%-total_artists-%%', $row['count(distinct artist_id)'], $songs);
	}

	$db->close();
	$artist_head = "templates/content-header-artists.html";
	$artist_content = "templates/content-artists.html";
	$artist_foot = "templates/content-footer-artists.html";
	$content .= file_get_contents($artist_head);
	$content .= file_get_contents($artist_content);
	$content .= file_get_contents($artist_foot);
 ?>