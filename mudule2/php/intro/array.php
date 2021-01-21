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
        <?php include 'include/menu.php'; ?>
    </header>
    <main>
        <h1>Variable Tableau/Array</h1>
        <?php
        //Stocker le prénom de chaque stagiaire dansune variable

        $greta2021 = ['Véro', 'Quentin', 'Fils de pute', 'Jenny', 'Déborah', 'Renaud', 'Loïc', 'Brahim', 'Léo', 'Christopher'];

        echo '<p>My name is ' . $greta2021[1] . '<p>';

        var_dump($greta2021);
        ?>
        <?php
        echo '<p> La session compte ' . count($greta2021) . ' stagiaires</p>';
        ?>
        <ol>
            <?php for ($compteur = 0; $compteur < 10; $compteur++) : ?>
                <li><?= $greta2021[$compteur] ?></li>
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

        var_dump($picture);
        ?>
        <img src="<?= $picture['src'] ?>" alt="<?= $picture['alt'] ?>" width="200">

        <h2>Tableau à 2 dimensions : liste de factures</h2>
        <?php
        // 2équivalent à : $invoices = [];
        $invoices = array();


        //Tableau repésantant une seule facture 
        $invoices = [
            'number' => '40',
            'customer' => 'Tante Ursule',
            'date' => '11-01-2020',
            'amount' => '500',
        ];

        echo $invoices['amount'];

        //Pluieurs factures dans une même varible
        $invoices = [
            [
                'number' => '40',
                'customer' => 'Tante Ursule',
                'date' => '11-01-2020',
                'amount' => '500'
            ],
            [
                'number' => '41',
                'customer' => 'Tante Agathe',
                'date' => '12-01-2020',
                'amount' => '800.50'
            ],
        ];

        var_dump($invoices)
        ?>

        <table>
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($compteur = 0; $compteur < count($invoices); $compteur++) : ?>
                    <tr>
                        <td><?php echo $invoices[$compteur]['number'] ?> </td>
                        <td><?php echo $invoices[$compteur]['date'] ?></td>
                        <td><?php echo $invoices[$compteur]['customer'] ?></td>
                        <td><?php echo $invoices[$compteur]['amount'] ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <h2>La boucle foreach</h2>
        <?php

        $invoices = [
            [
                'number' => '40',
                'customer' => 'Tante Ursule',
                'date' => '11-01-2020',
                'amount' => '500'
            ],
            [
                'number' => '41',
                'customer' => 'Tante Agathe',
                'date' => '12-01-2020',
                'amount' => '800.50'
            ],
        ];

        /*Pour chaque ligne du tableau $invoices
            L'indice est stockée dans $key 
            La valeur de la ligne(le 2eme taleau) est stocké dans $value
            */


        foreach ($invoices as $key => $value) {
            echo $key . '<br>';
            var_dump($value);
            //Equivalent à : $invoices[$compteur]['customer] de la boucle for
            echo $value['customer'] . '<br>';
        }

        /*Pour chaque ligne du tableau $invoices
            La valeur (donc, les données d'une facture) est stockée dans $invoices 

            Caculer 
                le montant de la TVA (20%)
                le montant TTC
            Puis afficher 
                TVA : montant de la TVA 
                TTC : montant TTC
            */

        /*foreach ($invoices as $invoice) {
                echo $invoice['amount']. '<br>';
            }*/

        foreach ($invoices as $invoice) {
            echo 'TVA : ' . $invoice['amount'] * 0.2 . '<br>';
            echo 'TTC : ' . $invoice['amount'] * 1.2 . '<br>';
        }

        ?>

        <table>
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>HT</th>
                    <th>TVA</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice) : ?>
                    <tr>
                        <td><?= $invoice['number'] ?></td>
                        <td><?= $invoice['customer'] ?></td>
                        <td><?= $invoice['date'] ?></td>
                        <td><?= $invoice['amount'] ?></td>
                        <td><?= $invoice['amount'] * 0.2 ?></td>
                        <td><?= $invoice['amount'] * 1.2 ?></td>
                    <?php endforeach; ?>
                    </tr>
            </tbody>
        </table>

        <h2>Trier les valeurs</h2>

        <?php
            $input = ['w','a','c','f','e'] ;

            var_dump($input);
            //Trie les valeurs dans le tableau
            sort($input);   
            var_dump($input);
        ?>

        <h2>Supprimer une ligne dans un tableau</h2>

        <?php 
            //Supprimer la ligne dont la clé est 0
            unset( $input[3]);
            //Problème : Les clés restantes sont conserver et mais pas celle supprimer
            var_dump($input);
            //retourner ttes les valeurs dans un vouveau tableau : les clés sont recréer dans le nouveau tableau

            $input2 = array_values($input);
            var_dump($input2);
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