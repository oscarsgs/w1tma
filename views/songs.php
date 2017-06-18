<?php 
	require_once 'includes/functions.php';
	
	$song_head = "templates/content-header-songs.html";
	$song_content = "templates/content-songs.html";
	$song_foot = "templates/content-footer-songs.html";


	$song_table = "";
	$artists = addArtists($config);
	foreach ($artists as $artist) {
		$artist->addSongsFromDB($config);
		$template = file_get_contents($song_content);
		if($artist->getSongCount()>0){
			foreach($artist->getSongs() as $song){
				$artist_name = str_replace('%%-song_artist-%%', $artist->getName(), $template);
				$song_name = str_replace('%%-song_name-%%', $song->getTitle(), $artist_name);
				$song_duration = str_replace('%%-song_duration-%%', $song->getDuration(), $song_name);
				$song_table .= $song_duration;
			}
			
		}
	}
	$content .= file_get_contents($song_head);
	$content .= $song_table;
	$content .= file_get_contents($song_foot);

 ?>