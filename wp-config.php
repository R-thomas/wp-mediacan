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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'wp_mediacan');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|m9 t|VxPWX+xMDNs|L7nV/V}(-;nxx/*_E}-:k8Jc8v|,xp.YWM2x1~_,uAd#4 ');
define('SECURE_AUTH_KEY',  'M@R$3PT{0P~m|-D]Xpw7zl+G{+ s8kR|b3-+C5FAXBSg7r6>.^^vp:%D*Y-aaZD&');
define('LOGGED_IN_KEY',    '{yDw8v{eRhCs!#@cPM,gPvw@D8[K+1|_%+Iy5%=~1<|rr(FF>{:E}!T?$&.6]jE4');
define('NONCE_KEY',        'AoWo+}ytSH?p2r)sR<<ihC!s_k`.vw=s7=d#r[T7|~!rJvQ]R|0w)x~xYhi4=e[V');
define('AUTH_SALT',        'Ugbgr3cK>|1W}l{e0V2w/x:L:`{aBdFw!j$Dfp{%<7~vG;Q:g~G6,r_Ku -ZS;$Y');
define('SECURE_AUTH_SALT', '2~ ?M#9:D35_<TE-q5|]#8a<u9GbV.$Osn3ho*g)D.W?jttAr&A-kMVud,2- $02');
define('LOGGED_IN_SALT',   '9Pc^-OJv$&EP&IYsiTNm7=%mC|-GPA]Pq{TW4Za%q?OT-?uNfTZ7W=))w;t u^W|');
define('NONCE_SALT',       'g+%(EX>{0TK@OjaAM53-ZhLa,m//j7FLI`1_xV9rrcBMGwv?tY%P<*iIz=7ir}-!');

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
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
