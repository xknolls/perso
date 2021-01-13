<?php

/*
    Si on arrive à ouvrir le dossier :
    $dir_handle = dossier ouvert
*/

//Tableau dans lequel seront stocké le nom des photos à afficher 

$lazy_gallery = array();
$exts_granted = array('jpg','jpeg','png','gif','webm','svg');//extension recherché

if( $dir_handle = opendir('img') ) {

    while( false !== ( $entry = readdir($dir_handle) ) ) {
        $ext = pathinfo($entry, PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        //Si $ext est une extension autorisé (jpg,jpeg,png,gif,webm,svg)
        if( in_array($ext, $exts_granted ) ) {
             //Stocker le nom des fichiers à afficher
            //$lazy_gallery[] = $entry;
            
            //Passer le nom, sans l'extension en majuscule
            $alt = ucfirst( pathinfo($entry, PATHINFO_EXTENSION) );
            //Supprimer tout ce qui se trouve apres le premier '_'
            $alt = strstr ($alt,'_',true); 
        
            $lazy_gallery [] = array(
                'src' => $entry,
                'alt' => $alt,
            );
        }
    }
} else {
    $error = 'Problème à l\'ouverture du dossier';
}