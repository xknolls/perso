<?php

$vegetables = ['Salade', 'Tomates', 'Carottes'];
$meat = ['Boeuf', 'Poulet'];

$message = '';

/*
Si $_POST n'est pas vide
    Je veux que : 
        -Si l'utilisateur selection boeuf ET carotte j'affiche boeuf aux carottes
        -Si l'utilisateur selection poulet et salade et/ou tomate et/ou carotte j'affichepoulet grillé
        -Sinon j'affiche aller faire les courses 

    Sinon Afficher aler faire les courses 

*/

if (!empty($_POST['meat']) && !empty($_POST['vegetables'])) {
    switch ($_POST['meat']) {
        case 'Boeuf':
            if (in_array('2', $_POST['vegetables'])) {
                $message = 'Boeuf aux carottes';
            } else {
                $message = 'Go faire les courses';
            }
            break;

        case 'Poulet':
            if (in_array('0', $_POST['vegetables'])) {
                $message = 'Poulet grillé';
            } elseif (in_array('1', $_POST['vegetables'])) {
                $message = 'Poulet grillé';
            } else {
                $message = 'Go faire les courses';
            }
            break;
    }
} else {
    $message = 'Remplir les deux champs';
}




include 'form.phtml';
