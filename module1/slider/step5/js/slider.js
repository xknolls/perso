'use strict';

// Données
var index;
let slides;
let idInterval;

// Fonctions
function insertPaginationSlider() {
    let sliderContainer; // div .slider
    let listPagination; //Element ol

    sliderContainer = document.querySelector('.slider');

    // Création de la liste ol dans le DOM
    listPagination = document.createElement('ol');

    // Ajouter la classe
    listPagination.classList.add('slider-pagination');

    for (let i = 0; i < slides.length; i++) {
        let itemPagination; // élément !
        itemPagination = document.createElement('li');
        itemPagination.classList.add('slider-pagination-item');

        // Ajouter l'attribut data-slide
        // itemPagination.setAttribute('data-slide', (i+1));
        itemPagination.dataset.slide = (i + 1);

        // Ajouter le li dans la ol
        listPagination.append(itemPagination);

        // Gestionnaire d'évenement
        itemPagination.addEventListener('click', onClickItemPagination);
    }

    // Ajouter le classe is-active pour le premier enfant de la ol au chargement 
    listPagination.firstChild.classList.add('is-active');

    sliderContainer.append(listPagination);
}

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
        oldSlide.classList.remove('is-active', 'animate__slideInLeft', 'animate__slideInRight', 'animate__slideOutLeft', 'animate__slideOutRight', 'animate__flipInX', 'animate__flipOutX');

        //modifier l'attribut aria-hidden
        oldSlide.setAttribute('aria-hidden', 'true');

        //et l'ajouter a la slide suivante
        newSlide.classList.add('is-active', animationIn);

        //modifier l'attribut aria-hidder
        newSlide.setAttribute('aria-hidden', 'false');
    }, 500);

    setTimeout(function () {
        oldSlide.classList.remove('is-active');
    }, 500)

    // Changer la classe is active dans la pagination
    document.querySelector('.slider-pagination li.is-active').classList.remove('is-active');

    document.querySelector('.slider-pagination li[data-slide="' + (index + 1) + '"]').classList.add('is-active');

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
    changeSlide('animate__slideInRight', 'animate__slideOutLeft');
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
    changeSlide('animate__slideInLeft', 'animate__slideOutRight');
}

function onKeyUp(event) {
    switch (event.key) {
        case 'ArrowRight':
            onClickNext();
            break;

        case 'ArrowLeft':
            onClickPrev();
            break;
    }
}

function onClickItemPagination() {
    // Récupperer la valeur de l'attribut data-slidede la li cliqué
    let currentPagination;
    currentPagination = this.getAttribute("data-slide");
    currentPagination--;
    if (index !== currentPagination) {
        index = currentPagination;
        changeSlide('animate__flipInX', 'animate__flipOutX');
    }
}

function onClickSlideshow() {
    let btn;
    btn = document.querySelector('.slider-slideshow');

    if (idInterval == null) {
        idInterval = setInterval(function () {
            onClickNext();
        }, 3500);
        btn.textContent = 'Stop'

    } else {
        //Arreter le diapo
        clearInterval(idInterval);
        idInterval = null;
        btn.textContent = 'Play'

    }


}

//Traitement au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
    //on stock l'index 0
    index = 0;

    idInterval = null;

    //on recup tout les liens dans un tableaux
    slides = document.querySelectorAll('.slider-figure');

    insertPaginationSlider();

    //on enquete sur le bouton next
    document.querySelector('.slider-nav [rel="next"]').addEventListener('click', onClickNext);
    document.querySelector('.slider-nav [rel="prev"]').addEventListener('click', onClickPrev);

    document.addEventListener('keyup', onKeyUp);

    document.querySelector('.slider-slideshow').addEventListener('click', onClickSlideshow)
});
