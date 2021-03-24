<?php
include('_bootstrap.php');

// On récupère le jeu en session (si existant)
$oGame = isset($_SESSION['game']) ? unserialize($_SESSION['game']) : null;
// On récupère le joueur en session (si existant)
$oPlayer = isset($_SESSION['player']) ? unserialize($_SESSION['player']) : null;

if (isset($_GET['new'])) {
    $oPlayer = new Entity\Player('knolls');
    $oCharacter = new Model\Warrior('je sais pas');

    // Liasion Player-Character / Character-Player
    $oPlayer->setCharacter($oCharacter->setPlayer($oPlayer));

    // Créer un plateau de jeu
    $oGame = new Model\RpgGame();
    $oGame->addPlayer($oPlayer);
    $oGame->fillBoard();

    // On enregistre le jeu en session
    $_SESSION['game'] = serialize($oGame);

    // On enregistre le joueur en session
    $_SESSION['player'] = serialize($oPlayer);
}

if(!$oGame || !$oPlayer) {
    exit;
}

$aGameInfo = [];
//action spéciale : clic sur une case
if (isset($_GET['x']) && isset($_GET['y'])) {
    $aGameInfo = $oGame->selectCell($oPlayer, $_GET['x'], $_GET['y']);
}
//action spéciale : refresh automatique
elseif (isset($_GET['refresh'])) {
    $oGame->lifeTime();
}

// On enregistre le jeu "modifié" en session
$_SESSION['game'] = serialize($oGame);
$_SESSION['player'] = serialize($oPlayer);

include('templates/board.php');
exit();