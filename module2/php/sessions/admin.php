<?php 

/*
    Si une valeur login n'est pas présente dans la sessio, 
    Rediriger vers index.php

    (Je cherche si il existe $_SESSION['login])
 */
session_start();

if( !array_key_exists('login', $_SESSION )) {
    header('Location:index.php');
    exit;
}



include 'admin.phtml';