<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La gestion des dates en PHP</title>
    <meta name="description" content="La fontcion time(), la fonction date()">
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
        <h1>La gestion des dates en PHP</h1>

        <?php
            //Nombre de secondes écoulées depuis le 01/01/1970 (Naissance d'UNIX )
            echo time();

            echo '<p>Nous sommes le ' . date('d,m,Y') . '</p>';
            echo '<p>C\'est le mois de : ' .date('F') . '</p>';
        ?>
        <p>Afficher le mois en français en utilisant une structure switch()</p>

        <?php
            switch(date('m')) {
                case '01' :
                    echo '<p>Janvier</p>';
                break;

                case '02' :
                    echo '<p>Février</p>';
                break;

                case '03' :
                    echo '<p>Mars</p>';
                break;

                case '04' :
                    echo '<p>Avril</p>';
                break;

                case '05' :
                    echo '<p>Mai</p>';
                break;

                case '06' :
                    echo '<p>Juin</p>';
                break;

                case '07' :
                    echo '<p>Juillet</p>';
                break;

                case '08' :
                    echo '<p>Aout</p>';
                break;

                case '09' :
                    echo '<p>Septembre</p>';
                break;

                case '10' :
                    echo '<p>Octobre</p>';
                break;

                case '11' :
                    echo '<p>Novembre</p>';
                break;
                
                case '12' :
                    echo '<p>Décembre</p>';
                break;

            }
            echo 'Il es ' .date('H:i:s'). '<br>';

            //gmdate() est identique à date() sauf que le temps retourné est GTM
            date_default_timezone_set('Europe/Paris');
            echo 'Il es ' . gmdate('H:i:s'). '<br>';

            //strftime - Formate une date/heure local avec la configuration donnée
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            echo strftime('%A %d %B %Y %H:%M:%S') .'<br>';
        ?>

        <aside>
            <h2>Ressources externes</h2>
            <ul>
                <li><a href="https://www.php.net/manual/fr/function.time.php">Time()</a></li>
                <li><a href="https://www.php.net/manual/fr/function.date.php">Date()</a></li>
                <li><a href="https://www.php.net/manual/fr/function.gmdate.php">gmdate()</a></li>
                <li><a href="https://www.php.net/manual/fr/function.strftime.php">strftime()</a></li>
            </ul>
        </aside>
    </main>

    <footer class="footer">
        <p><a href="https://www.gretanet.com/action.php?idAction=3443&refererPage=listing" title="En savoir plus sur la formation">Formation Développeur Développeur WEB - GRETA</a></p>
        <p>&copy; Elève : Quentin POGGI - Module HTML /CSS</p>
        <p>Photos empruntées à <a href="https://www.google.com/imghp%22%3E"> Google images</a></p>
        <a id="goTop" href="#" title="Haut de page">&UpArrow;</a>
    </footer>
</body>
</html>