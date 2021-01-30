<?php
// Affichage des erreurs (et warning)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'functions.php';

define('SIZE_X', 5);
define('SIZE_Y', 5);

echo '== Début du programe ==' . PHP_EOL . PHP_EOL;

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
    'name' => 'Gusto ',
    'health' => '100',
    'strength' => '50',
);

$aMax = array(
    'name' => 'Omax  ',
    'health' => '100',
    'strength' => '50',
);

$aAudrey = array(
    'name' => 'Blue  ',
    'health' => '70',
    'strength' => '20',
    'magic' => '220',
);

$aMarie = array(
    'name' => 'Blondie',
    'health' => '90',
    'strength' => '30',
    'magic' => '180',
);


// Variable permettant de simplifier la gestion des "joueurs"
$aCharacters = array($aMax, $aQuentin, $aAudrey, $aMarie);

// Affichage des différents perso avec leurs stats
/*foreach ($aCharacters as $Character) {
    echo $Character['name'] . ': [H:' . $Character['health'] . '] [S:' . $Character['strength'] . ']';
    if (isset($Character['magic'])) {
        echo ' [M:' . $Character['magic'] . ']';
    }

    echo PHP_EOL .  PHP_EOL;
}*/

display_players($aCharacters);

// 3.positionner les joueurs (aléatoirement) dans le plateau
foreach ($aCharacters as $Character) {
    $aBoard[rand(0, 4)][rand(0, 4)] = $Character;
}



// 4. Afficher le plateau de jeu proporement 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 
// [.] [.] [.] [.] [.] 


display_board($aBoard);


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



// Afficher la position des joueurs et verifier que cela correspond


echo '== Fin du programme ==' . PHP_EOL;
