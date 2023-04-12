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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'remise' );

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
define( 'AUTH_KEY',         'iH79[`Z5Fk~aUB%5cvH`t1S(d>>7Ho`zZ<J%X:w9rJ%q|h;Xn5{n7_#>it%C?Hw0' );
define( 'SECURE_AUTH_KEY',  'u>gUAgU2Mdb~XOR^rFIX!*7tA>f&>xK#1X1Eg4@O!v@.s)*e{(5z~ u&w>A(-r1-' );
define( 'LOGGED_IN_KEY',    ',q5mmyYBK`[zy8jew  #W|0:mLu#%v(O+#n`IgdM8#ZquCHifr@=f3auWf@kftvQ' );
define( 'NONCE_KEY',        '6|B,5%NLj.doPdPpE! D9^PtCwW4Q5mZi:S_s[Z`?G?h|a}-MMfOb.L5+L?z/y$5' );
define( 'AUTH_SALT',        '&4Tad]|^%K=TuTD]e>CHZspM!2d9E1VHNFN+B&`TqK2AslHoEjclI<ZnegwS2Fm#' );
define( 'SECURE_AUTH_SALT', 'cace[S4S,Wt> D{6RSL2OH5c%mXJ=6wz%kZ8L}}bz<0GA#1Yt5(V`~TPA+V[L80(' );
define( 'LOGGED_IN_SALT',   'r[T*?<F{L<oO{;Gr!+:c@?GA,|lp5{4zifQtTw>EkP5cWKU])=RwJIiK*FAIYOwU' );
define( 'NONCE_SALT',       'K/k@|j[WPT5dRpv6vDoCec_|pUc-(vH>]@vgs0Yi5z&}ZX-f;{,I%]8^G^NoS272' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
