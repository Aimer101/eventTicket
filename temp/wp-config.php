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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'areasmus_WP6DG');

/** Database username */
define('DB_USER', 'areasmus_WP6DG');

/** Database password */
define('DB_PASSWORD', 'QC^TEaE9S(ihU:mWj');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', '63f7b568378ab51c99f494890be5c38ebb20629009b3ec6e39a3abbe5d6d796c');
define('SECURE_AUTH_KEY', 'b578138ff6de24bfefe12156a0af7e50c38d878f4658bbebaf25674e85991fef');
define('LOGGED_IN_KEY', 'd6c0dd3c8dca35ab5700ee45e0b8e445dc2ce4f3562a766e2f01f5f9a972d256');
define('NONCE_KEY', '9ed61de1998bf247858a4b5c2bb8f71fa48d8475fb43d217e04591434409f4e7');
define('AUTH_SALT', '32e85c8f8460ada6835f026cbe1cbb0c10f69be5fcc75910d7321b6915897893');
define('SECURE_AUTH_SALT', '6a10cbc8f35cd9a52bcd69d96554ac36887b6fd11467b67a62dcf47023fb5519');
define('LOGGED_IN_SALT', 'dedc027d492fe759f1f534cf1f97aa29fd2eb182dfd8547a3930fabb8c9657db');
define('NONCE_SALT', '6b597c325d2c12cee705a50bec7031de42458106d7453755893ec00b00771946');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '0D4_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

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
