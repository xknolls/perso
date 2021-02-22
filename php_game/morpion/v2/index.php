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
do {
    foreach ($aPlayers as $sPlayer) {
        echo $sPlayer . ' à vous de jouer !' . PHP_EOL;

        do {
            //Permet de récupérer une saisie utilisateur
            $sResponse = readline('>> Quelle case ? ') . PHP_EOL;



            // Explode : permet de scinder une chaine de caractère en un tableau
            //$aParts = explode(',', $sResponse);
            //$x = $aParts[0];
            //$y = $aParts[1];
            list($x, $y) = explode(',', $sResponse);

            $bReplay = !empty(trim($aBoard[$y][$x])) && !testValue($x, $y);

            if ($bReplay) {
                echo 'Case déja prise ou les coordonées sont invalides' . PHP_EOL;
            }
        } while ($bReplay);

        $aBoard[$y][$x] = $sPlayer;

        displayBoard($aBoard);

        $bEndGame = endGame($aBoard);

        if ($bEndGame) {
            break;
        }
    }
} while (!$bEndGame);


echo '== Fin du programme ==' . PHP_EOL;
