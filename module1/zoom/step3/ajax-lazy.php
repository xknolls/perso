<?php 
require_once('./config/config.php');
require_once('./inc/medias-lazy.php');

/* --------------------------------- Galerie -------------------------------- */

$galleries = listDirectory(PATH_MEDIAS);
$gallery = MEDIAS_DEFAULT;
$gallery_path = PATH_MEDIAS . $gallery . '/';

if (array_key_exists('galerie', $_GET) && in_array($_GET['galerie'], $galleries)) {
    $gallery = $_GET['galerie'];
    
    $gallery_path = PATH_MEDIAS . $gallery . '/';    
}

$list_gallery = lazyGallery($gallery_path);
/* -------------------------------- Affichage ------------------------------- */
$theme_path = THEMES_PATH . THEME_DEFAULT . '/'; 

echo json_encode($list_gallery);
