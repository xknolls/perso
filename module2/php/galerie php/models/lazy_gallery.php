<?php

/** 
 * make_thumbnail
 *
 * @param  mixed $source
 * @param  mixed $reduction
 * @param  mixed $destination
 * @return void
 */

function make_thumbnail($source,$reduction,$destination) {
    //si le dossier n'est pas accessible, sortir de la fonction
    if( !is_writable( pathinfo($destination, PATHINFO_DIRNAME))){
        return;
    }
    // imagecreatefrom....extension...(jpg=jpeg) que l'on stock dans $resource
    $ext = pathinfo($source, PATHINFO_EXTENSION);
    $ext = strtolower($ext);

    switch($ext) {
        case 'jpeg' :
        case 'jpg' :
            $resource = imagecreatefromjpeg($source);
        break;

        case 'png' :
            $resource = imagecreatefrompng($source);
        break;

        case 'gif' :
            $resource = imagecreatefromgif($source);
        break;

        case 'webm' :
            $resource = imagecreatefromwebp($source);
        break;

        default:
            copy($source,$destination);
    }
    //Pour obtenir la taille en x et y 
    $width = imagesx($resource);
    $height = imagesy($resource);

    //Calcul des dimmenssions souhaité en fonction coef de reduction souhaité
    $new_height = $height * $reduction;
    $new_width = $width * $reduction;

    //creation d'une image noir à al taile de la mminiature 
    $thumbnail = imagecreatetruecolor($new_width ,$new_height);

    //Création de la miniature 
    imagecopyresampled($thumbnail,$resource,0,0,0,0,$new_width,$new_height,$width,$height);

    //Enregistrement de la miniature 
    
    //Rcupération du nom du fichier dans le chemin de la source
    //$filename = pathinfo($source,PATHINFO_BASENAME);

    switch($ext) {
        case 'jpeg' :
        case 'jpg' :
            imagejpeg($thumbnail, $destination);
        break;

        case 'png' :
            imagepng($thumbnail,  $destination);
        break;

        case 'gif' :
            imagegif($thumbnail, $destination);
        break;

        case 'webm' :
            imagewbmp($thumbnail, $destination);
        break;

        default:
            return;
    }

}

/*
    Si on arrive à ouvrir le dossier :
    $dir_handle = dossier ouvert
*/

//Definir les constantes 
const DIR_PICTURE = 'img/';
const DIR_THUMBNAIL = 'img/thumbnails/';

//Tableau dans lequel seront stocké le nom des photos à afficher 
$lazy_gallery = array();
$exts_granted = array('jpg','jpeg','png','gif','webm','svg');//extension recherché

//if( $dir_handle = opendir('img') ) {
if( is_readable('img') ) {

    $dir_handle = opendir('img');

    while( false !== ( $entry = readdir($dir_handle) ) ) {
        $ext = pathinfo($entry, PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        //Si $ext est une extension autorisé (jpg,jpeg,png,gif,webm,svg)
        if( in_array($ext, $exts_granted ) ) {
             //Stocker le nom des fichiers à afficher
            //$lazy_gallery[] = $entry;
            
            //Passer le nom, sans l'extension en majuscule
            $alt = ucfirst( pathinfo($entry, PATHINFO_FILENAME) );
            //Supprimer tout ce qui se trouve apres le premier '_'
            $alt = strstr ($alt,'_',true); 
            
            //Créer la miniature si elle n'existe pas 
            if( !file_exists(DIR_THUMBNAIL . $entry)) {
                make_thumbnail(DIR_PICTURE . $entry,0.75,DIR_THUMBNAIL . $entry);
        
            }

            $lazy_gallery [] = array(
                'path' => DIR_THUMBNAIL . $entry,
                'name' => $entry,
                'alt' => $alt,
            );
        }
    }
} else {
    $error = 'Problème à l\'ouverture du dossier';
}
