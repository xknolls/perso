<?php

require_once('models/functions.php');

$query_category = get_category();


$query_users = get_users();


$errors = array();
$add_post = array(
    'id_category' => '',
    'id_user' => '',
    'title' => '',
    'content' => ''
);


//var_dump($users);
//var_dump($_POST);
if (!empty($_POST)) {

    if (empty($_POST['id_category'])) {
        $errors['id_category'] = 'Veuillez choisir une catégorie ! ';
    }

    if (empty($_POST['id_user'])) {
        $errors['id_user'] = 'Veuillez choisir un auteur ! ';
    }

    if (empty($_POST['title'])) {
        $errors['title'] = 'Veuillez ajouter un titre ! ';
    }

    if (empty($_POST['content'])) {
        $errors['content'] = 'Veuillez ajouter un contenue ! ';
    }

    var_dump($_POST);
    var_dump($errors);

} 

if(!empty($_POST) && empty($errors)) {
    
    $add_post['id_category'] = $_POST['id_category'];
    $add_post['id_user'] = $_POST['id_user'];
    $add_post['title'] = $_POST['title'];
    $add_post['content'] = $_POST['content'];
    
    var_dump($add_post);

    add_post($add_post);

    header('Location:index.php');
    exit;
}


$template = 'add_post';
include './views/layout.phtml';

/*
 * faire le edit
 */