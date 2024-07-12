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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'r>O[w2.I*j7ULV+%cCkjuh0/{RVr?A(jw@Zea8FLwiWX0(stI?8# JZhbR1-%mV{' );
define( 'SECURE_AUTH_KEY',   '@uMC&Xf{d81e_Y|s?~Qt=8it!PeVS],4gX:E-RS85.E;|aq]thF.*g8LW%C1;(Z-' );
define( 'LOGGED_IN_KEY',     '6-dIg9w2Bo|Wng<kiLZ1S]2Mq]#9[WfZ-@c3&P;_{s.4,!%y_h#v(GhTXBMqJZ/-' );
define( 'NONCE_KEY',         'FL!8u32@],Wr89&tCn(s5Oxv~T%`^|>YB[vw3|i98%y`ATo9F]G!q/C+g3Q|>D{3' );
define( 'AUTH_SALT',         'UtTzC2I)J&Hxns%=/@s(7:R#%vG)~7~6N!b_8Fe|=}&uu?F%nq(|*e_,%vga9V/p' );
define( 'SECURE_AUTH_SALT',  '3Jkxs-P6=gZBf5n-5}ug+qa6[9@%  a3GZg4daWF7KD?z#.W8.c{st!19kRKl]2(' );
define( 'LOGGED_IN_SALT',    'zx~Bk5}W.GLF1uxG4?zslA>~msq^Vpl/&AHs9$X~@9:qi&VjSB5]={U&nc=h6k1Y' );
define( 'NONCE_SALT',        'x)3g(<?h(&D:}Y~(:^O7HByEae;Q0|B~[*V(R4@}wupW_U#Byr(rEPo2-AKo=?kp' );
define( 'WP_CACHE_KEY_SALT', '1o2Y}y%mGC-]aG-JM)K2@cy6.<?0(In:z>|haLB8T iT,gq7*[_B]JCfb@lyQv[(' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
