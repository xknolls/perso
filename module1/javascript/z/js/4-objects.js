"use strict";

//les tableaux

//Déclarer un tableau
let gretaWeb2021 = [];

//Remplir un tableau
gretaWeb2021 = [
	"Quentin",
	"Robin",
	"Christopher",
	"Léo",
	"Brahim",
	"Loïc",
	"Jenny",
	"Déborah",
	"Renaud",
];

console.log(gretaWeb2021); //Affiche le tableau avec indice numérique
console.log(gretaWeb2021[7]); //Affiche la déléguée
console.log(gretaWeb2021[1]); //Affiche Robin

//Méthode permettant d'ajouter une ligne
gretaWeb2021.push("Véro");

//Lire le tableau avec une boucle for -> la propriété lenght renvoie le nombre de lignes
for (let i = 0; i < gretaWeb2021.length; i++) {
	console.log(gretaWeb2021[i]);
}

//Lire un tableau avec la boucle for of
for (let stagiaire of gretaWeb2021) {
	console.log(stagiaire);
}

//Lire un tableau avec la méthode forEach()

//Une fonction anonyme s'éxécute à chaques passage de la boucle
//Son premier argument contient la valeur de la ligne en cours d'itération
gretaWeb2021.forEach(function (trainee) { //trainee contient la valeur de chaque ligne ~~ (as PHP)
	console.log(trainee);
});

//Créer un nouvel objet (pas de tableaux associatif en JS)

let person;
person = {
	//propriété : une valeur (tout type: string, number, object ...)
	firstName: 'Kakashi',
	age: 30,
	children: ['Naruto', 'Sasuke', 'Sakura']
};

//Accéder à une propriété
console.log(person.firstName);

//La boucle for in permet d'itérer toutes les propriétés d'un objet
for (let property in person) {
	console.log(property);
}

//Gestion des dates
let today;
today = new Date();
console.log(today);

//Afficher : Nous sommes le (n° du jour) (n° du mois) (Année sur 4 chiffres)

let options = { month: 'long' };

let day = today.getDate();
let month = today.getMonth(); //Renvoie le numéro du mois en partant de 0
//Affiche le mois en lettre en utilisant un constructeur d'objets permettant de formatter des dates et des heures selon une langue
month = new Intl.DateTimeFormat('fr-FR', { month: 'long' }).format(today);
let year = today.getFullYear();

console.log(month);

document.write(`Nous sommes le ${day} ${month} + ${year}`);