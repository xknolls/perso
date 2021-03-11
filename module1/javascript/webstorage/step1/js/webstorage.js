"use strict";

// Nom de l'item du localStorage
const ITEMSTORAGE = 'Liste de courses';

/* -------------------------- Fonctions utilitaires ------------------------- */

function getstorage(itemName)
{

    // Tabalal javascript
    let item;
    // Version JSON
    let itemJSON;

    // Récupérer la liste stockée ans le webstorage
    itemJSON = window.localStorage.getItem(itemName);
    
    // Si l'item du storage existe
    if ( itemJSON !== null ) {
        // Récupérer le tableau JSON en tableau javaScript
        item = JSON.parse(itemJSON);
    } else {
        // Sinon
        item = new Array();
    }

    return item;

}

function displayList() 
{
    let listProducts;
    listProducts = getstorage(ITEMSTORAGE);
}

/* -------------------------- fonction évennements -------------------------- */

function addProduct() {
    // Objet correspondant à un item de la liste 
    let product;

    let designation;
    let quantity;
    let packaging;

    // Tabalal javascript contenant les objets de la liste
    let listProducts;

    designation = document.getElementById('product');
    quantity = document.getElementById('quantity');
    packaging = document.querySelector('[name="packaging"]:checked');

    product = {
        'designation': designation.value,
        'quantiy': quantity.value,
        'packaging': packaging.value,
    }

    listProducts = getstorage(ITEMSTORAGE);

    // Ajouter le produit dans la liste 
    listProducts.push(product);

    // Sauvergarder le nouveau tableau dans le storage
    window.localStorage.setItem(ITEMSTORAGE, JSON.stringify(listProducts));
}

function clearList() 
{
    let confirm = window.confirm('Supprimer la liste ?')
    window.localStorage.removeItem(ITEMSTORAGE);
}

// Au chargement de la page exécuter le code une fois le DOM complètement chargeé
document.addEventListener('DOMContentLoaded', function () {

    let btnAddProduct;
    btnAddProduct = document.getElementById('add-product');
    btnAddProduct.addEventListener('click', addProduct);

    let btnClearList;
    btnClearList = document.getElementById('clear-list');
    btnClearList.addEventListener('click', clearList);
});