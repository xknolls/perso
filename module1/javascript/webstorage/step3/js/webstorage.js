"use strict";

// Nom de l'item du localStorage
const ITEMSTORAGE = 'Liste de courses';

/* -------------------------- Fonctions utilitaires ------------------------- */

function getstorage(itemName) {

    // Tabalal javascript
    let item;
    // Version JSON
    let itemJSON;

    // Récupérer la liste stockée ans le webstorage
    itemJSON = window.localStorage.getItem(itemName);

    // Si l'item du storage existe
    if (itemJSON !== null) {
        // Récupérer le tableau JSON en tableau javaScript
        item = JSON.parse(itemJSON);
    } else {
        // Sinon
        item = new Array();
    }

    return item;
}

function displayList() {
    let listProducts;
    let container;
    let ul;  // Elément ol 

    // Ciblerl le contenue de la liste 
    container = document.getElementById('list');

    // Récupérer la liste 
    listProducts = getstorage(ITEMSTORAGE);

    // Si la liste est vide 
    if (listProducts.length === 0) {
        console.log('vide')
        container.innerHTML = '<p>La liste es vide.</p>';
        // Sortir de la fonction (éviter le else)
        return;
    }

    ul = document.createElement('ul');

    // D'éléguer le gestionnaire d'évènement pour chaque lien sur le parent 
    ul.addEventListener('click', editProduct);



    // Pour chaque ligne, l'objet représentant le produit sera stocké dans un product
    listProducts.forEach(function (product, index) {
        let li;
        let link;
        let btnDelete;

        li = document.createElement('li');
        li.classList.add('list-product-item');

        // Lien permettant de modifier une ligne
        link = document.createElement('a');
        link.setAttribute('href', '#');
        link.classList.add('list-product-link');
        link.dataset.index = index;

        // Bouton pour delet une ligne 
        btnDelete = document.createElement('button');
        btnDelete.classList.add('btn-delete');
        btnDelete.textContent = 'Delete';
        btnDelete.setAttribute('id', 'btn-delet');

        // Insérer une ligne 
        link.textContent = ` - ${product.designation} : ${product.quantity} ${product.packaging}`;

        btnDelete.addEventListener('click', deleteProduct);

        // Ajout du lien dans la li
        li.append(link);

        // Ajout du boutton dans la li 
        li.append(btnDelete);

        // Insérer la li dans la ul
        ul.append(li);


    });



    container.innerHTML = '';
    container.append(ul);

}

/* -------------------------- fonction évennements -------------------------- */

function addProduct() {
    // Objet correspondant à un item de la liste 
    let product;

    let form;
    let designation;
    let quantity;
    let packaging;

    // Tabalal javascript contenant les objets de la liste
    let listProducts;

    form = document.getElementById('form-product');
    designation = document.getElementById('product');
    quantity = document.getElementById('quantity');
    packaging = document.querySelector('[name="packaging"]:checked');

    // Création de l'objet en récupérant les valeurs valeurs saisies
    product = {
        'designation': designation.value,
        'quantity': quantity.value,
        'packaging': packaging.value,
    }

    listProducts = getstorage(ITEMSTORAGE);

    if (form.dataset.edit == 'false') {
        // Ajouter le produit dans la liste 
        listProducts.push(product);
    } else {
        // Modifier le produit 
        let index = form.dataset.edit;

        // Modifier la ligne du tableau
        listProducts[index] = product;

    }

    // Sauvergarder le nouveau tableau dans le storage
    window.localStorage.setItem(ITEMSTORAGE, JSON.stringify(listProducts));

    // Actualiser la liste
    displayList();

    // Vider le formulaire
    document.getElementById('btn-reset').click();
}

function editProduct(event) {
    // L'élément sur le quel est installé le gestionnaire 
    console.log(this);
    // L'élément sur le quel on vas cliquer
    console.log(event.target);

    let index;
    index = event.target.dataset.index;

    // Vérifier si envent.target n'est pas un lien alors sortir de la fonction
    if (event.target.nodeName !== 'A')  {
        return;
    }

    // Tabalal javascript contenant les objets de la liste
    let listProducts;
    listProducts = getstorage(ITEMSTORAGE);

    // Récupérer la ligne du produit à modifier 
    let product;
    product = listProducts[index];

    // Les champs du formulaire
    let designation;
    let quantity;
    let packaging;

    designation = document.getElementById('product');
    quantity = document.getElementById('quantity');
    packaging = document.querySelector('[value="' + product.packaging + '"]').checked = true;

    designation.value = product.designation;
    quantity.value = product.quantity;

    document.getElementById('form-product').dataset.edit = index;

    document.getElementById('add-product').textContent = 'Modifier';
}

function clearList() {
    let confirm = window.confirm('Supprimer la liste ?')
    window.localStorage.removeItem(ITEMSTORAGE);

    // Actualiser la liste
    displayList();
}

function resetForm() {
    document.getElementById('add-product').textContent = 'Ajouter';
    document.getElementById('form-product').dataset.edit = 'false';
}

function deleteProduct() {
    // On appel notre taball
    let listProducts = getstorage(ITEMSTORAGE);

    // Recupérer les liens deu tablal
    let link = document.querySelectorAll('.list-product-link');
    console.log(link);

    // Récupérer l'index de nos liens
    let index;
    index = this.getAttribute('data-index');

    // Supprimer la ligne coreespondant à l'index du lien cliqué
    listProducts.splice(index, 1);

    // Sauvegarder le nouveau tablal
    window.localStorage.setItem(ITEMSTORAGE, JSON.stringify(listProducts));

    // Actualiser la liste
    displayList();

}

// Au chargement de la page exécuter le code une fois le DOM complètement chargeé
document.addEventListener('DOMContentLoaded', function () {
    let btnAddProduct;
    let btnReset;
    let btnClearList;
    let linksProducts;

    btnAddProduct = document.getElementById('add-product');
    btnAddProduct.addEventListener('click', addProduct);

    btnClearList = document.getElementById('clear-list');
    btnClearList.addEventListener('click', clearList);

    btnReset = document.getElementById('btn-reset');
    btnReset.addEventListener('click', resetForm);

    // Afficher la liste au chargement de la page
    displayList();

    linksProducts = document.querySelectorAll('.list-product-link');
    linksProducts.forEach(function (link) {
        link.addEventListener('click', editProduct);
    });
});