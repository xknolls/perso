<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Auto-chargement des classes
// > on défini une fonction anonyme à appeler en cas d'erreur
spl_autoload_register(function ($sNamespaceClass) {
  //echo '?? '. $sNamespaceClass.PHP_EOL;
  // ex: Model\XXX >> Model/XXX.php
  // ex: Entity\XXX >> Entity/XXX.php
  $sConvertedClass = str_replace('\\', '/', $sNamespaceClass);
  include_once($sConvertedClass . '.php');
});

include_once 'functions.php';

// Permet d'utiliser "MorpionGame" directement au lieu de "Model\MorpionGame"

use Model\AbstractGame;
use Model\MorpionGame;
use Model\ChessGame;
use Entity\Player;

echo '== Début du programme ==' . PHP_EOL;



echo '= Leaderboard =' . PHP_EOL;



foreach (Player::loadAll() as $oPlayer) {
  echo sprintf('[%d] %s', $oPlayer->getScore(), $oPlayer->getName()) . PHP_EOL;
}
echo '= /Leaderboard =' . PHP_EOL;


// 1. Créer un plateau de jeu
$oGame = new ChessGame();

// 2. Afficher le plateau de jeu vide
//displayBoard($oGame->getBoard());
$oGame->displayBoard();

// 3. Créer les joueurs
foreach (ChessGame::TEAMS as $sTeam) {
  $sName = readline('Pseudo ? ');

  $oPlayer = Player::getByName($sName);

  if (!$oPlayer instanceof Player) {
    $oPlayer = new Entity\Player($sName, $sTeam);
  }
  $oPlayer->setTeam($sTeam);
  $oGame->addPlayer($oPlayer);
}

// 4. Effectuer un "tour de jeu"
do {
  echo '== Nouveau tour de jeu ==' . PHP_EOL;
} while ($oGame->playRound());

echo '== Fin du programme ==' . PHP_EOL;
