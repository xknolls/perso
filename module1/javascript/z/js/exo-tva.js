'use strict';

/**
 * Proposez à l'utilisateur de saisir un montant HT
 * Afficher le montant de la TVA (20%)
 * Afficher le montant TTC (sur une autre ligne)
 * 
 * Les montants doivent être affichés sous forme de nombre flottant à 2 décimales.
 */

//Déclaration des variables + calculs
let amountHt = parseFloat(window.prompt('Quel est le montant HT ?'));//récupération du montant HT
let amountTtc = amountHt * 1.2;//calcul du montant TTC
let amountTva = amountTtc - amountHt;//calcul de la TVA

//Affichage des résultats
console.log('le montant étant de : ' + amountHt.toFixed(2) + '€');//Affichage du montant HT
console.log('la tva est de : ' + amountTva.toFixed(2) + '€');//Affichage du montant de la TVA
console.log('le prix ttc est de : ' + amountTtc.toFixed(2) + '€');//Affichage du montant TTC

//concaténer une variable
let message;

message = 'La TVA est de :';
message += amountTva.toFixed(2);
message += '<br';
message += 'Total HT : ';
message += amountHt.toFixed(2);
message += '<br';

document.write(message);

//littéraux de gabarits
amountTva = amountTva.toFixed(2);
amountHt = amountHt.toFixed(2);
amountTtc = amountTtc.toFixed(2);

message = `
  Pour un montant de ${amountHt} € <br>
  La TVA est de : ${amountTva} € <br>
  Le total TTC s'élève dont à ${amountTtc} € <br>
`;

document.write(message);