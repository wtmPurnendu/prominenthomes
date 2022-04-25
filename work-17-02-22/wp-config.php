<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webtezpn_wp350' );

/** MySQL database username */
define( 'DB_USER', 'webtezpn_wp350' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ws0.p9T.S6' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tfvxngsqp8thpeboz5i6lpa7cyc69dbhthxqw4fxtu7xwo029jh2ky930gzvmzoq' );
define( 'SECURE_AUTH_KEY',  'qtozxghep1lgrqvexlkqhq7w5nhlpwco0ptu6x90cojqbvkm9nhz8wlguc9o0oqz' );
define( 'LOGGED_IN_KEY',    'prelonpc97grelta4khqvhouks7jcqw4s3bdaegehixcorbj18zxusxjiiybqr30' );
define( 'NONCE_KEY',        '7kkdsscryxwr92921o0ha86zpfrcrb47xws1itnaedkecoge2bwcxw6y34gsyb9c' );
define( 'AUTH_SALT',        'ptkz1uio2tztkybwll5en8mmzkldsjghdlj2cptl69qdahvz1cl5nppdwx2a3gok' );
define( 'SECURE_AUTH_SALT', 'govzqlijsso3l5qkdbhqfomg1k0i1lskhnnxbfzrarrsoclmpp20o4acoj2rwngd' );
define( 'LOGGED_IN_SALT',   'qfwj6i0exrya7femeuipueojo1iaegsa2myosutlaxvbppsnztonyshy4orzcrso' );
define( 'NONCE_SALT',       'mjmewikylqvfbt50rm9zapszyexvnad88o7qvlw5e8wljsiv9qzkst52raeofpwh' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpxd_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
