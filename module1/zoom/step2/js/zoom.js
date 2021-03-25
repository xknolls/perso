;(function () {
	'use strict';

	function zoom() {
		let picture;
		let figure
		let thumb;
		let div;

		thumb = document.querySelector('.thumb-img');
		thumb.classList.add('selected');

		//creation d'une image
		picture = document.createElement('img');
		//ajout classe
		picture.classList.add('picture');
		picture.classList.add('animate__animated', 'animate__fadeInRightBig');
		picture.src = thumb.dataset.src;

		figure = document.createElement('figure');
		figure.classList.add('figure-picture');

		//recuperation de la div
		div = document.getElementById('preview');

		//ajout de img dans la div
		figure.append(picture);
		div.append(figure);

		//installation de l'evenement sur la premiere div
		let divgal;
		divgal = document.getElementById('gallery');
		divgal.addEventListener('click', function (event) {
			
			//si on ne clique pas sur une image alors rien ne ce passe
			if (event.target.nodeName !== 'IMG') {
				return;
			}
			
			let clickedimg;
			
			//on recupere l'image affiché en grand
			clickedimg = document.querySelector('.picture');
			clickedimg.src = event.target.dataset.src;

			
			clickedimg.classList.remove('animate__fadeInRightBig');
			clickedimg.classList.add('animate__fadeOutRightBig');
			
			setTimeout(function () {
				clickedimg.classList.remove('animate__fadeOutRightBig');
				clickedimg.classList.add('animate__fadeInRightBig');
			}, 500);
			
			//si la classe existe on l'enleve
			document.querySelector('.selected').classList.remove('selected');
			//on ajoute la classe sur l'image cliqué
			event.target.classList.add('selected');

			//clickedimg.setAttribute('alt', );
		});
	}

	// L'évenement load se déclanche à la fin du processus de chargement du doc. A ce moment, tous les objets du doc sont dans le DOM.
	window.addEventListener('load', zoom);
})();