<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable tableau</title>
    <meta name="description" content="Stocker plusieurs valeurs dans une même variable, faire des boucles">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="banner">
        <a href="site-logo" href="./">PHP</a>
        <p class="site-description">Description du TP</p>
        <?php include'include/menu.php'; ?>
    </header>
    <main>
        <h1>Variable Tableau/Array</h1>
        <?php
            //Stocker le prénom de chaque stagiaire dansune variable
            
            $greta2021 = ['Véro','Quentin','Fils de pute','Jenny','Déborah','Renaud','Loïc','Brahim','Léo','Christopher'];

            echo '<p>My name is ' .$greta2021[1]. '<p>';

            var_dump($greta2021);
        ?>
        <?php
            echo '<p> La session compte ' . count($greta2021) . ' stagiaires</p>';
        ?>
        <ol>
            <?php for($compteur = 0; $compteur < 10; $compteur++ ) : ?>
            <li><?= $greta2021[$compteur]?></li>
            <?php endfor; ?>
        </ol>

        <?php 
            //Utiliser une seule variable pour stocker les informations d'une photo
            $picture = [];
            $picture[] = 'img/alicia_720.png';
            $picture[] = 'Juste la bosse enfaite';
        ?>
        <img src="<?= $picture[0] ?>" alt="<?= $picture[1] ?>" width="200">
        

        <h2>Tableau associatif</h2>
        <?php
            //Vider un tableau
            $picture = [];
            $picture = [
                'src' => 'img/alicia_720.png',
                'alt' => 'Jusqte la bosse enfait'
            ];

            var_dump ($picture);
        ?>
        <img src="<?= $picture['src'] ?>" alt="<?= $picture['alt'] ?>" width="200">


    </main>
    <footer class="footer">
        <p><a href="https://www.gretanet.com/action.php?idAction=3443&refererPage=listing" title="En savoir plus sur la formation">Formation Développeur Développeur WEB - GRETA</a></p>
        <p>&copy; Elève : Quentin POGGI - Module HTML /CSS</p>
        <p>Photos empruntées à <a href="https://www.google.com/imghp%22%3E"> Google images</a></p>
        <a id="goTop" href="#" title="Haut de page">&UpArrow;</a>
    </footer>
</body>
</html>