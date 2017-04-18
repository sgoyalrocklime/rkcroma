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
define('DB_NAME', 'cromalam');

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
define('AUTH_KEY',         ':_*bw1pBYIABa8dkOR|Pp6ES!uk]we{* gXQ3V6UFwJe08dn8H^dbepHeB.^?HW;');
define('SECURE_AUTH_KEY',  'AK|A4TyeI5E%g1_dti=#?, {.d[cqcxYu+(.OwNV~=D<W&M{p.5MBNKEJ>ou!pvG');
define('LOGGED_IN_KEY',    'x`.:N,q<by?aH/tIriC-I6LRsM$ehJmcjK=mPLBo|jzx&+LEgbR}Oz2Lm>8SiQ=-');
define('NONCE_KEY',        'qNJ`|/SD0Yn%ElV![V,T!rrK}Rbh)nBzS!LTF~(VcH0~4,E*4/24Pj_.SD:Y^;5)');
define('AUTH_SALT',        '_K8`GOJYza.y7:PX(?,t:-9ec%}.kGE2[DsoS,JI?Fd!k)UE=Qx(s;PvAK@X$rOD');
define('SECURE_AUTH_SALT', '*Gw<I(ums@)xKb-qW{)dewQb;|YS%7vi^r%W4;zS;2^W>.CI#YP.L}?Wa({[KMwE');
define('LOGGED_IN_SALT',   'qrAGm(8>rU<nf8V~[Z3Y70m#{3!)C6m3Xt+`#55~}chcgR3ObupC*+N.06}=Io[F');
define('NONCE_SALT',       'Hk`ZOAzblSgi^*Yq)MP8^9~M^KtoNy`Y@Q(f58h4URlvSRkZHAn6md<@Er]fdnBR');

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
