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

//Ajout de 2 joueurs
$aPlayers[] = 'O';
$aPlayers[] = 'X';

//Effectuer un tour de jeu 
for ($i = 0; $i < 4; $i++) {
    foreach ($aPlayers as $sPlayer) {
        echo $sPlayer . ' à vous de jouer !' . PHP_EOL;

        //Permet de récupérer une saisie utilisateur
        $sResponse = readline('>> Quelle case ? ');
        
        print_r($sResponse . PHP_EOL);

        // Explode : permet de scinder une chaine de caractère en un tableau
        //$aParts = explode(',', $sResponse);
        //$x = $aParts[0];
        //$y = $aParts[1];
        list ($x, $y) = explode(',', $sResponse);


        echo 'X : ' . $x . PHP_EOL;
        echo 'Y : ' . $y . PHP_EOL;

        if (empty(trim($aBoard[$y][$x])) && $x >= 0 && $x < SIZE_X && $y >= 0 && $y < SIZE_X) {
            $aBoard[$y][$x] = $sPlayer;
        } else {
            echo 'Case déja prise ou les coordonées sont invalides' . PHP_EOL;
        }
       

        displayBoard($aBoard);
    }
}




echo '== Fin du programme ==' . PHP_EOL;
