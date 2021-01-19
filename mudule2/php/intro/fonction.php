<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctions PHP</title>
    <meta name="description" content="Les fonctions : créer une fonction, les paramètres, la valeur de retour, sortir d'une fonction">
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
        <h1>Les fonctions</h1>

        <?php 
            //Créeation d'une fonction hello() et que affiche 'Bonjour tout le monde'


            //Création de la fonction
            function hello() {
                date_default_timezone_set('Europe/Paris');
                setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                echo 'Bonjour tout le monde !<br><br>';
                echo 'Nous somme le ' . strftime('%A %d %B %Y %H:%M:%S') . '<br><br>' ;
            }

            //Execution de la fonction (il faut l'appeler)
            hello();
            //Executable autant de fois que l'on en as besoin
            hello();

            //Fonction avec un paramètre : création d'une fonction qui dit : Bonjour à quelqu'un : bonjour(Le prénom de qulqu'un);


            //Création de la fonction --- $firstname attend une valeur
            function bonjour($firstname) {
                echo'Bonjour ' .$firstname . '<br><br>';
            }

            //Execution de la fonction
            bonjour('Tatie huguette');

            $pseudo = 'Tati Huguette';

            bonjour($pseudo);

            function bonjour2($pseudo) {
                echo 'Bonjour ' . $pseudo . '<br><br>';
            }

            bonjour2('machinchose');

            bonjour2($pseudo);


            //Passer à plusieurs paramètres 
            //Créer une fonction hello2($speudo, $timezone)

            function hello2($pseudo,$timezone) {
                date_default_timezone_set($timezone);
                setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                echo "Bonjour $pseudo ! <br><br>" ;
                echo 'Nous somme le ' . strftime('%A %d %B %Y %H:%M:%S') . '<br><br>' ;
            }

            hello2('Madame', 'Europe/Paris');
            hello2('Monssieur', 'America/Los_Angeles');

            ///Valeur de retour 
            function carre($num) {
                //Les variable déclaré dans une fonction sont local
                //$result = $num * $num;
                return $num * $num;
                //Return met fin à la fonction
            }
            
            //Récupérer le résultat d'une fonction : créer une variable dans la quelle on stocke notre fonction 
            $result = carre(4);
            echo $result . '<br><br>';

            //Ducoup on peut réutiliser la variable 
            echo $result + 3 . '<br><br>';


            function calcul($a,$b) {
                if ($a > $b){
                    $carre = carre($a) + carre($b);
                    return carre($carre);
                }
            }

            echo calcul(4,2) . '<br><br>';

            function calcul2($a,$b){
                if($a <= $b) {
                    return;
                }

                $carre = carre($a) + carre($b);
                return carre($carre);
            }

            echo calcul2(4,2) . '<br><br>';




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