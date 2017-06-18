<?php 
	$song_head = "templates/content-header-songs.html";
	$song_content = "templates/content-songs.html";
	$song_foot = "templates/content-footer.html";
	$content .= file_get_contents($song_head);
	$content .= file_get_contents($song_content);
	$content .= file_get_contents($song_foot);
 ?>