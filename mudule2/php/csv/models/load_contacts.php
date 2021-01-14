<?php

//Chemin du fichier stocké dans une constante
const DATAFILE = 'data/contacts.csv';

//Tableau stockant les contacts 
$contacts = array();

if ( is_readable(DATAFILE) ) {
    $file = fopen(DATAFILE, 'r');

    while(( $data = fgetcsv($file,0,';'))) {
        array_push($contacts, $data);
    } 

    fclose($file);
    
}


/* if(FALSE !== ($file = fopen(DATAFILE, 'r'))) {
    
    while(( $data = fgetcsv($file,0,';'))) {
        array_push($contacts, $data);
    } 
}
*/