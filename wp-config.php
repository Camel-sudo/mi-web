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
define( 'DB_NAME', 'web1' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'abc123.' );

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
define( 'AUTH_KEY',         'I_7#wO3o1Z|2=Z-/ }}vic WOW`F,oC [:i%MkN}(s5%VqoC[&(F1W)RvK%dJmH@' );
define( 'SECURE_AUTH_KEY',  'nxj<=f]MxcWQOyoSjP=.n<J,6DXe0Wg!,7?ra^=(4B_6$8}]zTHbB4+B;^.H}x<z' );
define( 'LOGGED_IN_KEY',    '%L3759*@2olg~|zSJd2==U!ULj?StYhP^3|]A@S`)>Wf|2v64wa>uBHoCUG^0Qr=' );
define( 'NONCE_KEY',        'QU[L8SL;qm6&R4G|U;c5aYg5!q|%Qu+D!/GR]:MAq$|jp3`.)p6V*yp1gZ:q^~ao' );
define( 'AUTH_SALT',        '=7UOz.(#CMF18B!6~Q-B00G!>K%Q3Z*3,:)%s))J8H,P>M}WF0F}9332a!1./|54' );
define( 'SECURE_AUTH_SALT', 'bA+r!wCg]k~]8Ro;16@Ngy@7bI6Sf,=AeE;j=&7Th4Z{au8Yv;?J=.37H&LX>rq5' );
define( 'LOGGED_IN_SALT',   '7GAqwglX(de@RUg^RYZ-d9juz~{^2mmuCxRNR.nvroj@V9$aFMroRAaxkuHhNLAz' );
define( 'NONCE_SALT',       'U9im418$<J]`uuLtnN*dN6B7W0*LF$OBbD;nFd-+jV^%[7J8QN~y-q$t/eA;>1gS' );

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
