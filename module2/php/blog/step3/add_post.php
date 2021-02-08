<?php

require_once('models/functions.php');

$query_category = get_category();


$query_users = get_users();
$users = $query_users->fetchAll();
var_dump($users);




if (!empty($_POST)) {
    var_dump($_POST);
    $add_post = array();

    $add_post['id_category'] = $_POST['id_category'];
    $add_post['id_user'] = $_POST['id_user'];
    $add_post['title'] = $_POST['title'];
    $add_post['content'] = $_POST['content'];

    add_post($add_post);
}


$template = 'add_post';
include './views/layout.phtml';

/*
 * faire le edit et faire le add
 * 
 *  
 */