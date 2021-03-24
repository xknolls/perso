<?php
include('_bootstrap.php');

// On récupère le jeu en session (si existant)
$oGame = isset($_SESSION['game']) ? unserialize($_SESSION['game']) : null;
// On récupère le joueur en session (si existant)
$oPlayer = isset($_SESSION['player']) ? unserialize($_SESSION['player']) : null;
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css" />

    <title>RpgGame</title>
  </head>
  <body class="text-center">
    <h1>RpgGame</h1>

    <div id="NewGame" class="btn btn-primary my-3">Nouvelle partie</div><br />
    
    <div class="container">
        <?php if ($oGame): ?>
            <div id="board">
                <?php include('templates/board.php'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function refreshBoard(url) {
            $.get(url, function(data, status) {
                $('#board').html(data);
            });
        }

        $(document).ready(function() {
            // Live event : on écoute le "click" tous les élements ".cell" contenus dans #board
            $('#board').on('click', '.cell', function() {
                // this = objet courant (Javascript)
                // $(this) = encapsulation jQuery de l'objet courant
                
                let x = $(this).data('x');
                let y = $(this).data('y');

                // AJAX - Requête GET (permet de mettre à jour une partie de la page)
                refreshBoard('api.php?x='+ x + '&y='+ y);
            });
            
            setInterval(function () {
                refreshBoard('api.php?refresh');
            }, 30000);

            function newGame() {
                refreshBoard('api.php?new');
            }

            document.querySelector('#NewGame').addEventListener('click', newGame);
        });

    
    </script>
	<script src="js/rpg_game.js"></script>
  </body>
</html>
