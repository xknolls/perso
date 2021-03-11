"use strict";

function sayHelloSomebody(pseudo) {
	document.write(`Bonjour ${pseudo} !`);
}

//Exécution de la fonction
sayHelloSomebody('Levi');

//Stocker une fonction anonyme dans une variable
let maVariableFonction;
maVariableFonction = function () {
	var pseudo = 'Eren';
	//La fonction est exécutée sans être appelée, elle ne porte pas de nom
	console.log(pseudo);
}
	
maVariableFonction();

//Fonction anonyme
(function () {
	var pseudo = 'Mikasa';
	//La fonction est exécutée sans être appelée, elle ne porte pas de nom
	console.log(pseudo);
})();

//Intérêt: la variable pseudo n'existe que dans la fonction
console.log(typeof pseudo);