<?php 
$header_template = "templates/header.html";
$footer_template = "templates/footer.html";

$header = file_get_contents($header_template);
$footer = file_get_contents($footer_template);

echo $heder;
echo $footer;

 ?>