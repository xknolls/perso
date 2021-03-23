<?php

include('_bootstrap.php');

// On essaye de charger le jeu en session (si existant)
$oGame = (isset($_SESSION['game']) ? unserialize($_SESSION['game']) : null);
// On essaye de charger le joueur en session (si existant)
$oPlayer = (isset($_SESSION['player']) ? unserialize($_SESSION['player']) : null);

if (isset($_GET['new'])) {

    $oPlayer = new Entity\Player('knolls');
    $oCharacter = new Model\Wizard('Hercules');

    // Liaison Player-Character / Character-Player
    $oPlayer->setCharacter($oCharacter);
    $oCharacter->setPlayer($oPlayer);

    // 1. Créer un plateau de jeu
    $oGame = new Model\RpgGame();
    $oGame->addPlayer($oPlayer);
    $oGame->fillBoard();

    // On enregistre le jeu en session
    $_SESSION['game'] = serialize($oGame);
    // On enregistre le jeu en session
    $_SESSION['player'] = serialize($oPlayer);
}

// Test de sécurité
if (!$oGame || !$oPlayer) {
    exit;
}

if (isset($_GET['x']) && isset($_GET['y'])) {
    // 2. Action sur le plateau de jeu
    $aGameInfo = $oGame->selectCell($oPlayer, $_GET['x'], $_GET['y']);
}

if (isset($_GET['refresh'])) {
    $oGame->moveMonster();
}
/* var_dump($aGameInfo);
echo $aGameInfo['current_player']; */
// On enregistre le jeu en session
$_SESSION['game'] = serialize($oGame);
$_SESSION['player'] = serialize($oPlayer);

include('templates/board.php');
exit;