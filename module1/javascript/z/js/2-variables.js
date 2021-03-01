//déclarer une constante

//il faut affecter une valeur au moment de la déclaration
const MACONSTANTE = true;
console.log(MACONSTANTE);

//déclarer une variable avec var -> portée globale

//on peut déclarer une variable sans lui donnet de valeur
var toto;
toto = 'enfin, on utilise toto !'; //on peut ecrire : var toto = 'enfin, on utilise toto !';
console.log(toto);

//déclarer une variable avec let -> portée de bloc
let firstName = 'Mikasa';
console.log(firstName);

//concaténation en JS
document.write('je m\'appelle ' + firstName + '<br>');

//attention avec les calculs
console.log(2 * 3);
console.log(2 + 3);

document.write('Résultat = ' + 2 * 3 + '<br>');//le calcul se fait
document.write('Résultat = ' + 2 + 3 + '<br>');//le calcul ne se fait pas
document.write('Résultat = ' + (2 + 3) + '<br>');//mais la oui

//démonstration de la portée
let n1 = 1;

//définir une variable à l'interieur d'un bloc (le test)
if (n1 == 1) {
	let n2 = 2; //la portée de n2 est dans le test
	var truc = null; //type null
}

console.log(truc); //truc est globale

//gestion des erreurs: toujours avoir le nez sur la console
console.log(typeof n2); //renvoie undefined
console.log(typeof truc);

console.log(n2); // n2 locale au test -> renvoie une erreur
console.log('Ne s\'affiche plus');

/**
 * Types de variables :
 * 	string
 * 	number
 * 	bigInt (nombre supérieur à 2⁵³)
 * 	bolleen
 * 	undefined
 * 	null
 * 
 * Notion de hosting(remontée)
 * 	Les variables sont remontées en haut de leur fonction ou de leur bloc d'instruction
 */