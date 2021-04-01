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
define('DB_NAME', 'markois1917');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ']31]w{w7K.b2Fqgo65lsZ1w)Os1gW{@y;7Zzx`I.$pw=M`l{~- 9@<996Lv%llTE');
define('SECURE_AUTH_KEY',  'l_t|n$D~fty2J6Fh2`(cs|Oj,T.S5B+?hpI?j-+}e;96{fhV|aeaUh}P+^n;Kg@B');
define('LOGGED_IN_KEY',    '1)g9?kcoOFF.ST#h9:G%^XAP-iCc;;S-=<bL,:q1ps}imG-qO9Dy-TZ_FM`ZF0-$');
define('NONCE_KEY',        ')00/hp~x&(XUR<s)Lq&^8@{+D{`9ZRCp.h-Scnfm!k2hN;KyL1+*Tvzvz<yG1NPN');
define('AUTH_SALT',        'O$5<Y(+(eFWw$v?Qzy7;k_.>eI$EY]r2{o;YY;J@&:`@/.|` sm@{yq>NQkP)K4=');
define('SECURE_AUTH_SALT', 'ru~oJ{QHhxuJOR`4/4qrA/j$Y|`-Pu8)n>3?~oD4K(fY.!g$28d;;guj_~jl#=qv');
define('LOGGED_IN_SALT',   'Um^OVXCbFQ{:c)@V%bQr|Zh!WMxbJ3 d%UC88$a,@k|z&MudoUN}e4~I!>.xU0|k');
define('NONCE_SALT',       'cVy08^[~YuhSyVc*=c>hPalg=I+X_g(~W?7U~-C8n5F7{qf4^$}EJ]OP0f?ypaWX');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
