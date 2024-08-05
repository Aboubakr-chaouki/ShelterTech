<?php

// Ajouter le support du titre de la page
add_theme_support('title-tag');

// Enqueue styles
function my_theme_enqueue_styles() {
    // Ajouter le fichier style.css du thème à la file d'attente des styles
    wp_enqueue_style(
        'main-styles', // Identifiant unique pour le style
        get_template_directory_uri() . '/style.css', // URL du fichier CSS
        array(), // Liste de dépendances (vide dans ce cas)
        '1.0.0', // Numéro de version pour la gestion du cache
        'all' // Média pour lequel le style est appliqué
    );
}
// Attacher la fonction my_theme_enqueue_styles à l'action wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

?>
