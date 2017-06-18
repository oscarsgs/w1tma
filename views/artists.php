<?php 
	require_once 'includes/functions.php';
	require_once 'includes/config.php';
	$artist_head = "templates/content-header-artists.html";
	$artist_content = "templates/content-artists.html";
	$artist_foot = "templates/content-footer-artists.html";


	$artist_table = "";
	$artists = addArtists($config);
	foreach ($artists as $artist) {
		$artist->addSongsFromDB($config);
		$template = file_get_contents($artist_content);
	//	if($artist->getSongCount()>0){
			$artist_name = str_replace('%%-artist_name-%%', $artist->getName(), $template);
			$artist_songs = str_replace('%%-artist_songs-%%', $artist->getSongCount(), $artist_name);
			$artist_table .= $artist_songs;
	//	}
	}


	$content .= file_get_contents($artist_head);
	$content .= $artist_table;
	$content .= file_get_contents($artist_foot);

 ?>