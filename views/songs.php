<?php
/**
 * songs.php file
 *
 * Creates the content for the Songs page
 *
 */

	require_once 'includes/functions.php';
	
	$song_head = "templates/content-header-songs.html";
	$song_content = "templates/content-songs.html";
	$song_foot = "templates/content-footer-songs.html";


	$song_table = "";
	//Create an array of Artist by querying the database
	$artists = addArtists($config);
	//Add songs to each Artist
	foreach ($artists as $artist) {
		$artist->addSongsFromDB($config);
		$template = file_get_contents($song_content);
		//Only active Artists have songs
		if($artist->getSongCount()>0){
			//Display each song
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