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
define('DB_NAME', 'afzallmiahphotography_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'TCNZSOoj6*~&zf:KR=vTOMPm|5{];WSh-=XQ=E<arXhA!0Cq~2[G<H}2MUvh<tw/');
define('SECURE_AUTH_KEY',  '5/u;scjG82/%UcoK)B!LT>(T9T5 -65;#=5~f<GFPMO$5cc:.[fVd<[2Kwd9k)$N');
define('LOGGED_IN_KEY',    '$t[V~K0`QmK!jZ+P|w}k^j~dKk *:}nts8*8!6Ie,J&F9;`mo<AG!k,1P~Uirdgl');
define('NONCE_KEY',        'IuN.Rg KUpuN#WLQa#7,SW,c9T!(W!@R$L8 +GgFBz/LA<%vD#@Gjr(Xr)uaFI]2');
define('AUTH_SALT',        '> dqnsu9J[=givyty.v0zo,sfW+vl~F1@CITx>s&jm%vre,RS},OIl|*Ec^FM29j');
define('SECURE_AUTH_SALT', 'h3/+,v6D;=QB>V2cW!=:6=2g#N|M*BYG/n#Mza1Q%Pb23f:+&$0Tvm30-@<TQxDj');
define('LOGGED_IN_SALT',   '>QyYIDZ,|DcD=N.4k N#8q|wQjprJ;4=OJcRaVhbjyLC) s-a24%nz3W,9rC4gm_');
define('NONCE_SALT',       'L-(M#r$a^bturFybeb#O|l=.y`7)`~e#p?;C&#d<[w42p2fQIMV>Y}{iC]AE~!3z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
