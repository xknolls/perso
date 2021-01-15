<?php


//TODO : il faudrais l'avoir qu'une seule fois!
const DATAFILE = 'data/contacts.csv';
$errors = array(

);



if ( !empty($_POST)) {

    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    
    //Tester la saisie
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'Le champs est requis*' ;
    }

    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Le champs est requis*' ;
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Le champs est requis*' ;
    }

    if (empty($_POST['tel'])) {
        $errors['tel'] = 'Le champs est requis*' ;
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