/**
 * Shifumi
 * L'utilisateur joue contre l'ordinateur
 * Le jeu correspond à un set (une manche)
 * 
 * L'utilisateur choisit Pierre, Feuille ou Ciseaux
 * Tirage aléatoire pour l'ordinateur
 * 
 * -> The Math.random() function returns a floating-point, pseudo-random number in the range [0, 1[
 * 
 * Afficher le vainqueur
 */

"use strict";

//stocker par convention la valeur numérique des choix (pour comparer des nombres)
const PIERRE = 1;
const FEUILLE = 2;
const CISEAUX = 3;

//boucle début du jeu
do {
    let user;
    do {
        user = parseInt(prompt(`
    Choisir :
    1 - Pierre
    2 - Feuille
    3 - Ciseaux
    `));
    } while (isNaN(user) || user < 1 || user > 3); //relancer tant que la saisie nest pas un chiffre compris entre 1 et 3

    user = parseInt(user, 10);//la saisie deviens un nombre

    let ia;
    ia = Math.floor(Math.random() * (4 - 1) + 1);//choix aléatoire

    console.log(user);
    console.log(ia);

    //tests victoires
    /**
     * 1-1, 2-2, 3-3 -> nul
     * 1-2, 2-3, 3-1 -> defaite
     * 2-1, 3-2, 1-3 -> victoire
     * 
     */
    if (user === ia) {
        window.alert(`Tu as choisi ${user}, l'ia à choisi ${ia}, match nul :\'(`);
    } else if ((user == 1 && ia == 2) || (user == 2 && ia == 3) || (user == 3 && ia == 1)) {
        window.alert(`Tu as choisi ${user}, l'ia à choisi ${ia}, désolé, mais c'est perdu.`)
    } else {
        window.alert(`Tu as choisi ${user}, l'ia à choisi ${ia}, bravo a toi !`)
    }

    var replay = confirm('on rejoue ?');
} while (replay == true);