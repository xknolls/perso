; (function () {
	'use strict';

	function zoom() {

		let sections = document.querySelectorAll('.zoom');

		for (let i = 0; i < sections.length; i++) {
			let picture;
			let figure;
			let thumb;
			let div;

			thumb = sections[i].querySelector('.thumb-img');
			thumb.classList.add('is_active');

			//creation d'une image
			picture = document.createElement('img');
			//ajout classe
			picture.classList.add('picture');
			picture.classList.add('animate__animated', 'animate__fadeInRightBig');
			picture.src = thumb.dataset.src;

			figure = document.createElement('figure');
			figure.classList.add('figure-picture');

			//recuperation de la div
			div = document.querySelectorAll('#preview');

			//ajout de img dans la div
			figure.append(picture);
			div[i].append(figure);

			//installation de l'evenement sur la section
			sections[i].addEventListener('click', function (event) {

				//si on ne clique pas sur une image alors rien ne ce passe
				if (event.target.nodeName !== 'IMG' || event.target.classList.contains('is_active')) {
					return;
				}

				let clickedimg;

				//on recupere l'image affiché en grand
				clickedimg = sections[i].querySelector('.picture');
				clickedimg.src = event.target.dataset.src;

				clickedimg.classList.remove('animate__fadeInRightBig');
				clickedimg.classList.add('animate__fadeOutRightBig');

				setTimeout(function () {
					clickedimg.classList.remove('animate__fadeOutRightBig');
					clickedimg.classList.add('animate__fadeInRightBig');
				}, 500);

				//si la classe existe on l'enleve
				sections[i].querySelector('.is_active').classList.remove('is_active');
				//on ajoute la classe sur l'image cliqué
				event.target.classList.add('is_active');
			});
		}
	}

	// L'évenement load se déclanche à la fin du processus de chargement du doc. A ce moment, tous les objets du doc sont dans le DOM.
	window.addEventListener('load', zoom);
})();