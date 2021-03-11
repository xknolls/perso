'use strict';

/**
 * Installer un gestionnaire d'évenement sur le boutton btn1
 * afin de cacher la div target2 si l'utilisateur clique sur le bouton
 */
function onClickBtn1(e) {
    console.log('Cliqué !');
    let target1 = document.getElementById('target1');
    if (target1.style.display == 'none') {
        target1.style.display = 'block';
        btn1.textContent = 'Cacher la div';
    } else {
        target1.style.display = 'none';
        btn1.textContent = 'Afficher la div';
    }
    
    // e est l'argument implicite de la fonction (lors qu'il s'agit d'un évenment) = objet correspondant à l'évenement 
    console.log(e);
    
    // La propriété de e.target
    console.log(e.target);

    console.log(this);
}

let btn1
btn1 = document.getElementById('btn1');
btn1.addEventListener('click', onClickBtn1);

/* Généraliser l'interrupteur */

function onClickBtn() {
    console.log(this);
    //Récupérer l'id de la div dans l'ztribut data-target du bouton, donc de this
    let targetId;
    let target;

    targetId = this.getAttribute('data-target');
    console.log(targetId);

    target= document.querySelector(targetId);
    console.log(target);

    target.classList.toggle('is-hidden');

    if( target.classList.contains('is-hidden')) {
        this.textContent = 'Afficher la div';
    } else {
        this.textContent = 'Cacher la div';
    }
}

// Installer un gestionnaire d'évènement sur tous les butons concernés
let btns;
btns = document.querySelectorAll('.toggle');

// On récupère une collection
console.log(btns);

btns.forEach( function(btn) {
    btn.addEventListener('click', onClickBtn);
});

// API CLASSLIST

let p1;
p1 = document.getElementById('p1');

// Ajouter une classe 
p1.classList.add('maClasse');

// Supprimer une classe
p1.classList.remove('p1'); 

/* Switcher une classe : 
    Si l'élément n'a pas la classe --> ajout 
    Si l'élément ala class --> remove 
*/