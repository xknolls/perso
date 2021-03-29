/**
 * Découverte du framework jQuery
 * Version complète
 */

'use strict';

// Cibler #box1 avec javascript puis jQuery
let jsbox1;
let jqbox1;

// javascript
jsbox1 = document.querySelector('#box1');
// console.log(jsbox1);

// jQuery 
jqbox1 = $('#box1');
// console.log(jqbox1);

// Manipulation des attributs 
jsbox1.setAttribute('title',  'Titre ajouté en javascript');

jsbox1.classList.add('tutu');

// Manipulerles attributs en jQuery 
jqbox1.attr('class', 'toto');
    
// Méthode jQuery pour manipuler les classes
jqbox1.addClass('titi');
// Nota : La class tutu ajoutée en js a été supprimée !

// Manipuler l'attribut style en js 
jsbox1.style.backgroundColor = '#ccc';

// En jQuery 
jqbox1.css('color', 'red');

// Boucle sur un ensemble d'objet jQuery
let menu1Items;

menu1Items = $('#menu1 li');
// console.log(menu1Items);

menu1Items.each( function(index) {
    // Accéder à chaque li avec $(this)
    // console.log(index + ' : ' + $(this));
    $(this).addClass('menu-item');
});

// Menu déroulant tout en jQuery

// Cibler les sous-menuis et les cacher au chargement
$('.submenu').hide();

// installer un gestionnaire d'événement sur les liens directs de submenu
// Evénement au clic
/*$('.has-submenu > a ').click(
    function(event) {
        // Accès au lien cliqué accessible avec la méthodes js
        console.log(this);

        // Accès au lien cliqué accessible avec la méthode jQuery 
        console.log($(this));

        // Empecher le fonctionnement naturel du lien (idem js)
        event.preventDefault();

        // Cibler l'élément qui suit le lien cliqué pour le montrer
        // $(this).next().show(400);
        // $(this).next().toggle(400);
        $(this).next().slideToggle('slow');        
    }
);*/

// Plusieurs types d'événements
$('.has-submenu > a ').on('click , focus , mouseover',
    function(event) {
        // Accès au lien cliqué accessible avec la méthodes js
        // console.log(this);

        // Accès au lien cliqué accessible avec la méthode jQuery 
        // console.log($(this));

        // Empecher le fonctionnement naturel du lien (idem js)
        event.preventDefault();

        // Cibler l'élément qui suit le lien cliqué pour le montrer
        // $(this).next().show(400);
        // $(this).next().toggle(400);
        $(this).next().slideToggle('slow');        
    }
);

// API jQuery Data
console.log($('#p1').data('html'));

// Rajouter un paramètre data : jQ avec jquery

// Pas d'ttribut data-jQ dns le code HTML
$('#p1').data('jQ', 'titi');

// Pour ajouter un attribut data-jQ sur la balise en jQuery
$('#p1').attr('data-jQ', 'titi'); 
