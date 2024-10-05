<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'receitasparabolo' );

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
define( 'AUTH_KEY',         '=I4/P(t7u1_7mz6t5M~q^/qb$hh*su&~&F#9s(JPmm?072OBML@gA-0n9Dai~4nu' );
define( 'SECURE_AUTH_KEY',  'IX#4tTuud5h6,[i6nf##~>hjsOh#*oUx1.G8KwnxVW]ipks3G/T<=5UC)_eU|u6d' );
define( 'LOGGED_IN_KEY',    '8_)cT#p=pa~n`Vm$AA_d@[b n%,aV2V.4? kGo56`w,h/?v[wr$D?JqkXZajhvG#' );
define( 'NONCE_KEY',        ',D&5KW-(nx21-cbhiXZK6-s6HtI9.keB?v(sY&mq9WE ^v>%M<^U !Q>OY>fr@2/' );
define( 'AUTH_SALT',        '_*fm@lz|aa%frbwAA[Yz%~yW,>cP:{,^PFdp$6Tu9&JVc8aIJ{ANaX-Q`3SM&PE@' );
define( 'SECURE_AUTH_SALT', 'H]9>|v9BvxIVpAitdgOQIk-%pJuf`-a>qytUu%l&O!|5^KPz$?n&8HE&W6T([;jo' );
define( 'LOGGED_IN_SALT',   '8#.0M=<8c+l<vFGZBsnZ-U:BO81>?h;CW6+rlw<$|S(hK.L/>BjRPRx&~T0-OWLB' );
define( 'NONCE_SALT',       'u6sKv~)0e%$`!.=sqI?kay&/F5D4IBt=+k1,02r1Jm$q=qA02Ha76FPFip=&W}$[' );

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
