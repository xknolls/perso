<?php

//Executer la fonction recipes_theme_support à l'activation du thème
add_action('after_setup_theme', 'recipes_theme_support');
function recipes_theme_support(){

    //Activer les images à la une 
    add_theme_support('post-thumbnails');

    //Activer les posts format
    add_theme_support('post-formats', array('aside', 'gallery'));

    //Nouveau format d'images
    add_image_size('medium-760-250', 760, 250, true);

    //Image d'en tête
    add_theme_support('custom-header', array(
        'flex-widht' => true,
        'flex-height' => true,
        'widht' => 1920,
        'height' => 1200,
        'default-image' => get_template_directory_uri() . '/img/mediterranean-cuisine_1920.jpg'
    ));
}

add_action('wp_enqueue_scripts', 'recipes_register_styles');
function recipes_register_styles() {

    // Déclarer le changement de normalize.css
    wp_register_style(
        'normalize', //Nom de la déclaration
        get_template_directory_uri() . '/css/normalize.css', // Chemin de la feuille de styles 
        array(), //Dépendance éventuelle (1 ligne par déclaration)
        '8.0.1'
    );

    wp_register_style(
        'style', //Nom de la déclaration
        get_template_directory_uri() . '/style.css', // Chemin de la feuille de styles 
        array('normalize'), //Dépendance éventuelle (1 ligne par déclaration)
        '5.0.0'
    );

    wp_enqueue_style('normalize');
    wp_enqueue_style('style');

}

add_action('wp_head', 'recipes_customize_css');
function recipes_customize_css(){

    $custom_header = get_custom_header();

    if (!empty($custom_header->attachment_id)) {

        $url_mobile = wp_get_attachment_image_url(
            $custom_header->attachment_id,
            'meduim-large'
        );

        $url_tablet = wp_get_attachment_image_url(
            $custom_header->attachment_id,
            'large'
        );

        $url_desktop = wp_get_attachment_image_url(
            $custom_header->attachment_id,
            'full'
        );
    }

    ?>
    <style>
        .home, .banner {
            background-image: url(<?= esc_url($url_mobile) ?>);
        }

        @media screen and (min-width: 768px) {
            .home, .banner {
                background-image: url(<?= esc_url($url_tablet) ?>);
            }
        }

        @media screen and (min-width: 1024px) {
            .home .banner{
                background-image: url(<?= esc_url($url_desktop) ?>);
            }

            .banner {
                background-color: black;
                background-image: url(<?= esc_url($url_desktop) ?>);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

        }
    </style>

<?php
}

//Activer les menus
add_action('init', 'recipes_menu');
function recipes_menu() {

    //Déclarer plusieurs emplacements de menus
    register_nav_menus(array(
        'primary' => 'Menu principal',
        'secondary' => 'Menu secondaire'
        
    ));
}