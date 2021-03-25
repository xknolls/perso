<?php

//config
require_once './config/config.php';

//recuperer les données
require_once 'inc/media-lazy.php';

/* -------------------------------- affichage ------------------------------- */

$theme_path = THEMES_PATH . THEME_DEFAULT;
include_once $theme_path . '/index.phtml';