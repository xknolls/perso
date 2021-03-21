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

    let up;
    let right;
    let down;
    let left;
    let player;
    let div;
    let playerX;
    let playerY;

    console.log('nickel');

    // On récupère le premier joueur
    player = document.querySelector('.player');

    // On récupère la div ou se trouve le joueur
    div = player.parentNode;
    // On stock ces coordonées
    playerX = div.getAttribute('data-x');
    playerY = div.getAttribute('data-y');

    up = document.querySelector('.cell-selected[data-y="' + (Number(playerY) - 1) + '"]');
    right = document.querySelector('.cell-selected[data-x="' + (Number(playerX) + 1) + '"]');
    down = document.querySelector('.cell-selected[data-y="' + (Number(playerY) + 1) + '"]');
    left = document.querySelector('.cell-selected[data-x ="' + (Number(playerX) - 1) + '"]');



    switch (event.key) {
        case 'ArrowRight':
            right.click();
            break;

        case 'ArrowLeft':
            left.click();
            break;

        case 'ArrowUp':
            up.click();
            break;

        case 'ArrowDown':
            down.click();
            break;

        case 'Enter':
            player.click();
            break;
    }

}




document.addEventListener('keyup', onKeyUp);