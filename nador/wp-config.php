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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nador' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root2021' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '8Dd:bjp0)mJ8^-U{@<<Hd&Ai{;{WDIw*^|7/!{`Nbq?G@viB?5dL({kOKTj@s~!1' );
define( 'SECURE_AUTH_KEY',  ':!1*EBZB5 E`jN?iD#_GJdj|O-FS%vy4~>^s&Ln1Ny-ieFX<$|(} x/7%V+&} he' );
define( 'LOGGED_IN_KEY',    'B8:J.lywT<:35Yac5}{rBeo+7[5@{cR]<uUENAOc} c6vKjGgB3OXh#DwK5UII~|' );
define( 'NONCE_KEY',        'M([TK_D-;TXGL!x9R]]C/r9e-~j>%ZB0l&Kcwn,9U7+Vd:NnWUFx^gp2J<&Ck_m#' );
define( 'AUTH_SALT',        '~k`8J?Fw!mV|aWgVV(xZ%<Zfz[yQ P6Z^/YX`GQ*DfYCW.(]ON=oG$oq2rRK1BG`' );
define( 'SECURE_AUTH_SALT', '+0{RwmuQ(jZ.EQM+d7{FzE~8 VvJw_3b<Y8BV?To Iy.|`;!bKf+0<;m3W38&|k%' );
define( 'LOGGED_IN_SALT',   '6QhD(B01Qx}D tv2&zJB0=XSRr^~hGLANC`3d^ZI*UL2H4!I|*#Y|Q?]V<vA/#|v' );
define( 'NONCE_SALT',       '%O$l9>qX5bAv(L@aq%JFglgT6vb5xsH5cw-1cU ] F1a4Dqu/s_iAO;8V wk;5_|' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'na_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
