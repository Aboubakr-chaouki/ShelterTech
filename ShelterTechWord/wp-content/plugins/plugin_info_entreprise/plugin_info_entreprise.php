<?php
/*
Plugin Name: Mon Plugin Informations Entreprise
Description: Affiche les informations de l'entreprise avec un shortcode.
Version: 1.0
Author: Aboubakr Chaouki
*/

defined('ABSPATH') || exit;

add_action('admin_menu', function() {
    add_options_page(
        'Informations de l\'entreprise', 
        'Informations de l\'entreprise', 
        'manage_options', 
        'entreprise-info', 
        function() {
            ?>
            <div class="wrap">
                <h1>Informations de l'entreprise</h1>
                <form method="post" action="options.php">
                    <?php
                    settings_fields('entreprise_info_options_group');
                    do_settings_sections('entreprise-info');
                    submit_button();
                    ?>
                </form>
            </div>
            <?php
        }
    );
});

add_action('admin_init', function() {
    $fields = [
        'entreprise_nom' => 'Nom de l\'entreprise',
        'date_de_creation' => 'Date de création',
        'secteur_activite' => 'Secteur d\'activité',
        'email' => 'Email',
        'telephone' => 'Téléphone',
        'adresse' => 'Adresse',
        'code_postal' => 'Code postal',
        'ville' => 'Ville',
        'pays' => 'Pays'
    ];

    foreach ($fields as $field => $label) {
        register_setting('entreprise_info_options_group', $field);
    }

    add_settings_section('entreprise_info_section', '', null, 'entreprise-info');

    foreach ($fields as $field => $label) {
        add_settings_field($field, $label, function() use ($field) {
            $value = esc_attr(get_option($field));
            if ($field === 'adresse') {
                echo "<textarea name='$field'>$value</textarea>";
            } elseif ($field === 'date_de_creation') {
                echo "<input type='date' name='$field' value='$value' />";
            } elseif ($field === 'email') {
                echo "<input type='email' name='$field' value='$value' />";
            } else {
                echo "<input type='text' name='$field' value='$value' />";
            }
        }, 'entreprise-info', 'entreprise_info_section');
    }
});

add_shortcode('entreprise_info', function() {
    $entreprise_nom = get_option('entreprise_nom');
    $date_de_creation = get_option('date_de_creation');
    $secteur_activite = get_option('secteur_activite');
    $email = get_option('email');
    $telephone = get_option('telephone');
    $adresse = get_option('adresse');
    $code_postal = get_option('code_postal');
    $ville = get_option('ville');
    $pays = get_option('pays');
    $image_url = plugin_dir_url(__FILE__) . 'picture/Logo Design.webp'; 

    ob_start();
    ?>
    <div style="background-color: black; border-radius: 10px; width: 400px; border: 4px solid #fd8f14; color: white; padding: 10px 10px 10px 10px;">
        <h2 style="color: #fd8f14; font-size: 25px;">Informations de l'entreprise</h2>
        <img style="display: block; margin: 0 auto; width: 130px; height: 130px; border-radius: 5px;" src="<?php echo esc_url($image_url); ?>" alt="image du logo de shelter tech">
        <p><strong style="color: #fd8f14;">Nom :</strong> <?php echo esc_html($entreprise_nom); ?></p>
        <p><strong style="color: #fd8f14;">Date de création :</strong> <?php echo esc_html($date_de_creation); ?></p>
        <p><strong style="color: #fd8f14;">Secteur d'activité :</strong> <?php echo esc_html($secteur_activite); ?></p>
        <p><strong style="color: #fd8f14;">Email :</strong> <?php echo esc_html($email); ?></p>
        <p><strong style="color: #fd8f14;">Téléphone :</strong> <?php echo esc_html($telephone); ?></p>
        <p><strong style="color: #fd8f14;">Adresse :</strong> <?php echo esc_html(nl2br($adresse)); ?></p>
        <p><strong style="color: #fd8f14;">Code postal :</strong> <?php echo esc_html($code_postal); ?></p>
        <p><strong style="color: #fd8f14;">Ville :</strong> <?php echo esc_html($ville); ?></p>
        <p><strong style="color: #fd8f14;">Pays :</strong> <?php echo esc_html($pays); ?></p>
    </div>
    <?php
    return ob_get_clean();
});
