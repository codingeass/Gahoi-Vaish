<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gahoi');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'netbean');

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
define('AUTH_KEY',         '<fh|n/?<XjZ|^azJ],]sSw]-8vh2sj,K5<B:a|d/3jd?!N3@i5#(u~JR:IoR7Wjv');
define('SECURE_AUTH_KEY',  '(IA=bQ=vY_x_U.vQoME|18ep>hna~<68umS_` 9-Ea`5Y`q-P$&T7U|$]zLg70}Z');
define('LOGGED_IN_KEY',    'f2J<1kPDj0~CH;ia>!GL4Wk^ok|Zqcqu2[Xyn?-=3G!_Ix.Q/0DF7 h[#.-1~>[a');
define('NONCE_KEY',        'Q=ouz:d{gE]@Z52DgdkHG|_`_g9NI1g@Kk*91|=#ge,hIec|$~+ylo-t/G!tsi/q');
define('AUTH_SALT',        'jwo1nOVLQX/tKKkD^D4s5u7Dk[bNr**/|&C,)1[Bos5z%y=k9o]_O2xahd:NV%J0');
define('SECURE_AUTH_SALT', '(eP94B*a<uac|d%vIAi~.>$~>!TS.`nAeG.u/l*,VJDj9xB?(]/4#|Q V~P|CFUV');
define('LOGGED_IN_SALT',   'Z jX.kMN1~s-JcO+aLO#HSpjy4/>1bNV+I65:|0T;rB{K.y[apE$6-4(C=[9`NHa');
define('NONCE_SALT',       '17(,#:bxEmT{%_O}URLx fHlNBO| YCdh7ss-dTgbPSs9P ?:HQ`wEnC4MF/m.|8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
