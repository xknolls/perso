<?php 
require_once('./config/config.php');
require_once('./inc/medias-lazy.php');

/* --------------------------------- Galerie -------------------------------- */

$galleries = listDirectory(PATH_MEDIAS);
<<<<<<< HEAD
=======

>>>>>>> 87ddcd19e222ad8a26edff41f18a7e666c3d4199
$lazy_galleries = [];

foreach($galleries as $gallery) {
    $gallery_path = PATH_MEDIAS . $gallery . '/';
    $lazy_gallery = lazyGallery($gallery_path);
    $lazy_galleries["$gallery"] = $lazy_gallery;
}

/* -------------------------------- Affichage ------------------------------- */
$theme_path = THEMES_PATH . THEME_DEFAULT . '/'; 

include $theme_path . 'views/galleries.phtml';