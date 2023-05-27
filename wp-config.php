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
define( 'AUTH_KEY',         'VX-%C=el01(|4yWW4!usDGk8lE5_51]8Q);G_w_A5~GOW]c>PJsN~?f-@ED=_1-T' );
define( 'SECURE_AUTH_KEY',  '281!*TK*fd$(8a{nn9lK{gp)/liFrF1?mm)YH OGXh%O+aNxcn3L}Z@XA|z>]e{P' );
define( 'LOGGED_IN_KEY',    ',!j0_yqmA ^GC{4yO24k;I,#c2vFG/*5!uI=c_c|C1sqDDn6T9G2^G I`N} ,VjG' );
define( 'NONCE_KEY',        'i7nxbj !sa?Jg0A,/k  f/Mzl$,@16:xzOfy_>PlJ$s~j H]H59K5yrA<H%3__~c' );
define( 'AUTH_SALT',        '4HjUShHu,fG>^p%iELfB4/fkre/6YAe&s044a0si4r{[?B%=U:|c.7BuZamf~99/' );
define( 'SECURE_AUTH_SALT', '}2h0bOwP,}=psH|O7:a`DrA+r4zj+Kh<=Hk:=#6OWl:P}dim;KjBx7Fkj-xz00~v' );
define( 'LOGGED_IN_SALT',   'qXOhL#[@$$!;}Bb|D%]{mU#i+@Z<)@fr(Po@9&T62tqMfmgGmD3iFx:L7pp5KrRV' );
define( 'NONCE_SALT',       ')-cq}RdLhXE@{0K[Ul`nV&%53Lq8>tlG{aW*  ]}7bHYU_2Qf[ek 8iYA1Nvmh/=' );

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
