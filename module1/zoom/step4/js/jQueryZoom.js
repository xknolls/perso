/**
 * Plugin
 * Version 1.0
 */

/**
 * La fonction anonyme comporte un paramètre $
 * Lors de son appel, la valeur « jQuery » lui est transmise
 * Toutes les instructions situées à l'intérieur de la fonction  remplaceront automatiquement le signe $ par jQuery.
 */
;(function($) {
    'use strict';

    $.fn.jQueryZoom = function() {
        
    }

})(jQuery);



let galleries = $('.zoom');

// Pour chaques galerie
galleries.each(
    function () {
        // Installer un gestionnaire d'événement ($(this)-->une galerie)
        // Recherche toutes les miniatures de la galerie
        const thumbnails = $(this).find('.thumb-img');
        
        // Délégation : second paramètre
        $(this).on('click', thumbnails, function (event) {
            // console.log($(this)); // La galerie
            // console.log($(event.traget)); // Miniature cliquée 
            console.log(thumbnails);
        });

        let picture;

        // création d'une image
        picture = $('<img>');
        // ajoute de la class picture
        picture.attr('class', 'picture');
        picture.addClass('animate__animated', 'animate__fadeInRightBig');
        picture.attr('src', 'test');
    }
);
