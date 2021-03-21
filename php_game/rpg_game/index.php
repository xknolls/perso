<?php
// Gestion (et démarrage) des sessions PHP
session_start();


use Model\RpgGame;

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

// On essaye de charger le jeu en session (si existant)
$oGame = (isset($_SESSION['game'])? unserialize($_SESSION['game']) : null) ;
// On essaye de charger le joueur en session (si existant)
$oPlayer = (isset($_SESSION['player'])? unserialize($_SESSION['player']) : null) ;

$oIa = (isset($_SESSION['ia'])? unserialize($_SESSION['ia']) : null) ;



if (isset($_GET['new'])) {

    $oPlayer = new Entity\Player('knolls');
    $oCharacter = new Model\Warrior('Hercules');
    $oIa = new Entity\Player('zombie');
    $oIaCharacter = new Model\Monster('monster');
    
    // Liaison Player-Character / Character-Player
    $oPlayer->setCharacter($oCharacter);
    $oCharacter->setPlayer($oPlayer);
    $oIa->setCharacter($oIaCharacter);
    $oIaCharacter->setPlayer($oIa);

    // 1. Créer un plateau de jeu
    $oGame = new Model\RpgGame();
    $oGame->addPlayer($oPlayer);
    $oGame->addPlayer($oIa);
    $oGame->fillBoard();


    // On enregistre le jeu en session
    $_SESSION['game'] = serialize($oGame);
    // On enregistre le jeu en session
    $_SESSION['player'] = serialize($oPlayer);

    $_SESSION['ia'] = serialize($oIa);
    header('Location:index.php');
}

$aGameInfo = [];

if ($oGame){
    if (isset($_GET['x']) && isset($_GET['y'])) {
        // 2. Action sur le plateau de jeu
        $aGameInfo = $oGame->selectCell($oPlayer,$_GET['x'], $_GET['y']);
    }

    /* var_dump($aGameInfo);
    echo $aGameInfo['current_player']; */
    // On enregistre le jeu en session
    $_SESSION['game'] = serialize($oGame);
    $_SESSION['player'] = serialize($oPlayer);
    $_SESSION['ia'] = serialize($oIa);
    


    if (isset($_GET['x']) && isset($_GET['y'])) {
        include ('templates/board.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="./styles.css" rel="stylesheet">
    <title>RpgGame!</title>
</head>

<body class="text-center">
    <h1>RpgGame !!</h1>

    <a href="?new" class="btn btn-primary my-3">Nouvelle partie</a>

    

    <div class="container">
        <?php if ($oGame) : ?>
            <div id="board">
                <?php include('templates/board.php'); ?>
            </div>
        <?php endif ?>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        
        $('#board').on('click', '.cell',function() {
            let x = this.getAttribute('data-x');

            let y = $(this).data('y');

            // TODO : Communiquer avec le jeu
            // window.location = '?x=' + x + '&y=' + y;

            $.get('index.php?x=' + x + '&y=' + y, function(data, status){

                /* let board = document.getElementById('board');
                board.innerHTML = data; */

                $('#board').html(data);
            });

        });
    </script>
    <script src="js/RpgGame.js"></script>

</body>

</html>