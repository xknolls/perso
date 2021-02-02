<?php

// TOUJOURS avant le DOCTYPE
session_start();

$_SESSION['pseudo'] = 'knolls';
$_SESSION['age'] = '21';

// Afficher l'id de session stocké dans le navigateur dans un cookie de session nommé PHPSESSID
var_dump( session_id() );

$pass = '1302';

// Hashage du mot de passe en utilisant l'algo md5 : https://www.php.net/manual/fr/function.md5.php
var_dump( md5($pass) );

//Hasher le mot de passe en rajoutant une clé $sel
$sel = 'secret'; 
var_dump( md5($pass . $sel) );


// Crypter le mot de passe avec BCRYPT : laisser PHP établir la clé 
$hash1 = password_hash($pass,PASSWORD_BCRYPT);
var_dump($hash1);

// Crypter le mot de passe avec BCRYPT : laisser PHP établir la clé 
$hash2 = password_hash($pass,PASSWORD_BCRYPT);
var_dump($hash2);

// C'est lé hash qui est stocké
$users = array(
    array(
        'login' => 'knolls',
        'pass' => $hash1
    ),
    array(
        'login' => 'sneadz',
        'pass' => $hash2
    ),
);

// Vérifier le mot de passe
// Renvoie true : 123456 correspondant à $hash
var_dump( password_verify('1302', $hash1) );

// Renvoie false
var_dump( password_verify('zeubi', $hash1) );
