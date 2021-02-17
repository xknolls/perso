<?php
// Affichage des erreurs (et warning)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'functions.php';

define('TYPE_WARRIOR', [
    'name' => 'Warrior',
    'min_health' => 150,
    'max_health' => 300,
    'min_strength' => 150,
    'max_strength' => 250,
]);
define('TYPE_WIZARD', [
    'name' => 'Wizard',
    'min_health' => 100,
    'max_health' => 200,
    'min_strength' => 50,
    'max_strength' => 100,
    'min_magic' => 150,
    'max_magic' => 200,
]);


define('SIZE_X', 5);
define('SIZE_Y', 5);

echo  PHP_EOL . '== Début du programe ==' . PHP_EOL . PHP_EOL;

// 1. Créer le plateau de jeu 
// > Tableau à deux dimenssion (tableau de tableau)
// > $aBoard[0][0] = '.';

// Initialisation d'un tableau 5x5
$aBoard = [];

// 1. Initialisation des lignes
// -- Pour toutes les lignes, j'attribue un tableau vide
// for.. 

    for ($y = 0; $y < SIZE_Y; $y++) {
        $aBoard[$y] = [];
        for ($x = 0; $x < SIZE_X; $x++) {
            $aBoard[$y][$x] = $x . ';' . $y;
        }
    }

// 2.Définition de chacun de mes personnages et de leurs stats
    $aQuentin = array(
        'type' => TYPE_WARRIOR,
        'name' => 'Gusto',
        'position' => ['x' => null, 'y'=> null]
    );
    //buildCaracteristics($aQuentin);

    $aMax = array(
        'type' => TYPE_WARRIOR,
        'name' => 'Omax',
        'position' => ['x' => null, 'y'=> null]
    );
    //buildCaracteristics($aMax);

    $aAudrey = array(
        'type' => TYPE_WIZARD,
        'name' => 'Blue',
        'position' => ['x' => null, 'y'=> null]
    );
    //buildCaracteristics($aAudrey);

    $aMarie = array(
        'type' => TYPE_WIZARD,
        'name' => 'Blondie',
        'position' => ['x' => null, 'y'=> null]
    );
    //buildCaracteristics($aMarie);


// Variable permettant de simplifier la gestion des "joueurs"
    $aCharacters = array($aMax, $aQuentin, $aAudrey, $aMarie);


// Remplissage des caracteristiques d'un seul coup 
// Il faut encore passer par la variable de référence
    foreach ($aCharacters as &$characters) {
        buildCaracteristics($characters);
    }


// 3.positionner les joueurs (aléatoirement) dans le plateau
    foreach ($aCharacters as $character) {
        $aBoard[$character['position']['y']][$character['position']['x']] = $character;
    }



// 4. Afficher le plateau de jeu proporement 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 


display_board($aBoard);

//Affichage de la position des joueurs 
    for ($y = 0; $y < SIZE_Y; $y++) {

        for ($x = 0; $x < SIZE_X; $x++) {
            if (is_array($aBoard[$y][$x])) {
                echo $aBoard[$y][$x]['name'];
                echo ' [' . $x . ';' . $y . ']';
                echo PHP_EOL . PHP_EOL;
            }
        }
    }
    echo PHP_EOL;

display_players($aCharacters);

echo '== Fin du programme ==' . PHP_EOL;
