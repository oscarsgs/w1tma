<?php 
/**
 * index.php file
 *
 * Contains the single point of entry for our site
 *
 */

//Check if index.php has been requested without query string
// If no parameter detected...
if (!isset($_GET['page'])) {
    $id = 'home'; // display home page
} else {
    $id = $_GET['page']; // else requested page
}
/**
 * @var string $page Contains the output of the site
 */
$page = "";
/**
 * @var strin $content Has the main content of the site, and varies depending on the page 
 */
$content = "";
$page_title = "W1 Music";
/**
 * @var $summary Contains the output for the summary of Artists and Songs
 */
$summary = "";
include 'includes/summary.php';
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
        //Not found 
        include 'views/404.php';
        $id = "404";
}


$header_template = "templates/header.html";
$footer_template = "templates/footer.html";

$header = file_get_contents($header_template);
$footer = file_get_contents($footer_template);

 
$page .= str_replace('%%-title-%%', $page_title, $header);
$page .= $content;
$page .= $summary;
$page .= $footer;

//Displays the page
echo $page;

 ?>