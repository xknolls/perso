<?php 
require_once('./config/config.php');
require_once('./inc/medias-lazy.php');

/* --------------------------------- Galerie -------------------------------- */
$gallery_path = PATH_MEDIAS . MEDIAS_DEFAULT; 
$gallery = lazyGallery($gallery_path);

/* -------------------------------- Affichage ------------------------------- */
$theme_path = THEMES_PATH . THEME_DEFAULT . '/'; 
include $theme_path . 'views/index.phtml';