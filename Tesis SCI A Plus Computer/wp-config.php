<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i4248647_wp2' );

/** MySQL database username */
define( 'DB_USER', 'i4248647_wp2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'K.bi86HHZ3vkmx86uUj70' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zYYX9TwYRmyBaJN3vtvO78ARoYPcNrVxjrP7YZwoJRDSsYmLBPXLm1oa3CIttN8q');
define('SECURE_AUTH_KEY',  'z6QjFIdKSZGiQofebWO2UflWu139jecnKAVHWzw5TtmPJ41WcrOzozJF5bpXBJ33');
define('LOGGED_IN_KEY',    'Pjs8uYkoW6nzf9wWkaq6DmFrahJh0tzty0R6Q5luStBkDxZTb84aGY2HGFiSBJCs');
define('NONCE_KEY',        'KYZTHhIMIps4ZFN9tzudg6GDFMbX3Z3t7UiIweSvGy7TY9RZKmLLvYDiZa190N3B');
define('AUTH_SALT',        'MJAZtwPqv3Dx1OPPgYfQikP8YtabQi6juEadAa6iehTaBfK34LCErGfvn0rqq0WB');
define('SECURE_AUTH_SALT', 'mVpFGouAmjmFBWXx5LFaNxWsfJKdsCUMoeAbotWSSJEAukafpaMFFpQv85ojZzJR');
define('LOGGED_IN_SALT',   'rfOY0QzjMKSp0yfb1XVbFcHhqhxgzteSPmJtLuyGnRdLsDsHzKfgQp6so6MNdfGs');
define('NONCE_SALT',       'KRJl1NaUjhRutSgZItuGTNdcvvcB15Q8CBAOm3Ee6P20RDpdF9tweReocj9KGJNI');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
