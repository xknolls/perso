'use strict';

//gestion du clavier
function onKey(event) {
	console.log('okok');
	let player;

	//on recupere le pion du joueur
	player = document.querySelector('.player');
	//on recupere la div dans laquelle est le joueur
	let div = player.parentNode;
	//on recupere les coordonnées du joueur
	let playerx = div.getAttribute('data-x');
	let playery = div.getAttribute('data-y');	

	//test pour la touche clické
	switch (event.key) {
		case 'ArrowUp':
			playery--;
			document.querySelector('.cell[data-x="'+Number(playerx)+'"][data-y="'+Number(playery)+'"]').click();
			break;
		case 'z':
			up.click();
			break;
		case 'ArrowLeft':
			playerx--;
			document.querySelector('.cell[data-x="'+Number(playerx)+'"][data-y="'+Number(playery)+'"]').click();
			break;
		case 'q':
			left.click();
			break;
		case 'ArrowRight':
			playerx++;
			document.querySelector('.cell[data-x="'+Number(playerx)+'"][data-y="'+Number(playery)+'"]').click();
			break;
		case 'd':
			right.click();
			break;
		case 'ArrowDown':
			playery++;
			document.querySelector('.cell[data-x="'+Number(playerx)+'"][data-y="'+Number(playery)+'"]').click();
			break;
		case 's':
			playery++;
			document.querySelector('.cell[data-x="'+Number(playerx)+'"][data-y="'+Number(playery)+'"]').click();
			break;
		case 'Enter':
			player.click();
			break;
	}
}

document.addEventListener('keyup', onKey);