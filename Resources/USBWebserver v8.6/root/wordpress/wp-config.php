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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'usbw');

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
define('AUTH_KEY',         'Bzlx|o~~MxyZk>(|)8CP~-G:u2/=<1iIo9Iux:~naMmXq5r-j*&d#;nm=7M_kJ:3');
define('SECURE_AUTH_KEY',  'MiH-^ 1<fWb4NW,w*nDUWl%e]&R!5`SaX,*hrNCBFnFPr4`}0wA{|ZpejSSmRWL<');
define('LOGGED_IN_KEY',    'Km}=P@41mP6/gf]Ss(ddHCLW[JUE9_UMv8WX,q^!+PO[Y{?=dere[qv$LyCVO9e#');
define('NONCE_KEY',        '@K%$*^<GwrkURL8vIG=k3-j)oc,E`4YC#d</*Vs~WQ^:UGX=aA6iv3H1qCN;8W*d');
define('AUTH_SALT',        '6SQY6eY,7qf!-N-8y`L)IyKs-O{z+)`:R%w#8cV*%`g=BB@+&}X`B:r :CvY7lwd');
define('SECURE_AUTH_SALT', '6qH#l=SH)k*`acpuU`#c`(|P%Ez/+=J>9 l}hJ)}milBm,sn3%LU= QF<m<p!{@t');
define('LOGGED_IN_SALT',   'T|_<X(q%#g9(]w%kcR)K8W+ZMNBeB+YU|]NIviZ YzGRD:X56FQPtQciUiC]%U>i');
define('NONCE_SALT',       'IaR36`$qpAd>_Y`USt9i9P/XGq[?,iRn:4LU*-d_!z!Z~*M%I7f?qde!0{<hxzAG');

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
