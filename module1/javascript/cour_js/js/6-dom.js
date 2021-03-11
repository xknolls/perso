'use strict';

// Cibler un élément id=p1

let p1;
p1 = document.getElementById('p1');
console.log(p1);

// Une fois l'objet accessible on peut le manipuler
p1.style.color = 'red';

// Acceder aux propriétés de l'objet p1
console.log(p1.attributes);

// Sélectionner un élément par sa classe 
let c1;

c1 = document.getElementsByClassName('c1');


// Dans ce cas, on recupere une collection (un tableau ou chaque ligne correspond à un éléménet portant la classe)
console.log(c1);

// Pour manipuler les éléments concernés, il faut faire une boucle sur c1

for (let i = 0; i < c1.length; i++) {
    console.log(c1[i]);
    c1[i].style.color = 'green';
}

// L'API querySelector : cibler les éléments par un sélecteur css

// querSelector -> cible le premier élément trouvé
let menu;
menu =document.querySelector('.menu');
console.log(menu);

// querSelectorAll -> cible tous éléments trouvés
let menuItmes;
menuItmes = document.querySelectorAll('.menu li');
console.log(menuItmes);

// Avec une propriété sur menu
// renvoi tout, y compris le texte et les sauts de lignes 
console.log(menu.childNodes);

// Pour obtenir uniquement les balises enfants 
console.log(menu.children);

let main
main = document.querySelector('main');

console.log(main.children);

// Renvoi le nom de la balise en majuscule
console.log(main.nodeName);