<?php 
	$home_template = "templates/content-home.html";
	$home_title = "Welcome to W1 Music!"
	$welcome_message = "Pellentesque auctor convallis tellus a dictum. Fusce felis dolor, cursus a blandit."
	$template = file_get_contents($home_template);
	$title = str_replace('%%-home_title-%%', $home_title, $template);
	$content .= str_replace('%%-welcome_message_content-%%', $welcome_message, $title);
	
 ?>