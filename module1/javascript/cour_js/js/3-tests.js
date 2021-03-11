//mode strict de JS
"use strict";

/**
 * Exercice :
 *
 * Définir une constante booléenne HOLIDAY pour déterminer si c'est les vacances
 * Définir une constante AGE_MAJORITE fixée à 18
 * Demander à l'utilisateur de saisir son âge
 * Si l'utilisateur est mineur et que ce n'est pas les vacances
 * 	Afficher: Tu reste a la maison
 * Sinon si l'utilisateur est mineur et que c'est les vacances
 * 	Afficher: Tu peux sortir
 * Sinon
 * 	Afficher: Etre adulte, c'est assumer!
 *
 */

const HOLIDAY = true;
const AGE_MAJORITE = 18;

let age = window.prompt("Quel âge as-tu ?");

if (age < AGE_MAJORITE && HOLIDAY === false) {
  console.log("Tu reste a la maison");
} else if (age < AGE_MAJORITE && HOLIDAY === true) {
  console.log("Tu peux sortir");
} else {
  console.log("Etre adulte, c'est assumer!");
}