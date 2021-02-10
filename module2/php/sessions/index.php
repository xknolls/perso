<?php

$message = '';

$users = array(
    array(
        'login' => 'knolls',
        'pass' => '$2y$10$v1lLeyadtzEyHVRa.XWFcutz5VoVm3ECelj6NPq.kUntlis7k0sGW'
    ),
    array(
        'login' => 'sneadz',
        'pass' => '$2y$10$My/qz1HJAAt.jAqxDBwGpeuQCb18pp2zq4mbL7AjWfiiKp6lwGf2m'
    ),
);

if (array_key_exists('login', $_POST)) {

    foreach ($users as $user) {
        if (
            $_POST['login'] == $user['login']
            && password_verify($_POST['pass'], $user['pass'])
        ) {
            session_start();
            $_SESSION['login'] = $user['login'];
            header('Location:admin.php');
            break;
            exit;
        }
    }

    $message = 'Erreur d\'identification';
}


include 'index.phtml';
