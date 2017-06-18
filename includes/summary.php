<?php 
	require 'includes/config.php';
	require 'classes/db.php';
	$template = file_get_contents($aside_template);
	$db = new DB($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
	$sql = "SELECT count(*) from song";
	$query = $db->query($sql);
	$songs = str_replace('%%-total_songs-%%', $query, $template);
	$sql = "SELECT a.count(*) from artist a join song s on (a.id = s.artist_id)";
	$query = $db->query($sql);
	$summary .= str_replace('%%-total_artists-%%, replace, subject)


 ?>