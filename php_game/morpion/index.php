<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('functions.php');

define('SIZE_X', 3);
define('SIZE_Y', 3);


echo  PHP_EOL . '== Début du programe ==' . PHP_EOL . PHP_EOL;

// Création du tableau
$aBoard = createBoard();
echo PHP_EOL;

//Affichage du tableau vide
displayBoard($aBoard);

//Création d'un tableau
$aPlayers = [];

//Ajout 2 joueurs
$aPlayers[] = 'player 1';
$aPlayers[] = 'player 2'; 

//Effectuer un tour de jeu 
foreach ($aPlayers as $sPlayer) {
    echo $sPlayer . ' à vous de jouer !' . PHP_EOL;
    readline('>> Quelle case ? ');
    print_r($sResponse, PHP_EOL);
}







echo '== Fin du programme ==' . PHP_EOL;