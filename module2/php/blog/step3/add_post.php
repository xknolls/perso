<?php

require_once('models/functions.php');

$query_category = get_category();


$query_users = get_users();
$users = $query_users->fetchAll();


$errors = array();
//var_dump($_POST);
if (!empty($_POST)) {
    /*
    /*if (empty($_POST['id-category'])) {
        $error['id_category'] = 'Veuiller choisir une catégorie ! ';
    }

    if (empty($_POST['title'])) {
        $errors['title'] = 'Veuillez ajouter un titre ! ';
    }
    if (empty($_POST['content'])) {
        $errors['content'] = 'Veuillez ajouter un contenue ! ';
    }
} elseif(!empty($_POST) AND empty($errors)) { */


    $add_post['id_category'] = $_POST['id_category'];
    $add_post['id_user'] = $_POST['id_user'];
    $add_post['title'] = $_POST['title'];
    $add_post['content'] = $_POST['content'];

    add_post($add_post);

    header('Location:index.php');
    exit;
}


$template = 'add_post';
include './views/layout.phtml';

/*
 * faire le edit
 * 
 *  
 */