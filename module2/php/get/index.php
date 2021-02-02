<?php

/*
    Définir $page correspondant au contenu à inclure

        3 possibilité
        $page = 1
        $page = 2
        $page = 3
*/
//Toutes les valeurs passées dans l'URL sont de type string
//var_dump($_GET['p']);


//Si pas de variable p dans l'URL
if ( !isset($_GET['p'])) {
    $page = 'page1';
} else {
    $page = 'page' .$_GET['p'];
}

// Eviter le else
$page = 'page1';

//Nombre de page 
$nb = 3;

/* 
    Si il existe une variable p dans l'url et que le contenue de la chaiane est nombre
*/

if (
    isset($_GET['p'])
    AND ctype_digit($_GET['p'])
    AND $_GET['p'] <= $nb
    AND $_GET['p'] > 0
) {
        $page = 'page' .$_GET['p'];
}

include 'index.phtml';