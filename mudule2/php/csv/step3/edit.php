<?php

include 'models/models.php';

//var_dump($_GET['index']);

/**
 * ouvrire le fichier CSV en lecture et ecriture 
 * Récuperer la ligne qui correspondant à l'index
 * Afficher dans un  formulaire le contact avec les valeurs correspondante
 * Validation modifie la ligne du tableau et la met à jour 
 *  Si le formulaire est posté
 *      Tester les champs saisie
 *      Si erreur representer le formulaire et afficher un message 
 *      Sinonmodifier la ligne selectionné 
 * 
 * Fermer le fichier 
 * Revenir sur l'index 
 */



$contacts = load_contact(DATAFILE);

$error = array();


if (empty($_POST)) {

    $contact = $contacts[$_GET['index']];
    $index = $_GET['index'];
} elseif (!empty($_POST)) {

    $index = $_POST['index'];
    $contact = $contacts[$index];

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
}

//var_dump($contacts);

var_dump($contact);

include 'edit.phtml';
