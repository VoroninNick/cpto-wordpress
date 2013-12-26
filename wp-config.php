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
define('DB_NAME', 'nazar_cpto');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'casper12345');

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
define('AUTH_KEY',         '7P=qAd8SngAN_=Hsxbga/I`&i*72=Gp8+ZB0R<$y?R(Zn6@Yed6Su_E(lfh[w/yJ');
define('SECURE_AUTH_KEY',  '%2~>T3qh- `>c5dEE!3wO{54Sj6dO/1,u-RI^Ieo><Z8/+L>J8V.O%<nVAsJm#;7');
define('LOGGED_IN_KEY',    'fpBH1FTzF0cgf;/F3~#u+bR0/)t.k(^|_?I/[+@0IgS0b5^|PE6Wp^rcgTkAm!^B');
define('NONCE_KEY',        'Ht&0C13M(0N~:CyliwD:EwiG hFnELNfzPW,7-d<4T3)<UhQ0!`UR-H^H}F<H>`3');
define('AUTH_SALT',        'K|5sz mkW_a_[YV)x!C!Gmj;WHR]biVd]J=U1|F652v[,#%x{d;08R U,=nS%]kG');
define('SECURE_AUTH_SALT', '1d=U /]5uTIG[+UVegB-KF:riz*cM Q) Z_~#M)RWZ9:5q)mI;]E2S5y,Yzi11U]');
define('LOGGED_IN_SALT',   'QeUd=8rM%p3$>f!o{N2]*G(bkX@Oqy&:/~K6>;6Eh8LSgVW1eV*k7UTDe6=$w{^a');
define('NONCE_SALT',       ';g[}!NC(TQby4*oj]I+62v?(*PDYIZ61kK=~ in-K?eXDHIoc_]0xkWG44[4ir-c');


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
