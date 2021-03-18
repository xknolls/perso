// Permet de proteger les noms de fonctions
;(function() {
    'use strict';

    function zoom() {
        console.log('Zoom');
    }

    // Au chagement de la page tous les objets de la page sont dans le DOM
    window.addEventListener('load', zoom);

})();