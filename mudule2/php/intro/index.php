<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premiers pas en PHP</title>
    <meta name="description" content="Affichage de texte et concaténation">
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
        <h1>Itroduction à PHP</h1>
        
        <h2>Afficher du texte</h2>
        <?php
            echo 'Du texte affiché avec echo de php<br>';
            echo "<p>La même chose</p>";
            print "Avec l'instruction print<br>";
            echo 'Je m\'apelle "quentin"'
        ?>
        
        <h2>Les variables</h2>     
        <?php
            $pseudo = 'quentin';            
            echo "Je m'apelle $pseudo";
            echo $existepas;
            //Afficher dles informations d'une variable
            var_dump($pseudo);
            echo 'Je m\'apelle $pseudo';
        ?>

        <h3>Concaténation</h3>
        <?php
            echo 'Je m\'apelle ' .$pseudo;
        ?>

        <img src="" alt="">
        
        <?php
            $src = 'img/alicia_720.png';
            $alt = 'Juste la bosse enfaite';
            echo '<img src="' .$src. '" alt="' .$alt. '" width="200"';
        ?>

        <h4>Eviter la concaténation</h4>
        <?php
            // En utilisant les simples quottes pour les attrbbuts HTML 
            echo "<img src='$src' alt='$alt' width='200'>";
        ?>

        <img src="<?php echo $src ?>" alt="<?php echo $alt ?>" width="200">

        <p>Raccourci pour <strong>afficher</strong> une variable</p>
        <img src="<?= $src ?>" alt="<?= $alt ?>" width="200">

    </main>
    <footer class="footer">
        <p><a href="https://www.gretanet.com/action.php?idAction=3443&refererPage=listing" title="En savoir plus sur la formation">Formation Développeur Développeur WEB - GRETA</a></p>
        <p>&copy; Elève : Quentin POGGI - Module HTML /CSS</p>
        <p>Photos empruntées à <a href="https://www.google.com/imghp%22%3E"> Google images</a></p>
        <a id="goTop" href="#" title="Haut de page">&UpArrow;</a>
    </footer>
</body>
</html>