<?php

include('./models/models.php');

//var_dump($_GET['index']);

/**
* ouvrir le fichier csv en lecture et ecriture
* recuperer la ligne correspondante a l'index
* l'afficher dans un formulaire avec les valeurs correspondante
* TODO validation modifie la ligne du tableau et la met a jour
*		si le formulaire est posté
*			tester les champs saisis 
*			si erreur representer le formulaire et afficher un message
*			sinon modifier la	ligne selectionné				
*			
*
* TODO fermer le fichier
* TODO revenir sur l'index
*/

$contacts = load_contacts(DATAFILE);
$error = array();

if(array_key_exists('index', $_GET) 
	&& ctype_digit($_GET['index']) 
	&& $_GET['index'] < count($contacts) 
	&& $_GET['index'] >=0
) {
	
	//Convertir en nombre 
	$index = intval($_GET['index']) ;
	$contact = $contacts[$index];

	$form_datas = array(
		'index' => $index,
		'firstname' => $contacts[$index][0],
		'lastname' => $contacts[$index][1],
		'email' => $contacts[$index][2],
		'tel' => $contacts[$index][3],
	);
}
else {
	if(!array_key_exists('index', $_POST) 
	|| !ctype_digit($_POST['index']) 
	|| $_POST['index'] >= count($contacts) 
	|| $_POST['index'] <0
	) {
		header('Location : index.php');
		exit;
	}

	$index = $_POST['index'];
	$form_datas = $_POST;

	if (empty($_POST['firstname'])) {
		$errors['firstname'] = '* Le prénom est requis';
	}
	else {
		$contact['firstname'] = $_POST['firstname'];
	}


	if (empty($_POST['lastname'])) {
		$errors['lastname'] = '* Le nom est requis';
	}
	else {
		$contact['lastname'] = $_POST['lastname'];
	}


	if (empty($_POST['email'])) {
		$errors['email'] = '* Le courriel est requis';
	} 
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = '* L\'adresse n\'est pas au bon format';
	}
	//TODO aled
	elseif (in_array($_POST['email'], array_column($contacts, 2) ) && $_POST['email'] != $contacts[$index][2] ) {
		$errors['email'] = '* L\'adresse email existe déjà';
	}
	else {
		$contact['email'] = $_POST['email'];
	}


	if (empty($_POST['tel'])) {
		$errors['tel'] = '* Le tél est requis';
	}
	else {
		$contact['tel'] = $_POST['tel'];
	}
	
	$contacts [$index][0] = $form_datas ['firstname'];
	$contacts [$index][1] = $form_datas ['lastname'];
	$contacts [$index][2] = $form_datas ['email'];
	$contacts [$index][3] = $form_datas ['tel'];
	
	if(empty($errors)) {
		save_datas_csv(DATAFILE, $contacts);
		header ('Location:index.php');
	}
	
}




//var_dump($_POST);
//var_dump($contact);

include('edit.phtml');