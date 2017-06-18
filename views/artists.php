<?php 
	require_once 'includes/config.php';
	require_once 'classes/db.php';
	$artist_head = "templates/content-header-artists.html";
	$artist_content = "templates/content-artists.html";
	$artist_foot = "templates/content-footer-artists.html";
	$content .= file_get_contents($artist_head);
	$content .= file_get_contents($artist_content);
	$content .= file_get_contents($artist_foot);
 ?>