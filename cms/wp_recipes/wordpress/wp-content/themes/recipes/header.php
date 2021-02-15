<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?php bloginfo('name') ?></title>
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/css/normalize.css">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>

    <header class="banner">
        <a class="site-logo" href="<?php bloginfo('siteURL') ?>"><?php bloginfo('name') ?></a>
        <p class="site-description"><?php bloginfo('description') ?></p>
        <nav class="banner-nav">
            <a href="">Un lien</a>
        </nav>
    </header>