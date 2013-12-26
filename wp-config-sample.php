<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

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
define('AUTH_KEY',         'OP]7Cs]s{L?lBW}lGvWo)KSzN$Z19T]+{]_-/.=d6HP+M(=OK^U&t.mdoJ|8SwdH');
define('SECURE_AUTH_KEY',  '$#sB1pnrN)[oG++g(]Qc&#^!yreg,s#Qc^kxmH=+@}$YMFl`b*Z+h;.hG.+XFJD+');
define('LOGGED_IN_KEY',    'C4lpd{9Srsf<t#$V9Vg?xQ2Y p>++g@7C_}y)+Xh;!xddE&Ya:>@IQ{?z+yN4Ste');
define('NONCE_KEY',        'hj#|Y*}qU!+$KSx8II0j.JYXH @ez2G&C?&(;5`{omAzIEZw#<4-OlP5~|d^n%T ');
define('AUTH_SALT',        'v#C+rExcN1i)0(=8@kY%v~vMcxf&%T%BQ]W&E8qTg#@|%P{4K(1O-+.$%H82&~.+');
define('SECURE_AUTH_SALT', '2~9Qwu XLn+Dn0yAnu7.y-)&r~pL[m8ue*<or]1|]cX7t|kWnv!AlqIP7e),ni|!');
define('LOGGED_IN_SALT',   'cQ*E<stRqcH>.>el{`D=B(dY$6NTMi:[e5+>6*gK%k`v3Hl3hMGD bWzT]p{+X`<');
define('NONCE_SALT',       '|-Ww-|gxq:FvJ5+SKXw>p+tNE)7vNnMVJ=xl[lK7&v@r)4 p{+G[Xo4W}1^8NdSf');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'uk');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
