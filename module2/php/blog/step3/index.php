<?php



require('models/functions.php');

$query = get_posts();


$template = 'index';
include_once 'views/layout.phtml';