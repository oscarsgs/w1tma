<?php 
// Code to detect whether index.php has been requested without query string goes here
// If no parameter detected...
if (!isset($_GET['page'])) {
    $id = 'home'; // display home page
} else {
    $id = $_GET['page']; // else requested page
}


// Switch statement to decide content of page will go here.
// Regardless of which "view" is displayed, the variable $content will
switch ($id) {
    case 'home' :
        include 'views/home.php';
        break;
    case 'artists' :
        include 'views/artists.php';
        break;
    case 'songs' :
        include 'views/songs.php';
        break;
    default :
        include 'views/404.php';
        $id = "404";
}

$header_template = "templates/header.html";
$content_template = "templates/content-" . $id . ".html";
$footer_template = "templates/footer.html";

$header = file_get_contents($header_template);
$content = file_get_contents($content_template);
$footer = file_get_contents($footer_template);
 
echo $header;
echo $footer;

 ?>