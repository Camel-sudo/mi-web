<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mi-web' );

/** Database username */
define( 'DB_USER', 'administrador' );

/** Database password */
define( 'DB_PASSWORD', 'administrador' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^gs1=j1vJ.|s9;.ZGZ7-6$a=X1O2R9}:`^GqmQ2sr]#;qjsa=5N~N]Xd`3!tI0U9' );
define( 'SECURE_AUTH_KEY',  'CRf(})4H[#*x]/&L>.p#b| K9Pv8oaT}.{lt`vP}wN!_=O>U2N%to-k[;#K3NMj,' );
define( 'LOGGED_IN_KEY',    'cPsj6y;GUBc%~:,X+c<n-31u(r-UdeqY:Ps9 psdaCvYV31:e!CtP2JPkB-K$@[z' );
define( 'NONCE_KEY',        'u}]bb&kVIqu5*eR]*SwG N4s3fR!;0H^@vH@:&(6hO].oBKpNjwz[i$aL(M:uM@b' );
define( 'AUTH_SALT',        ')Dm.36.ll8-&xhP ryq`!}T*{A=0e@$X7>)AwdcB[JCq0< /d]=tC0._!?V9!IPY' );
define( 'SECURE_AUTH_SALT', 'jc._((8kCUns,Zke`j}lna5q$gmop0~F^NWz_AdId/y/{A-lq5I~?.yPH?Q#nJ P' );
define( 'LOGGED_IN_SALT',   '=<}v7{~VaqvK-e{?rPmE@(45K_K:s7=I&en2`l_:ki64X~D~Hfl?Th.,eF@:uS#o' );
define( 'NONCE_SALT',       'XlIV1>y@qq{%Il#<#h]marxTR#W(+^CS$6V=%3<uIC)tNV&L+r:.HA, nv8N3CId' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
