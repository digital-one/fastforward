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
define('DB_NAME', 'fastforw_dev');

/** MySQL database username */
define('DB_USER', 'fastforw_dev');

/** MySQL database password */
define('DB_PASSWORD', 'p455w0rd');

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
define('AUTH_KEY',         'hEw()3X}`P{i`91yWdb-i4OyO(R+06]q<@J5i+&=/e?(f)f~!:%VVfeZ]i3akB|=');
define('SECURE_AUTH_KEY',  '8`(+:%lwJP<c#D8 z]b4c^h7%]=toI5^vt9cO`:n~KU3XVBvsz0PtYj|LRGp8+7l');
define('LOGGED_IN_KEY',    ';n+HYhITk:lu*Ue923!wMd^MdMoXuzi9TVxm,<V{YE87L++bQ/IE|_&.{[j^[+|T');
define('NONCE_KEY',        '/nqJdbWF2:X:0~O9h0J*!;o2hnDc+mH&Qz6&bHb~V!65VxKBbdf0,O V<..P3E9^');
define('AUTH_SALT',        '0_~5f}js 5QkpTlm[2tL&BL_G,f=<[Oc{?l1Q==86e>B2Y&le41-^0%-H>J(JlR2');
define('SECURE_AUTH_SALT', 'sx-BBD#0Q_pH>|nmIpLi3qARrF:?Eu u=Y(t@ok<Wiat6NH7<r~#U_EvFE/,<:-@');
define('LOGGED_IN_SALT',   '.n-FztBC8<BT0>Ec %[dS|[>nOm]8_@vU$(RfVI_Rgq=<w}6 q-m03+>+/b:TVK:');
define('NONCE_SALT',       'mop?.,Fe&gFksD9G%hF+BsJhgOXf yBF3[!6HD&@^aoY~=?*@W4jZwJFU!$aKA6Z');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
