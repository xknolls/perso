'use strict';

// Données
var index;


// Fonctions

//faire apparaitre la bonne figure
function changeSlide(animationIn, animationOut) {
    let oldSlide;
    let newSlide;

    oldSlide = document.querySelector('.slider-figure.is-active');
    newSlide = slides[index];

    //supprimer la classe is-active pour faire disparaitre le slide actuel
    oldSlide.classList.add(animationOut);

    // Faire arriver la nouvelle slide au bout de 1s (temps qu'il faut à l'ancienne pour disparaitre)
    setTimeout(function () {
        oldSlide.classList.remove('is-active', 'animate__slideInLeft', 'animate__slideInRight', 'animate__slideOutLeft', 'animate__slideOutRight');

        //modifier l'attribut aria-hidden
        oldSlide.setAttribute('aria-hidden', 'true'); 0

        //et l'ajouter a la slide suivante
        newSlide.classList.add('is-active', animationIn);

        //modifier l'attribut aria-hidder
        newSlide.setAttribute('aria-hidden', 'false');
    }, 500);

    setTimeout(function(){
        oldSlide.classList.remove('is-active');
    }, 500)


}

//faire avancer le slider
function onClickNext() {
    console.log(this);

    //la figure a faire apparaitre correspond a l'index actuel +1
    index++;
    //test pour que index reste inferieur au nombre de ligne du tableau
    if (index == slides.length) {
        index = 0;
    }
    console.log(index);
    changeSlide('animate__slideInLeft', 'animate__slideOutRight');
}

//faire reculer le slider
function onClickPrev() {
    console.log(this);

    //la figure a faire apparaitre correspond a l'index actuel +1
    index--;
    //test pour que index reste inferieur au nombre de ligne du tableau
    if (index < 0) {
        index = slides.length - 1;
    }
    console.log(index);
    changeSlide('animate__slideInRight', 'animate__slideOutLeft');
}


//Traitement au chargement de la page

//on stock l'index 0
index = 0;

//on recup tout les liens dans un tableaux
let slides;
slides = document.querySelectorAll('.slider-figure');
console.log(slides);

//on enquete sur le bouton next
document.querySelector('.slider-nav [rel="next"]').addEventListener('click', onClickNext);
document.querySelector('.slider-nav [rel="prev"]').addEventListener('click', onClickPrev);