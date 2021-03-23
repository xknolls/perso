<?php
include('_bootstrap.php');
// On essaye de charger le jeu en session (si existant)
$oGame = (isset($_SESSION['game']) ? unserialize($_SESSION['game']) : null);
// On essaye de charger le joueur en session (si existant)
$oPlayer = (isset($_SESSION['player']) ? unserialize($_SESSION['player']) : null);
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
    <div id="new" class="btn btn-primary my-3">Nouvelle partie</div>

    <div class="container">
            
    <div id="player-info" class="player-info">
                <h2><?=$oPlayer->getName();?></h2>
                <div>
                    <p>HP</p>
                    <meter id="life" min="0" max="100" low="33" high="66" optimum="80" value="<?= $oPlayer->getCharacter()->getHealth(); ?>"></meter>
                </div>

                <div>
                    <p>PW</p>
                    <meter id="strenght" min="0" max="100" low="33" high="66" optimum="80" value="<?= $oPlayer->getCharacter()->getStrength(); ?>">
                    </meter>
                </div>

                <?php 
                    if ($oPlayer->getCharacter() instanceof Model\Wizard) :?>
                    <div>
                        <p>Mana</p>
                        <meter id="mana" min="0" max="100" low="33" high="66" optimum="80" value="<?= $oPlayer->getCharacter()->getMagic(); ?>">
                        </meter>
                    </div>
                <?php endif; ?>
            </div>
        <div id="board">
            <?php if ($oGame) : ?>
                <?php include('templates/board.php'); ?>
            <?php endif ?>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        /**
         * refreshBoard
         *
         * @return void
         */
        function refreshBoard(url) {
            $.get(url, function(data) {
                $('#board').html(data);
            })
        }

        function refresh() {
            refreshBoard('api.php?refresh');
        }

        $(document).ready(function() {
            $('#board').on('click', '.cell', function() {
                let x = this.getAttribute('data-x');
                let y = $(this).data('y');
                refreshBoard('api.php?x=' + x + '&y=' + y);
            });

            $('#new').on('click', function() {
                refreshBoard('api.php?new');
            })

            setInterval(refresh, 3000);
        });

        
    </script>
    <script src="js/RpgGame.js"></script>
</body>

</html>