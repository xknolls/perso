<?php


//TODO : il faudrais l'avoir qu'une seule fois!
const DATAFILE = 'data/contacts.csv';
$errors = array();


if ( !empty($_POST)) {
    
    //Tester la saisie
    if (empty($_POST['firstanme'])) {
        $errors['firstname'] = 'Le champs est requis' ;
    }
    //Si $errors es vide 
    if ( empty($errors) ) {
        $file = fopen(DATAFILE,'a');

        fputcsv($file,$_POST, ';');

        fclose($file);

        header('Location: index.php');
    }


    
}






//Inclure la vue
include 'add.phtml';