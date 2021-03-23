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
    let player;
    let div;
    let playerX;
    let playerY;

    // On récupère le premier joueur
    player = document.querySelector('.player');

    // On récupère la div ou se trouve le joueur
    div = player.parentNode;
    // On stock ces coordonées
    playerX = div.getAttribute('data-x');
    playerY = div.getAttribute('data-y');

    switch (event.key) {
        case 'ArrowRight':
            playerX++;
            document.querySelector('.cell[data-y="' + Number(playerY) + '"][data-x="' + Number(playerX) + '"]').click();
            break;

        case 'ArrowLeft':
            playerX--;
            document.querySelector('.cell[data-y="' + Number(playerY) + '"][data-x="' + Number(playerX) + '"]').click();
            break;

        case 'ArrowUp':
            playerY--;
            document.querySelector('.cell[data-y="' + Number(playerY) + '"][data-x="' + Number(playerX) + '"]').click();
            break;

        case 'ArrowDown':
            playerY++;
            document.querySelector('.cell[data-y="' + Number(playerY) + '"][data-x="' + Number(playerX) + '"]').click();
            break;

        case 'Enter':
            player.click();
            break;
    }
}

document.addEventListener('keyup', onKeyUp);