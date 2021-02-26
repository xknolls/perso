<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(
  function($NamespaceClass){
    echo '??' . $NamespaceClass.PHP_EOL;
    $sConvert = str_replace('\\', "/", $NamespaceClass);
    $sFilepath = $sConvert.'.php';
    include_once($sFilepath);
  }
);

use Model\MorpionGame;
use Entity\Player;

echo '== Début du programme ==' . PHP_EOL;

// 1. Créer un plateau de jeu 3x3
$oGame = new MorpionGame();

// 2. Afficher le plateau de jeu vide
$oGame->displayBoard();

// 3. Créer un tableau de joueurs et ajouter 2 joueurs
foreach (MorpionGame::PAWNS as $Pawn) {
  $name = readline('>> Nom du joueur ');
  $oGame->addPlayer(new Player($name, $Pawn));
}

// 4. Effectuer un "tour de jeu"
do {
  echo PHP_EOL . '== Nouveau tour de jeu ==' . PHP_EOL . PHP_EOL;
} while ($oGame->playRound());

echo '== Fin du programme ==' . PHP_EOL;
