<?php
// Gestion et démaraage de la session

use Entity\Player;
use Model\Chess\Rook;
use Model\Pawn;

session_start();

// Affichage des erreurs PHP (à ne pas faire en production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($sNamespaceClass) {
    $sConvertedClass = str_replace('\\', '/', $sNamespaceClass);
    include_once($sConvertedClass . '.php');
});
$oGame = isset($_SESSION['game']) ? unserialize($_SESSION['game']) : null;

// On essaie de charger le jeu en session (si existant)
if (isset($_GET['new'])) {
    // 1. Créer un plateau de jeu
    $oGame = new Model\ChessGame();
    foreach (Model\ChessGame::TEAMS as $sTeam) {
        $oGame->addPlayer(new Entity\Player($sTeam, $sTeam));
    }
    $oGame->fillBoard();

    // on enregistre le jeu en session 
    $_SESSION['game'] = serialize($oGame);
}

$aGameInfos = [];

if ($oGame) {
    if (isset($_GET['x']) && isset($_GET['y'])) {
        // 2. Action sur le plateau de jeu 
        $aGameInfos = $oGame->selectCell($_GET['x'], $_GET['y']);
    }
    $_SESSION['game'] = serialize($oGame);

    if (isset($_GET['x']) && isset($_GET['y'])) {
        include('templates/board.php');
        exit();
    }
}


?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>ChessGame</title>
</head>

<body class="text-center">
    <h1>ChessGame</h1>

    <a href="?new" class="btn btn-primary my-3">Nouvelle partie</a>

    

    <div class="container">
        <?php if ($oGame) : ?>
            <div id="board">
                <?php include('templates/board.php') ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        console.log($(document));
        console.log($('body'));
        console.log($('div'));
        $('.cell').css({
            'color': '#001eff '
        });

        // aq. de addEventListener
        $('#board').on('click', '.cell', function() {
            // this = objet courant JavaScript
            // $(this) = encapsulation jQuery de l'objet courant

            //let x = this.getAttribute('data-x');
            //let y = this.getAttribute('data-y'); 
            let x = $(this).data('x');
            let y = $(this).data('y');
            console.log(x + ',' + y);
            console.log($(this));

            // Communiquer avec le jeu (index.php?x=?&y=?)
            // window.location = '?x=' + x + '&y=' + y;

            // Ajax - Requête GET
            $.get('index.php?x=' + x + '&y=' + y, function(data, status) {
                console.log(status);
                console.log(data);

                //let board = document.getElementById('board');
                //board.innerHTML = data;

                $('#board').html(data);
            });
        });
    </script>
</body>

</html>