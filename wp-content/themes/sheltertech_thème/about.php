<?php
/*
 Template Name: About Page
 */

get_header();
?>

<section class="section-about">
    <div class="container-about">
        <div class="container-info-about">
            <h3>Qui sommes-nous ?</h3>
            <p>Jeune entreprise créée en 2020, nous sommes spécialisés dans la vente de shelters techniques pour tout type de secteurs d'activité. Nous offrons des solutions robustes, protectrices et performantes pour sécuriser vos équipements.</p>
            <a href="#">Visitez nos shelters</a>
        </div>
        <div class="container-about-picture">
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/picture/picture a propos.jpeg" alt="Image de Shelter Tech">
        </div>
    </div>
</section>

<section class="section-other">
    <div class="container-other">
        <div class="container-about-other">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2903.15135953131!2d5.400951476616769!3d43.311090824489746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s13%20boulevard%20mar%C3%A9chale%20juin%20marseille!5e0!3m2!1sfr!2sfr!4v1719949434902!5m2!1sfr!2sfr" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container-info-other">
            <h3>Nos horaires</h3>
            <p>Nous sommes ouvert du <span class="color">Lundi au vendredi de 9H à 17H30</span></p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
