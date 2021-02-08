<?php

require_once('models/functions.php');


if (array_key_exists('id', $_GET) && (ctype_digit($_GET['id']))) {

    $query_category = get_category();
    
    $query_users = get_users();

    $query_post = get_post($_GET['id']);

    $post = $query_post->fetch();

}

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


    $edit_post['id_category'] = $_POST['id_category'];
    $edit_post['id_user'] = $_POST['id_user'];
    $edit_post['title'] = $_POST['title'];
    $edit_post['content'] = $_POST['content'];

    add_post($edit_post);

    header('Location:index.php');
    exit;
}







$template = 'edit_post';
include_once 'views/layout.phtml';
