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
define( 'DB_NAME', 'fanwave' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '%g}Nqo:Se$+? cU8fJRW:q<ESGnu $!O;B(|[-%Gob@K0p3@Bd(cN>9T9Jx4<6[R' );
define( 'SECURE_AUTH_KEY',  '7Yp{^d~w9:qpVI4`p5X:lAPw,nwHLr,^1L}3Vtf z6Aa>!R`tYOO:p)&u_3u%kwf' );
define( 'LOGGED_IN_KEY',    'uMJtz~IVe.i>T(9H4C[.g GxtNr,q!05|-Qs17kx;28o%1oU2PW1>GpRp.o F75i' );
define( 'NONCE_KEY',        '8tp3n-Yo]QOQ:UdLs~@at$D[- %?qv/aROWW$R2iR8ES894zH)gH<hW9rqr>Opp(' );
define( 'AUTH_SALT',        'f=qDB<b*JxU3c%tEAV[dPx#$R.@W+Gb%7go^UR(/g,?i$X4zFwv<yd8}Es|}O|]S' );
define( 'SECURE_AUTH_SALT', 'sj@I=b}iMM+KC@7]vnYd@& axc.~5I(;#wz2B!B}IjvHa(5/@VvmqD2h,Off 2w@' );
define( 'LOGGED_IN_SALT',   '%<~#G`_C19PnnzC*b8imO Lx}PQdq21u)N!6UMt`S{JZr>Yu|K;WzXY(:*Z6n`tE' );
define( 'NONCE_SALT',       ';z__IJ#=|tI8f3!^*=S]1pj7I8m%m;[@Zwhp;`{/y_g0qKfnSK$yTl y4]|,NVti' );

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
