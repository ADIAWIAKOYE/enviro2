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
define('DB_NAME', 'epiz_32971754_w524');

/** Database username */
define('DB_USER', '32971754_1');

/** Database password */
define('DB_PASSWORD', '(8n]YBS40p');

/** Database hostname */
define('DB_HOST', 'sql301.byetcluster.com');

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
define( 'AUTH_KEY',         'szwtoyzwclkglfhe7xvaqkykpa68pbeib6jk1luwm3fz9qhslz9kiseu1ux32cos' );
define( 'SECURE_AUTH_KEY',  'bzalslbjhz7tt2ke1chgie2curl5zxrluuhaylrf4jdtxs4gqq3kqqqfedqzd2at' );
define( 'LOGGED_IN_KEY',    '47ooogyuv1ggoeaippwqwk72k3x0gx6vxliqzo1x3tdfjbnsjbprl8liprqr147p' );
define( 'NONCE_KEY',        '3ro4g4syqh9selp91gjpnqvox2kgtxdrp1yzet5caekghpflll48uo3jd6xswxwp' );
define( 'AUTH_SALT',        '7lotmvmv3w4tpvlxpk38qvdjpen5ndktnvw0h8shafje5snfc81swecgubmw3i4m' );
define( 'SECURE_AUTH_SALT', 'yg3fqkbe6yweuvgb00fnvkl2hdulctzuz6ylsmvpeghhrler9xyujmc1rjrd2fkf' );
define( 'LOGGED_IN_SALT',   'g2k0egccsulqkpjto8ilwe5ephp29h5hgdh6xvvntxkoz0uspepn1aknalggwosa' );
define( 'NONCE_SALT',       'rqnws2bwltyyjzrl7qjlaz8ukyvgmylwnvamhbd4srby0nfuh6ybimzfjaljl8wn' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp6y_';

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
