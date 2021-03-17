'use strict';
/**
 * console.log(this) 
 * recuperer le bonhome avec ses co 
 * calculer les futurs co
 * si il veut aller en 4,4 et simuler un clic sur la case
 * blocker l'assenceur 
 * 
 */




function onKeyUp(event) {
    switch (event.key) {
        case 'ArrowRight':
            console.log(this);
        break;

        case 'ArrowLeft':
            console.log(this);
        break;

        case 'ArrowUp':
            console.log(this);

        break;

        case 'ArrowDown':
            console.log(this);
        break;
    }
}

document.addEventListener('keyup', onKeyUp);