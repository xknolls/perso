"use strcit";

// Créer un cookie
document.cookie = "name=Steve";

// Spécifier le nom dez domaine sur le quel el cookie est géré
document.cookie = "user=Bidule;domaine=quentin.greta";

// Par défault, le cookie est accessible sur la page courante
// Spécifier le chemin
document.cookie = "user2=Eren;path=/";

// Durée de vie : expires 
// Définir un délai d'expiration de 2 jours, par exemple
let today;
today = new Date();

// getTime() renvoie le nombre de ms correspondant à une date
console.log(today.getTime());

// Redéfinir la date 
today.setTime( today.getTime() + (2*(24*60*60*1000)));

// La date au format GMT
console.log(today.toGMTString());

// voir tous les cookies
console.log(document.cookie);

// Sécurité

// Sécuriser le cookie httpOnly=true -> le cookie ne sera pas accessible par javascript
document.cookie = "user3=Léon;httpOnly=true;domaine=quentin.greta;expire=" + today.toGMTString();

// Sécuriser le cookie httpOnly=true -> le cookie ne sera pas accessible par javascript
document.cookie = "user4=Quentin;httpOnly=true;domaine=quentin.greta;expire=" + today.toGMTString();

// samesite=strict interdit le cookie si l'utilsateur arrive d'u autre domaine
document.cookie = "user5=Robin;httpOnly=true;samesite=strict;domaine=quentin.greta;expire=" + today.toGMTString();

/**
 * WEBSTORAGE   
 * Stocker des données : 
 * - pourvant être structées
 * - plus grande capacité de stockage dépend du système/navigateur (environ 5 Mo par domaine)
 */

// Stockage de session
window.sessionStorage.setItem('user', 'Zeubi');

// Stockage persistant 
window.localStorage.setItem('user', 'Zeubi');

// Récupération 
let user;

// MéthodegetItem()
user = window.sessionStorage.getItem('user');
console.log(user);

// Accéder à la clé est possible aussi 
user = window.sessionStorage.user;
console.log(user);

// Stocker un nombre 
window.sessionStorage.setItem('id', 1);
console.log(window.sessionStorage.id);

// Remarque : le storage stock uniquement des chaines de caractères
console.log(typeof window.sessionStorage.id);

// Détruire un item 
window.sessionStorage.removeItem('id');

// Vider tous le storage
window.localStorage.clear();

// stocker des donées structurées dans une chaine : le format JSON

// stocker un objet contenant les informations  d'une personne 
let person;
person = new Object();
person.firstname = 'Eren';
person.lastname = 'JAGER';
person.id = 1;
person.children = ['Elsa', 'Thomas'];

console.log(person);

// Il s'agit d'un objet 
console.log(typeof person);

// Transformer cet objet en chaine JSON
let personJSON;
personJSON = JSON.stringify(person);

// Il s'agit bien d'une chaine 
console.log(typeof personJSON);

// Stocker personJSON dans le sessionStorage dans un item user 
window.sessionStorage.setItem('user', personJSON);

// Récupérer la chaine JSON u storage et la traduire en objet 
let itemJSON;
let item;

itemJSON = window.sessionStorage.getItem('user');
// Il s'agit bien d'une chaine 
console.log(typeof itemJSON);

item = JSON.parse(itemJSON);
// il s'agit d'un objet javaScript
console.log(typeof item);
