/**
 * AJAX LAZY 
 *  Chargement AJAX d'une nouvelle galerie 
 *  Script PHP : ajax_lazy.php 
 *  Bloc parent ajax : .ajax-lazy 
 * 
 *  Récupèrer le nom de la galerie (nom du dossier) dans l'attribut data-gallery du lien
 *  Constuire l'URL de la requête ajax 
 *  Effectuer la requête AJAX
 *  Restaurer la réponse JSON en tableau d'objets javascript
 *  Créer et insérer dans le document les éléments DOM de la nouvelle galerie * 
 *
 */

;(function () {
	'use strict';
	
	function ajaxLazy() {

		const nav = document.querySelector('.choice-gallery-nav');

		function onClickNav(event) {
			if (event.target.nodeName !== 'A') {
				return false;
			}

			event.preventDefault();

			/**
             * Construire l'URL en contournant le cache 
             *      -> sécurité : requête unique 
             *      -> utiliser event.timeStamp : nombre de ms écoulées depuis le début du temps de vie du document courant jusqu'à la création de l'évènement
             *  Voir aussi :   https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest#cross-site_xmlhttprequest
             * 
            */
			const url = 'ajax-lazy.php?galerie=' + event.target.dataset.gallery + '&t=' + event.timeStamp;
				//console.log(url);

			ajaxGet(url, function (response) {
				//traduire l'objet JSON en objet javascript
				let gallery = JSON.parse(response);
				console.log(gallery);

				displayGallery(gallery);
			});
		}

		function displayGallery(gallery) {
			//cibler le conteneur ajax
			const ajaxElement = document.querySelector('.ajax');
			//vider le conteneur
			ajaxElement.innerHTML = '';

			let ul = document.createElement('ul');
			ul.setAttribute('id', 'gallery');
			ul.classList.add('gallery');

			gallery.forEach(function (image) {
				let li = document.createElement('li');
				li.classList.add('imglist');

				let img = document.createElement('img');
				img.classList.add('thumb-img');
				img.setAttribute('src', image['src']);
				img.dataset.src = image['src_thumbnails'];
				img.setAttribute('alt', image['alt']);

				li.append(img);
				ul.append(li);
			});
			
			let divPreview = document.createElement('div');
			divPreview.setAttribute('id', 'preview');
			divPreview.classList.add('preview');

			ajaxElement.append(ul);
			ajaxElement.append(divPreview);
		}
		
		/**
		 * ajaxGet
		 *  Initialisation de l'objet XHR
		 *  Envoie d'une requête get
		 *  Récuperation de la réponse
		 * @param {*} url : url de la requete
		 * @param {*} callback : fonction de retour
		 */
		function ajaxGet(url, callback) {
			
			const req = new XMLHttpRequest();
			
			req.open("GET", url, true);
			
			req.addEventListener('load', function () {
				if (req.status >= 200 && req.status < 400) {
					callback(req.response);
				} else {
					console.error(req.status + " " + req.statusText + " " + url);
				}
			});
			
			req.addEventListener('error', function () {
				console.error('Erreur réseau avec l\'url :' + url);
			});
			
			//fin de la transaction GET
			req.send(null);
		}

		nav.addEventListener('click', onClickNav);
	}
	
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
	
	window.addEventListener('load', zoom);
	window.addEventListener('load', ajaxLazy);
})();