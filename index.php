<?php 
// Code to detect whether index.php has been requested without query string goes here
// If no parameter detected...
if (!isset($_GET['page'])) {
    $id = 'home'; // display home page
} else {
    $id = $_GET['page']; // else requested page
}

$page = "";
$content = "";
$page_title = "W1 Music";
$summary = "";

// Switch statement to decide content of page will go here.
// Regardless of which "view" is displayed, the variable $content will contain the right content
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
$aside_template = "templates/aside-summary.html";
$footer_template = "templates/footer.html";

$header = file_get_contents($header_template);
$summary = file_get_contents($aside_template);
$footer = file_get_contents($footer_template);

 
$page .= str_replace('%%-title-%%', $page_title, $header);
$page .= $content;
$page .= $summary;
$page .= $footer;

echo $page;

 ?>