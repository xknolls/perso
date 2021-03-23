<?php
// Gestion (et démarrage) des sessions PHP
session_start();

use Model\RpgGame;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Auto-chargement des classes
// > on défini une fonction anonyme à appeler en cas d'erreur
spl_autoload_register(function ($sNamespaceClass) {
    //echo '?? '. $sNamespaceClass.PHP_EOL;
    $sConvertedClass = str_replace('\\', '/', $sNamespaceClass);
    include_once($sConvertedClass . '.php');
});