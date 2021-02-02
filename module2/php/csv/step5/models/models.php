<?php
//Fonction pour faire appel aux contactes CSV
const DATAFILE = 'data/contacts.csv';

/**
 * load_contact
 *
 * @param  mixed $link
 * @return array $datas
 */

function load_contacts($link) {

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



/**
 * save_datas_csv
 *
 * @param  mixed $path
 * @param  mixed $datas
 * @return void
 */
function save_datas_csv ($path, $datas) {
    
    if(is_writable($path)) {
        $open = fopen($path, 'w+');

        foreach ($datas as $line) {
            fputcsv($open, $line);
        }

        fclose($open);
    }
}
