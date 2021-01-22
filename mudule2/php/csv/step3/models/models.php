<?php
//Fonction pour faire appel aux contactes CSV
const DATAFILE = 'data/contacts.csv';

/**
 * load_contact
 *
 * @param  mixed $link
 * @return array $datas
 */

function load_contact($link) {

    $datas = array();

    if (is_readable($link)) {
        
        $file = fopen($link, 'r');
        
        while (($data = fgetcsv($file, 0)) !== FALSE) {
            array_push($datas, $data);
        }
        
        fclose($file);
    }

    return $datas;
}

$contacts = load_contact(DATAFILE);
