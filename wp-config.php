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
define( 'DB_NAME', 'db_asian_group' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Pr6/n7[$` 5@es(b@9gjJVcj/[VcuQRrrmA|Bs04;rEz!gy*JG<j<J4xGc:lI`m0' );
define( 'SECURE_AUTH_KEY',  'Z^3uL/T^-KhqSa~X/6E7)Zsmn!f} c%1$ nVh#-[QW(R Hw:*ho33|syckWu5jgv' );
define( 'LOGGED_IN_KEY',    '5g4(vvE*N E$IH*CYr+q;[CgAS=?21,gV5~?J(X_fg$[ 27O2]8K0}NKw+vU(,jR' );
define( 'NONCE_KEY',        ',h<#P_hVkflQ58nZ=sb)A+pt}p7&v6#UpSX7[,OUt`?66&{ydL`PbYGcP@vD^=<t' );
define( 'AUTH_SALT',        'TMyK}p/Z;b+(7d.zm(w8_8b~&<hZ&F3S=ye?HiIh|il(c[*NP{UqG%(nQ>j;k+ge' );
define( 'SECURE_AUTH_SALT', 'zn15n:Y:;Pr:y{(ii<X2}z9&qk]-(`J$Q^n?1s+0>cNAv_FT{qG>U!lvJzsU8VDp' );
define( 'LOGGED_IN_SALT',   '$!),A{L1!k6@8sYYsZvZBYk[n/NzU*O%t(aiP;]MvZQ_?|D-O5nw{YLKbpOt$i?/' );
define( 'NONCE_SALT',       '-Rst#/[;`unR`n&pjZ1n2(Sd<-P`:8~M_GTo<U[ktPYV$bpCMI#-wnN<O_6SCe!-' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
