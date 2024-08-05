<?php wp_footer(); ?>
    <footer class="container-footer">
        <div class="container-column">
            <a href="<?php echo home_url(); ?>">
                <img id="logo" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/picture/Logo Design.webp" alt="image du logo de shelter tech">
            </a>
            <div class="container-link-footer">
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
        <div class="container-link-nav">
            <h4>Liens</h4>
            <ul>
                <li><a href="http://localhost:8888/ShelterTech/ShelterTechWord/">Accueil</a></li>
                <li><a href="http://localhost:8888/ShelterTech/ShelterTechWord/about.php">A propos</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <div class="container-address">
            <h4>Adresse</h4>
            <address>
                <a href="mailto:Sheltertech@gmail.com">ShelterTech@gmail.com</a><br>
                <a href="tel:0411223344">0411223344</a><br>
                <a href="https://www.google.com/search?q=13+boulevard+mar%C3%A9chale+juin+marseille&sourceid=chrome&ie=UTF-8">13 Boulevard Maréchale Juin <br> 13005 <br> MARSEILLE</a>
            </address>
        </div>
    </footer>
</body>
</html>
