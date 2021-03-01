/**
* Shifumi
* L'utilisateur joue contre l'ordinateur 
* lejeu correspond à un set 
* 
* l'iutilisateur choisit pierre, feuille ou ciseaux
* Tirage alétatoire pour l'ordinateur
* 
*  ->Math.random() renvoie un nombre flottant pseudo-aléatoire compris dans l'intervalle [0,1]
* 
* Afficher le vainqueur
* 
*/

'use strcit';

// Stocker par convention la valeur numérique des choix (pour comparer des nombres)
const PIERRE = 1;
const FEUILLE= 2;
const CISEAUX = 3;

let user ;
user = promt(`
    Choisir ;
    1 - Pierre
    2 - Feuille
    3 - Ciseaux
`);