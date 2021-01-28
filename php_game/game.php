<?php
// Affichage des erreurs (et warning)
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '== Début du programe ==' . PHP_EOL . PHP_EOL;

// 1. Créer le plateau de jeu 
// > Tableau à deux dimenssion (tableau de tableau)
// > $aBoard[0][0] = '.';

// Initialisation d'un tableau 5x5
$aBoard = [];

// 1. Initialisation des lignes
// -- Pour toutes les lignes, j'attribue un tableau vide
// for.. 

for ($x = 0; $x < 5; $x++) {
    $aBoard[$x] = [];
    for ($y = 0; $y < 5; $y++) {
        $aBoard[$x][$y] = '.';
    }
}

// 2.Définition de chacun de mes personnages et de leurs stats
$aQuentin = array(
    'name' => 'Quentin',
    'health' => '100',
    'strength' => '50',
);

$aMax = array(
    'name' => 'Omax',
    'health' => '100',
    'strength' => '50',
);

$aAudrey = array(
    'name' => 'Audrey',
    'health' => '70',
    'strength' => '20',
    'magic' => '220',
);

$aMarie = array(
    'name' => 'Marie',
    'health' => '90',
    'strength' => '30',
    'magic' => '180',
);


// Variable permettant de simplifier la gestion des "joueurs"
$aCharacters = array($aMax, $aQuentin, $aAudrey, $aMarie);

// Affichage des différents perso avec leurs stats
foreach ($aCharacters as $Character) {
    echo $Character['name'] . ': [H:' . $Character['health'] . '] [S:' . $Character['strength'] . ']';
    if (isset($Character['magic'])) {
        echo ' [M:' . $Character['magic'] . ']';
    }

    echo PHP_EOL .  PHP_EOL;
}

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


for ($x = 0; $x < 5; $x++) {
    echo PHP_EOL;

    for ($y = 0; $y < 5; $y++) {

        if (is_array($aBoard[$x][$y])) {
            echo '[' . $aBoard[$x][$y]['name'][0] . ']';
            
        } else {
            echo '[' . $aBoard[$x][$y] . ']';
        }
    }
    echo PHP_EOL . PHP_EOL;
}

// Afficher la position des joueurs et verifier que cela correspond


echo '== Fin du programme ==' . PHP_EOL;
