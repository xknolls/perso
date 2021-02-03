<?php

require('models/functions.php');

$query = getposts(5);


$template = 'index';
include_once 'views/layout.phtml';