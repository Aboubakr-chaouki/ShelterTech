<?php 

/*
 Template Name: Home page
 */

get_header(); ?>

<section class="section-banner">
    <div class="container-intro">
       <h1>SHELTER TECH</h1>
       <h2>UNE SOLUTION POUR SÉCURISER VOS ÉQUIPEMENTS: <br> NOTRE SLOGAN <span class="color">ROBUSTESSE</span>, <span class="color">PROTECTION</span> <span class="color">PERFORMANCE</span> GARANTIES !</h2>
       <a id="btn-shop" href="#">Découvrez nos shelters</a>
       <a id="btn-blog" href="#">Visitez notre blog</a>
    </div>
  </section>
  <section class="section-categories">
    <div class="container-title-categories">
       <h3>Découvrez nos nombreux shelters</h3>
       <p>Tous nos shelters sont conçus en France par nos meilleurs ingénieurs et ouvriers qualifiés.</p>
    </div>
    <div class="container-categories">
        <div class="card-categories">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/catégorie-construction-shelter.jpg" alt="image du logo de shelter tech">
           <div class="container-text">
                <h4>Secteur du bâtiment</h4>
                <p>Shelters destinés aux secteurs de la construction.</p>
                <a href="#">Jetez un coup d'œil</a>
           </div>
        </div>
        <div class="card-categories">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/catégorie-agriculture-shelter.jpeg" alt="image du logo de shelter tech">
           <div class="container-text">
                <h4>Secteur de l'agriculture</h4>
                <p>Shelters destinés aux secteurs de l'agriculture.</p>
                <a href="#">Jetez un coup d'œil</a>
           </div>
        </div>
        <div class="card-categories">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/catégorie-santé-shelter.jpeg" alt="image du logo de shelter tech">
           <div class="container-text">
                <h4>Secteur du médical</h4>
                <p>Shelters destinés aux secteurs du médical.</p>
                <a href="#">Jetez un coup d'œil</a>
           </div>
        </div>
        <div class="card-categories">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/catégorie-énergie-shelter.jpg" alt="image du logo de shelter tech">
           <div class="container-text">
                <h4>Secteur des énergies</h4>
                <p>Shelters destinés aux secteurs des énergies.</p>
                <a href="#">Jetez un coup d'œil</a>
           </div>
        </div>
    </div>
  </section>
  <section class="section-contact">
    <div class="container-contact">
        <div class="container-info-contact">
            <h3>Des <span class="color">questions?</span> Contactez-nous</h3>
            <p>Notre équipe chargée du service client se fera un plaisir de répondre à vos demandes par mail ou par téléphone.</p>
            <a href="#">Contactez-nous</a>
        </div>
        <div class="container-contact-picture">
        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/Photo contact.jpeg" alt="image du logo de shelter tech">
        </div>
    </div>
  </section>
  <section class="section-avis">
    <div class="container-avis">
        <h3>Nos clients nous recommandent</h3>
        <div class="avis">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/logo batiment.png" width="100" height="100" alt="image de l'avis 1">
           <p>"Très bonne entreprise. J'ai acheté deux abris techniques pour mon matériel de bâtiment. Je recommande les yeux fermés, service client au top."</p>
           <div class="container-author">
              <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/avis1.jpeg" width="60" height="60" alt="photo de John LAMARD">
              <span class="color">Directeur John LAMARD</span>
           </div>
        </div>
        <div class="avis">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/logo avis 2.png" width="70" height="70" alt="image de l'avis 2">
           <p>"Excellent produit. J'ai installé des shelters dans ma ferme et ils sont très robustes. Le service après-vente est réactif."</p>
           <div class="container-author">
              <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/profil avis 5.jpg" width="60" height="60" alt="photo de Marie DUPONT">
              <span class="color">Agriculteur Jean DUPONT</span>
           </div>
        </div>
        <div class="avis">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/logo avis 3.jpg" width="100" height="100" alt="image de l'avis 3">
           <p>"Service impeccable et shelters de haute qualité. Utilisés dans le secteur médical, aucun problème à signaler."</p>
           <div class="container-author">
              <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/avis profil 3.jpeg" width="60" height="60" alt="photo de Paul MARTIN">
              <span class="color">Docteur Sophie MARTIN</span>
           </div>
        </div>
        <div class="avis">
           <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/logo avis 4.png" width="100" height="100" alt="image de l'avis 4">
           <p>"Je suis très satisfait de l'achat. Les shelters sont parfaits pour protéger nos équipements d'installations de panneaux solaires. Merci Shelter Tech."</p>
           <div class="container-author">
              <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/profil avis 6.jpeg" width="60" height="60" alt="photo de Sophie LEBLANC">
              <span class="color">Directeur Franck ROBERT</span>
           </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
