<?php 
/**
 * 404.php File.
 *
 * Calls the template for the "page not found" message.
 *
 */
	$not_found_template = "templates/content-404.html";
	$content = file_get_contents($not_found_template);
 ?>