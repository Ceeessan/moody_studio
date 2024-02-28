<?php
$_SERVER["HTTPS"] = "on";
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
define( 'DB_NAME', 'moody_studio' );

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
define( 'AUTH_KEY',         'K+> ko^MA-(7LX3L,%jPNR27i|)AeM0J^Y|wF9)25Kd+:(,]+x>o0uGBn(P];%Uw' );
define( 'SECURE_AUTH_KEY',  '6@=G*S&o_4L)z_.|a~ZR+iW`/tF;O61xj[82B:$Z;M9jrzrV(6nZ;;_dBVrQk^@[' );
define( 'LOGGED_IN_KEY',    'Yw#)0Q!$J+_{o=EEGhzh:|fYr P{Lf}k?D>vX3N-+_sI>rz%-Q#y?bGQve<;lI/r' );
define( 'NONCE_KEY',        'ixUA~hVy:;#M)k5]TFU#O=Edefu+#z)Rif3{j8c]PwR,RiN}tt=nt$M^#X?>dpi!' );
define( 'AUTH_SALT',        'M|#ZXnhyjXE74IG}$X+`c}wwWMA~EZBt6Q.s3ewYZ<pJhE0$ 1 ,*&uM#U5mJ]Gw' );
define( 'SECURE_AUTH_SALT', '-jbaBq8][AZzWth]&K(At0{},q@R?v&C71pmc&I:_qj/F?#+#OPJkf]/),kx}[x0' );
define( 'LOGGED_IN_SALT',   '(s5gC?7nw4p__=JC/.LhiaW*q&iuBr[w9|OX)4sZm72BuU`S%GGel}*?y$CLbMJ<' );
define( 'NONCE_SALT',       '5%Qq?Hp9lcg{zeXC|p.mYrvr-2cYZ!YO~Z=@V&0rf_8;A*@lrsl{7Jf_$f-jxepG' );

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
