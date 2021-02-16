<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?php bloginfo('name') ?></title>
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <!-- Les feuilles de styles sont déclarées depuis le fichier de fonctions : recipes_register_styles() -->
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>

    <header class="banner">
        <a class="site-logo" href="<?php bloginfo('siteURL') ?>"><?php bloginfo('name') ?></a>
        <p class="site-description"><?php bloginfo('description') ?></p>
        <?php 
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => 'nav',
                'container_class'=> 'banner-nav',
            ));
        ?>
    </header>