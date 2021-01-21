<?php
//Traitement du formulaire permettant de supprimer les contacts selectionés
var_dump($_POST);

const DATAFILE = 'data/contacts.csv';


/*
    Si on veut supprimer une ligne dans un tableau

    Si le formulaire a été posté et que des valeurs sont à supprimer
    Alors : 
        Charger les contactes stockées dans le fichier dans un tableau
        Pour chaque ligne du tableau de contacts
            Si son index se trouve dans les indexs à supprimer :
            Alors : 
                Supprimer la ligne correspondant à cet index dans le tableau des conacts
            Si le fichier CSV est accessible en écriture
            Alors :
                Ouvrir le fichier csv en ecriture en placant le pointeur au debut et en réduisant le fichier à 0 pour le ré-écrire
                Tant qu'il y a des lignes dans le tableau de contacts restants 
                    Insérer la ligne dans le fichier CSV
                Fermer le fichier
            Rediriger vers l'index

    Si on ne veut pas supprimer une ligne dans le tableau
*/
if (!array_key_exists('todelete', $_POST) == true) {
    header('location: index.php');
}
$contacts = array();

if (is_readable(DATAFILE)) {
    $file = fopen(DATAFILE, 'r');

    while ($data = fgetcsv($file, 0, ';')) {
        array_push($contacts, $data);
    }

    fclose($file);
}

foreach ($contacts as $key => $value) {
    if (in_array($key, $_POST['todelete'])) {
        unset($contacts[$key]);
    }
}
$file = fopen(DATAFILE, 'w+');

foreach ($contacts as $line) {
    fputcsv($file, $line, ';');
}

fclose($file);

header('Location: index.php');









/*
    Si le formulaire a été posté et que des valeurs sont à supprimer
    Alors : 
        Créer un nouveau tableau : new_contacts
        Charger les contactes stockées dans le fichier dans un tableau contacts
        Pour chaque ligne du tableau de contacts
            Si son index ne se trouve pas dans les index à supprimer
                Ajouter la ligne dans le tableau new_contacts
    Si le fichier CSV est accessible en écriture
            Alors :
                Ouvrir le fichier csv en ecriture en placant le pointeur au debut et en réduisant le fichier à 0 pour le ré-écrire
                Tant qu'il y a des lignes dans le tableau de contacts restants 
                    Insérer la ligne dans le fichier CSV
                Fermer le fichier
            Rediriger vers l'index
*/

if (!empty($_POST)) {

    $new_contacts = array();

    $contacts = array(
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'tel' => ''
    );
}
