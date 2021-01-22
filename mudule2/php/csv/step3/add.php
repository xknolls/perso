<?php


//TODO : il faudrais l'avoir qu'une seule fois!
const DATAFILE = 'data/contacts.csv';
$form_datas = array(
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'tel' => ''
);

$errors = array();


if (!empty($_POST)) {

    $form_datas = $_POST;

    //Tester la saisie
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'Le champs est requis*';
    }

    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Le champs est requis*';
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Le champs est requis*';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'adresse n\'est pas au bon format';
    } else {
        foreach ($contacts as $already) {
            if (in_array($_POST['email'], $already, true)) {
                $errors['email'] = 'L\'adresse mail existe déja';
            }
        }
    }

    if (empty($_POST['tel'])) {
        $errors['tel'] = 'Le champs est requis*';
    }

    //Si $errors es vide 
    if (empty($errors)) {
        $file = fopen(DATAFILE, 'a');

        fputcsv($file, $_POST, ';');

        fclose($file);

        header('Location: index.php');
    }
}






//Inclure la vue
include 'add.phtml';
