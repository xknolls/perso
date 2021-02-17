<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('model/warrior.php');
include_once('model/wizard.php');


$oQuentin = new Warrior('Quentin');
/*$oQuentin -> setHealth(50);
$oQuentin -> setStrength(100);
$oQuentin -> display();*/
echo $oQuentin . PHP_EOL;

$oAudrey = new Wizard('Audrey');
$oAudrey -> setHealth(50);
$oAudrey -> setStrength(100);
$oAudrey -> setMagic(200);
$oAudrey -> display();
