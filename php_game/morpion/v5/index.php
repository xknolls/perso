<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'functions.php';
include_once  'model/Player.php';
include_once  'model/Game.php';


echo '== Début du programme ==' . PHP_EOL;

// 1. Créer un plateau de jeu 3x3
$oGame = new Game();

// 2. Afficher le plateau de jeu vide
$oGame->displayBoard();

// 3. Créer un tableau de joueurs et ajouter 2 joueurs
foreach (Game::PAWNS as $Pawn) {
  $name = readline('>> Nom du joueur ');
  $oGame->addPlayer(new Player($name, $Pawn));
}

// 4. Effectuer un "tour de jeu"
do {
  foreach ($oGame->getPlayers() as $oPlayer) {
    echo $oPlayer . ' à vous de jouer !' . PHP_EOL;

    do {
      // Obtenir les coordonnées saisies désirées par le joueur
      $sResponse = readline('>> Quelle case ? ');
      list($x, $y) = explode(',',  $sResponse);

      // On teste si la case est vide ET si les coordonnées sont valides
      $bReplay = !$oGame->isValidXY($y, $y) || !$oGame->isEmptyXY($x, $y);
      if ($bReplay) {
        echo 'Case déjà prise OU coordonnées invalides' . PHP_EOL;
      }
      // Condition de "reboucle" : pas valide ou pas vide
    } while ($bReplay);

    // On assigne le joueur/pion dans la case
    $oGame->setXY($x, $y, $oPlayer);

    // Affichage plateau après que le joueur est joué
    $oGame->displayBoard();

    // Il faut appeler isWin après le tour de chaque joueur pour arrêter la partie directement en cas de victoire
    $bWin = $oGame->isWin();
    if ($bWin) {
      break;
    }
  }
} while (!$bWin);

echo '== Fin du programme ==' . PHP_EOL;
