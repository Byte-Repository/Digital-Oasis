<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio_database' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', '' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
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
define( 'AUTH_KEY',         '%E.=QD#Y)$G~H--<+dOfv:r.:Cn8h;xlmhZ]xp{V*2I6A5B$+Tm7l* FiDaFB18e' );
define( 'SECURE_AUTH_KEY',  'DmO/}IQ#*y0+ipzB;gcX6{}qS)NICG_et<!XcI8r$0W8Apom85GGvJ%<0b+3h>wx' );
define( 'LOGGED_IN_KEY',    'Ur?$II0.J#aOu,LRJ6F%fSlV$z=0Rg3M{{@74-N m,AlRN6$~F-x!.Zk&R4|q1zJ' );
define( 'NONCE_KEY',        '4BA4N())>V.F@CCF]GU]c6+I?tLT/27M!&%d%WRtV;.H0MHW8vO0WpcvyCB)j4-|' );
define( 'AUTH_SALT',        '!M^oUd[n[6-]?>Zl&953]tB|u,-?6fc%GN%vS[-GR|xmihV:}apP/&)D[iS/l,5N' );
define( 'SECURE_AUTH_SALT', 'JG[Inj~VjS=D|E$#c+~[Az)WzB@EgqT< ,1./m})*^;ZF,clOQ@[c+a.Q9f*%4)&' );
define( 'LOGGED_IN_SALT',   'PaGQf@akotgfsxi&cQ#5xPxK>(eI?t2;ehJ$LdK_[&3;~q`!Pa:$MA@7^9Xfnvi[' );
define( 'NONCE_SALT',       'd=Y]Kblj|L6Teo5LT6,WYome|Pg~ ;Dve=rq@t>_)5ny~4^*)2up!i-w!jb+<4^Y' );
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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