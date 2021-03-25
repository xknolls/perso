; (function () {
    'use strict';

    function zoom() {

        let thumbnail;      //Récupération de la miniature
        let picture;         
        let figure;       
        let figcaption;   
        let div;          

        thumbnail = document.querySelector('.thumbnail');
        thumbnail.classList.add('selected');
        
        //création de l'élément img + la class + src=""
        picture = document.createElement('img');
        picture.classList.add('picture');
        picture.src = thumbnail.dataset.src;
        picture.alt = thumbnail.alt;

        //création de l'élément figure + la class
        figure = document.createElement('figure');
        figure.classList.add('preview')

        //créatio de l'élément figcaption + la class + la description + le contenue
        figcaption = document.createElement('figcaption');
        figcaption.classList.add('description');
        figcaption.textContent = thumbnail.alt;

        //div dans laquelle on vas injecter les éléments que l'on as créer
        div = document.querySelector('.zoom');

        //injection des éléments 
        figure.append(picture);
        figure.append(figcaption);
        div.append(figure);

        let zoomContainer;

        zoomContainer = document.querySelector('.zoom');

        zoomContainer.addEventListener('click', function (event) {
            
            //test pour na pas cliquer sur la photo deja affiché
            if (event.target.localName !== 'img' || event.target.className == 'picture') {
                return;
            }

            let bigPicture; //nouvelle photo
            let figcaption; //nouveau figcaption

            bigPicture = document.querySelector('.picture');
            figcaption = document.querySelector('.description');

            bigPicture.src = event.target.dataset.src;
            figcaption.textContent = event.target.alt;
                        
            document.querySelector('.selected').classList.remove('selected');
            event.target.classList.add('selected');

        });

    }
    // L'évenement load se déclanche à la fin du processus de chargement du doc. A ce moment, tous les objets du doc sont dans le DOM.
    window.addEventListener('load', zoom);
})();