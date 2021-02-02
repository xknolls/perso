<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Structure conditionnelles</title>
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
        <h1>Structures conditionnelles</h1>
        <p>ici age= 15</p>
        <?php
            $age = 15;
            //Afficher le texte "tu es majeur" si $age > 18
            if($age >= 18) {
                echo "Tu es majeur <br>";
            }
            else {
                echo "Tu es mineur <br>";
            }

            echo "<p>ici age= 18</p>";

            $age = 18;
            //Si, sinon si, sinon
            if($age > 18) {
                echo "Tu es majeur<br>";
            }
            elseif($age == 18) {
                echo "Trkl fréro t'as juste 18 piges<br>";
            }
            else {
                echo "tu es mineur<br>";
            }

            echo "<p>ici age= 20</p>";

            $age = 20;
            if($age < 18) {
                echo "Tu es mineurr<br>";
            }
            elseif($age == 18) {
                echo "Trkl fréro t'as juste 18 piges<br>";
            }
            elseif($age >= 21) {
                echo "Tu as la majorité international<br>";
            }
            else {
                echo "tu es majeur<br>";
            }

            echo "<p>ici age= 21</p>";

            $age = 21;
            if($age < 18) {
                echo "Tu es mineurr<br>";
            }
            elseif($age == 18) {
                echo "Trkl fréro t'as juste 18 piges<br>";
            }
            elseif($age >= 21) {
                echo "Tu as la majorité international<br>";
            }
            else {
                echo "tu es majeur<br>";
            }
        ?>
        
        <h2>Autres structures de bloc</h2>
        <?php
            if($age < 18) :
                echo 'Tu es mineur <br>';
            elseif($age == 18) :
                echo "Trkl fréro t'as juste 18 piges<br>";
            else :
                echo 'Tu es majeur';
            endif;
        ?>

        <h2>Combiner les testes au sein d'une page HTML</h2>
        <?php if($age < 18) : ?>
            <p>Tu es mineur</p>
        <?php else :?>
            <p>Tu es majeur</p>
        <?php endif ?>

        <h2>Conditions multiples</h2>
        <?php
            $holidays = true;
            $age = 16;
            
            /*
                Si age => 18
                    afficher : Tu peux sortir
                Sinon si < 18 et holidays == true
                    afficher : Tu as la permission de sortir 
                Sinon 
                    afficher : Tu reste à la maison
            */

            if($age >= 18) {
                echo 'Tu peux sortir<br>';
            }
            elseif(
                $age < 18
                AND $holidays == true       //AND s'écrit aussi '&&' et avec les boléens inutile de comparer
            ) {
                echo 'Tu peux sortir c\'est les vacances<br>';
            } 
            else {
                echo 'Tu reste à la maison<br>';
            }
                    //demonstration du commentaire 
            if($age >= 18) {
                echo 'Tu peux sortir<br>';
            }
            elseif(
                $age < 18
                && $holidays       //AND s'écrit aussi '&&' et avec les boléens inutile de comparer
            ) {
                echo 'Tu peux sortir c\'est les vacances<br>';
            } 
            else {
                echo 'Tu reste à la maison<br>';
            }

            //si tu es mineur et que ce n'est pas la vacances : pas sortir

            $holidays = false;

            if(
                $age < 18
                // &&holidays != true
                && !$holidays
            ) {
                echo 'Tu reste à la maison';
            }

            //si tu es majeur ou que c'est les vecances tu peux sortir

            if(
                $age >= 18
                //OR holidays
                || $holidays
            ) {
                echo 'Tu peux sortir';
            }



                
            
        ?>

        <h2>Le switch</h2>
        <p>Séries de teste pour comparer la valeur d'une variable</p>
        <h3>Avec if</h3>
        <?php
            //En fonction de la valeur de $vegetables, afficher un plat correspondant 
            $vegetables = 'salade';

            if(
                $vegetables == 'tomate'
                OR $vegetables == 'salade'
                ) {
                    echo '<p>Salade composée</p>';
            }
            elseif($vegetables == 'endive') {
                echo '<p>Endives au jambon</p>';
            }
            elseif($vegetables == 'épinard') {
                echo '<p>Grattin d\'épinard</p>';
            }
            else {
                echo 'McDO';
            }


            ?>
            <h3>Avec switch</h3>
            <?php
            ///Utiliser une structure switch 
            switch($vegetables) {
                case 'tomate' :
                case 'salade' :
                    echo '<p>Salade composée</p>';
                break;

                case 'épinard' :
                    echo '<p>Grattin d\épinard</p>';
                break;

                case 'endive' :
                    echo '<p>Endives au jambon</p>';
                break;
                
                default:
                    echo 'McDO';


            }
        ?>

    </main>
    <footer class="footer">
        <p><a href="https://www.gretanet.com/action.php?idAction=3443&refererPage=listing" title="En savoir plus sur la formation">Formation Développeur Développeur WEB - GRETA</a></p>
        <p>&copy; Elève : Quentin POGGI - Module HTML /CSS</p>
        <p>Photos empruntées à <a href="https://www.google.com/imghp%22%3E"> Google images</a></p>
        <a id="goTop" href="#" title="Haut de page">&UpArrow;</a>
    </footer>
</body>
</html>