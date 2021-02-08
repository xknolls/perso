<?php



require('models/functions.php');

$query = getposts();


$template = 'index';
include_once 'views/layout.phtml';