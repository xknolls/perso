<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_recipes' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'admin' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '1302' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'e^D5&0=x#^>-Uf=<2kt2 Be&v**mU`{jQmtPu.TSrV%GljKf,x2 z8A:jmizFoh(' );
define( 'SECURE_AUTH_KEY',  '2=h wHbR5*<&D!iM%ehL,moqD]dMXC5*WTvua4o(GqsK9iJ$UBy#79>yEm@aM*}Y' );
define( 'LOGGED_IN_KEY',    '4mI)$1K$T[{0YiZb~Ln2+I7er uVeljK2EuH6ABa317$vOVJVeFj9h:v[6hYY?ht' );
define( 'NONCE_KEY',        'zLse` `NqQVc/?|:~>x/fK~1UDX~#XYCag09ZWP$eJbqnWZ`L[:3sdw89>#z_u$A' );
define( 'AUTH_SALT',        '62Jg]4Q].^b-6$Gt7:U,1~E<ufVzxwsO|2/D8iwIta<6!Ac8O4,Y^+,HQ)#*Vy$!' );
define( 'SECURE_AUTH_SALT', '2_^M,*VdD^6kMB-RHK|-?wl:%{KD&P{VC)1wKn37>2d$Z2BAo:E6e.s 4!MXqI7y' );
define( 'LOGGED_IN_SALT',   '&bO|Zti-HsF<aqsOc;*3&)M>y:kDxm[D^.t]2aC*N+e&7on(uv2/+=`KUCn.!ueT' );
define( 'NONCE_SALT',       'QqAaic~O;>F0F[BTDu(8hp=$-|-@<Hwph:lXkt3J>hnF{8o6chF4|0Ib4*PQY)yf' );
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
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
