<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'WP_ShelterTech' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']NxK9H6K%lWjhFE[>I=6s@z:cm?tWs%Tl]Yk1*DNOS^WF(msdEroWZZmW&AVP/&!' );
define( 'SECURE_AUTH_KEY',  'Fw3A@>O<K[Kj;KrpOabsY-LF_SN>&SK@v)X I-FKg/}C!T{~fR!dY!HZr00Mq1/g' );
define( 'LOGGED_IN_KEY',    'e9]}5reS@}>gvIFe`:s7-;vm4}3h!4ImwI2<7e%l&(FcfZMl@3V!rz3?*]w?)lQq' );
define( 'NONCE_KEY',        'l[vW~^$GgwbjHmZu7!M~TxSlu0$`7WLG*u&- @qrhXK9r1r>rc#;<$sa3%05*2%o' );
define( 'AUTH_SALT',        '.@<:L%jnq7am/6+Mu0-Mje$6|]8Zfn,,!i 2[QHhu%Cf=LIjUVA%3E!rR_CTd5<O' );
define( 'SECURE_AUTH_SALT', 'XLaI4F<C_1<f1GX:82j>f45L ;8@d768#kprz~5(.hW3#{Fg#7h0K+BY^xk.NRM?' );
define( 'LOGGED_IN_SALT',   '&>F{Pnup@hfXlloE8Rq3DomsyMOgchQ8&NEfAhjL/TK>mX5/xvEWa`sp^g(DR)zE' );
define( 'NONCE_SALT',       'Zn1;okEi$l<P=amHqmUQbIcFzY[X^u&_D|mR=E}:eu<P>nx.naPd9j-%Z.0L=in*' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '256M');



/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
