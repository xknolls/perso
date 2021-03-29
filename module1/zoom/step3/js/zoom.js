; (function () {
	'use strict';

	function zoom() {

<<<<<<< HEAD
		let sectionZoom;
		sectionZoom = document.querySelectorAll('.zoom');

		for (let i = 0; i < sectionZoom.length; i++) {

			let figcaption;
			let picture;
			let figure
			let thumb;
			let div;

			thumb = sectionZoom[i].querySelector('.thumb-img');
			thumb.classList.add('selected');
=======
		let sections = document.querySelectorAll('.zoom');

		for (let i = 0; i < sections.length; i++) {
			let picture;
			let figure;
			let thumb;
			let div;

			thumb = sections[i].querySelector('.thumb-img');
			thumb.classList.add('is_active');
>>>>>>> 87ddcd19e222ad8a26edff41f18a7e666c3d4199

			//creation d'une image
			picture = document.createElement('img');
			//ajout classe
			picture.classList.add('picture');
			picture.classList.add('animate__animated', 'animate__fadeInRightBig');
			picture.src = thumb.dataset.src;
<<<<<<< HEAD
			picture.alt = thumb.alt;
=======
>>>>>>> 87ddcd19e222ad8a26edff41f18a7e666c3d4199

			figure = document.createElement('figure');
			figure.classList.add('figure-picture');

<<<<<<< HEAD
			//créatio de l'élément figcaption + la class + la description + le contenue
			figcaption = document.createElement('figcaption');
			figcaption.classList.add('description');
			figcaption.textContent = thumb.alt;

=======
>>>>>>> 87ddcd19e222ad8a26edff41f18a7e666c3d4199
			//recuperation de la div
			div = document.querySelectorAll('#preview');

			//ajout de img dans la div
			figure.append(picture);
<<<<<<< HEAD
			figure.append(figcaption);
			div[i].append(figure);

			//installation de l'evenement sur la premiere div
			
			sectionZoom[i].addEventListener('click', function (event) {

				//si on ne clique pas sur une image alors rien ne ce passe
				if (event.target.localName !== 'img' || event.target.alt == picture.alt) {
					return;
				}


				let clickedimg;
				let figcaption;

				clickedimg = sectionZoom[i].querySelector('.picture');
				clickedimg.classList.remove('animate__fadeInRightBig');
				clickedimg.classList.add('animate__fadeOutRightBig');

				figcaption = document.querySelector('.description');

				setTimeout(function () {
					//on recupere l'image affiché en grand
					clickedimg.src = event.target.dataset.src;
					clickedimg.alt = event.target.alt;
					clickedimg.classList.remove('animate__fadeOutRightBig');
					clickedimg.classList.add('animate__fadeInRightBig');

					figcaption.textContent = event.target.alt;
				}, 500);

				let selected = sectionZoom[i].querySelector('.selected');

				//si la classe existe on l'enleve
				selected.classList.remove('selected');
				//on ajoute la classe sur l'image cliqué
				event.target.classList.add('selected');

				//clickedimg.setAttribute('alt', );
=======
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
>>>>>>> 87ddcd19e222ad8a26edff41f18a7e666c3d4199
			});
		}
	}

	// L'évenement load se déclanche à la fin du processus de chargement du doc. A ce moment, tous les objets du doc sont dans le DOM.
	window.addEventListener('load', zoom);
})();