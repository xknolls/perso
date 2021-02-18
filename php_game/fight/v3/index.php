<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('model/character.php');
include_once('model/warrior.php');
include_once('model/wizard.php');

// Fonction pour taper
/**
 * Simulation de combat
 *
 * @param  Character $a
 * @param  Character $b
 * @return void
 */
/*
function hit (Character $a, Character $b) : void 
{
    $b -> setHealth($b -> getHealth() - $a -> getStrength());
}*/


$oQuentin = new Warrior('Quentin');
$oQuentin -> setHealth(150);
$oQuentin -> setStrength(50);
//$oQuentin -> display();

$oChristo = new Wizard('Christo');
$oChristo -> setHealth(70);
$oChristo -> setStrength(20);
$oChristo -> setMagic(20);
//$oChristo -> display();
/*
echo "Quentin casse la geule à Christo" . PHP_EOL . PHP_EOL;
$oQuentin-> hit($oChristo);

$oChristo -> display();

$oQuentin ->display();*/
$oChristo -> fireball($oQuentin);
/*$oChristo -> popo_de_heal();
$oQuentin -> display();
$oChristo -> display();*/
