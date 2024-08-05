<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
</head>
<body <?php body_class(); ?>>
    <div class="container-top-header">
        <div class="container-reduc">
            <span>Profitez -10% pour toute nouvelle commande</span>
        </div>
        <div class="container-link">
            <a href="https://www.facebook.com/" target="_blank">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/icon-facebook.png" width="40" height="40" alt="image du logo facebook"/>
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/icon-instagram.png" width="40" height="40" alt="image du logo instagram"/>
            </a>
            <a href="https://www.linkedin.com" target="_blank">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/icon-linkedin.png" width="40" height="40" alt="image du logo linkedin"/>
            </a>
        </div>
    </div>

    <header class="container-header">
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
               <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/Logo Design.webp" alt="image du logo de shelter tech">
            </a>
        </div>
        <nav class="naviguation">
           <ul>
                <li><a href="http://localhost:8888/ShelterTech/ShelterTechWord/">Accueil</a></li>
                <li><a href="http://localhost:8888/ShelterTech/ShelterTechWord/1098-2/">A propos</a></li>
            </ul>
        </nav>        
    </header>
