<?php 
require_once('./config/config.php');
require_once('./inc/medias-lazy.php');

/* --------------------------------- Galerie -------------------------------- */

$galleries = listDirectory(PATH_MEDIAS);
<<<<<<< HEAD
$gallery = MEDIAS_DEFAULT;
$gallery_path = PATH_MEDIAS . $gallery . '/';

if (array_key_exists('galerie', $_GET) && in_array($_GET['galerie'], $galleries)) {
    $gallery = $_GET['galerie'];
    
    $gallery_path = PATH_MEDIAS . $gallery . '/';    
}

$list_gallery = lazyGallery($gallery_path);
/* -------------------------------- Affichage ------------------------------- */
$theme_path = THEMES_PATH . THEME_DEFAULT . '/'; 




=======
$media = MEDIAS_DEFAULT;
$gallery_path = PATH_MEDIAS . $media . '/';

if (array_key_exists('galerie', $_GET) && in_array($_GET['galerie'], $galleries)) {
    $media = $_GET['galerie'];
    
    $gallery_path = PATH_MEDIAS . $media . '/';    
}

$gallery = lazyGallery($gallery_path);
/* -------------------------------- Affichage ------------------------------- */
$theme_path = THEMES_PATH . THEME_DEFAULT . '/'; 

>>>>>>> 87ddcd19e222ad8a26edff41f18a7e666c3d4199
include $theme_path . 'views/index.phtml';