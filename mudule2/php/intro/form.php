<?php

$vegetables = ['Salade','Tomates','Carottes'];
$meat = ['Boeuf','Poulet'];

/*switch($_POST) {
    case 'Boeuf' :
    case $vegetables['2'] :
        echo 'Boeuf aux carottes';
    break;

    case $meat['1'] && $vegetables['0'] :
    case $meat['1'] && $vegetables['0' && '1'] :
    case $meat['1'] && $vegetables['0' && '2'] :
    case $meat['1'] && $vegetables['0' && '1' && '2'] :
    case $meat['1'] && $vegetables['1'] :
    case $meat['1'] && $vegetables['1' && '2'] :
        echo 'Polueeeet';
        break;

    case $meat['1'] :
    case $vegetables['2'] :
        echo 'Poulet aux légumes';
    break;

    default : 
        echo 'Go faire les courses';
}*/

$message = '';



/*
Si $_POST n'est pas vide
    Je veux que : 
        -Si l'utilisateur selection boeuf ET carotte j'affiche boeuf aux carottes
        -Si l'utilisateur selection poulet et salade et/ou tomate et/ou carotte j'affichepoulet grillé
        -Sinon j'affiche aller faire les courses 

    Sinon Afficher aler faire les courses 

*/



if(!empty($_POST['meat']) && !empty($_POST['vegetebles'])) {
} else {
    $message = 'Go faire les courses';
}




include 'form.phtml' ;