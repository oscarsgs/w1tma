<?php 
/**
 * artists.php File.
 *
 * Creates the content for the Artists page
 */
	require_once 'includes/functions.php';
	require_once 'includes/config.php';

	//These three templates form the artist page content.
	$artist_head = "templates/content-header-artists.html";
	$artist_content = "templates/content-artists.html";
	$artist_foot = "templates/content-footer-artists.html";

	$artist_table = "";
	//Create an array of Artist by querying the database
	$artists = addArtists($config);
	//Add songs to each artist
	foreach ($artists as $artist) {
		$artist->addSongsFromDB($config);
		$template = file_get_contents($artist_content);
		//We´ll only display active Artists (More than one song)
		if($artist->getSongCount()>0){
			//Replace the name and number on songs on the template with the information for each Artist
			$artist_name = str_replace('%%-artist_name-%%', $artist->getName(), $template);
			$artist_songs = str_replace('%%-artist_songs-%%', $artist->getSongCount(), $artist_name);
			$artist_table .= $artist_songs;
		}
	}


	$content .= file_get_contents($artist_head);
	$content .= $artist_table;
	$content .= file_get_contents($artist_foot);

 ?>