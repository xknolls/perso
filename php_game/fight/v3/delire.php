<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('model/character.php');
include_once('model/warrior.php');
include_once('model/wizard.php');


/**
 * Simulation de combat
 *
 * @param  Character $a
 * @param  Character $b
 * @return void
 */ 
function hit (Character $a, Character $b) : void 
{
    $b -> setHealth($b -> getHealth() - $a -> getStrength());
}


$oMarie = new Warrior('Marie');
$oMarie -> setHealth(150);
$oMarie -> setStrength(50);
$oMarie -> display();

$oAudrey = new Wizard('Audrey');
$oAudrey -> setHealth(70);
$oAudrey -> setStrength(20);
$oAudrey -> setMagic(200);
$oAudrey -> display();


echo PHP_EOL . PHP_EOL ."Marie utilise coups de tête sur Audrey" . PHP_EOL . PHP_EOL;

hit($oMarie, $oAudrey);

$oAudrey -> display();

echo "C'est très éfficace";
echo PHP_EOL . PHP_EOL . "Maxime entre en jeu" . PHP_EOL . PHP_EOL;

$oMax = new Wizard('Maxime');
$oMax -> setHealth(90);
$oMax -> setStrength(100);
$oMax -> setMagic(150);
$oMax -> display();

echo "Maxime venge Audrey avec attaque rupteur" . PHP_EOL;

hit($oMax, $oMarie);

$oMarie -> display();
echo "Marie es dans le mal" . PHP_EOL . PHP_EOL;
echo "Le boss du game entre en jeu" . PHP_EOL;

$oQuentin = new Warrior('Quentin');
$oQuentin -> setHealth(1);
$oQuentin -> setStrength(89);
$oQuentin -> display();

echo "Quentin n'as seulement que 1_PV mais rien ne l'arreteras " . PHP_EOL . "Il utilise sa super attaque weeling" . PHP_EOL;

hit($oQuentin, $oMarie);
hit($oQuentin, $oAudrey);
hit($oQuentin, $oMax);

$oMarie -> display();
$oAudrey -> display();
$oMax -> display();

echo "Quentin viens de terrasser Audrey et Marie mais l'amour qui l'unit avec Maxime l'empeche de le tuer" . PHP_EOL;


$oMax-> display();


echo PHP_EOL . "Vu que max est le best il peut se redonner de la santé" . PHP_EOL;


$oMax-> popo_de_heal();
$oMax-> display();

echo "Et en plus le deuxième nombre le plus beau du monde" . PHP_EOL;
echo PHP_EOL . "Je rapel que le plus beau nombre du monde est celui de la vie de Audrey avec le signe (-) en moins" . PHP_EOL;
echo PHP_EOL . "PS: je n'ai même pas fait exprès de faire ces nombres la ";
