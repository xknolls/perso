'use strict';

// Données 
var index;


// Fonctions

// Faire apparaitre la bonne figure

function changeSlide() {
    document.querySelector('.slider-figure.is-active').classList.remove('is-active');
    
    
    slides[index].classList.toggle('is-active');
}

//Faire avancer le slider
function onClickNext() {
    console.log(this);

    // La figure à faire apparaitre correspond à l'index actuel
    index++;

    // Revenir au début si on arrive à la fin du tableau
    if(index == slides.length) {
        index = 0;
    }
    console.log(index);

    changeSlide();
}

//Faire reculer le slider
function onClickPrev() {
    console.log(this);

    // La figure à faire apparaitre correspond à l'index actuel
    index--;

    // Revenir au début si on arrive à la fin du tableau
    if(index < 0) {
        index = slides.length -1;
    }
    console.log(index);

    changeSlide();
}


// traitement au chargement de la page

index = 0;

let slides;
slides = document.querySelectorAll('.slider-figure');
console.log(slides)

document.querySelector('.slider-nav [rel="next"]').addEventListener('click', onClickNext);

document.querySelector('.slider-nav [rel="prev"]').addEventListener('click', onClickPrev);