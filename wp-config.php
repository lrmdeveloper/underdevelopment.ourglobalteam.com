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
define( 'DB_NAME', 'underdevelopment' );

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
define( 'AUTH_KEY',         '@cSNj-gE50?~tP7i`qK8!fo.(jl9ZllbFHYB)}k>k|9@06+~IkTmA2c7-xT1~x*7' );
define( 'SECURE_AUTH_KEY',  '?V_{W5K,[f$);0pdn}z/Jj&F*.vJoV1v%@%x5A|fA2mtrj_clNF]A2pJmXtuh-Q&' );
define( 'LOGGED_IN_KEY',    'SqIoCyE+xee^O g#U*h xjYx9*E{/lPK_nU/ze`;NB0]GD09LHD5L)R:SOlYg>Ae' );
define( 'NONCE_KEY',        'rvbq]HeuEO{|bLU@cI|rA7xa(XGa-Bk`oog%ZaCVv_TlmI{K7f[#m8h%OE8wHtq1' );
define( 'AUTH_SALT',        'c6ZK|Q$f>y!_l+tHK>^,b1bqG!r9]zdvi [`CmG|>wcRr#RP+w=>}:O{$Gb-]4c`' );
define( 'SECURE_AUTH_SALT', 'o~)xFh{s<5Ft]>.9c~7ZIc4DIIR9cwbkU_cUt[j;zM7: ]<{ghm b+0e(_{e}&l]' );
define( 'LOGGED_IN_SALT',   'mrhCyJt6+8*2>9b817i]Y&Ca`BZiz87&R%W{CC2cs$PS]z:uzC~*=]3!`3iL`H7T' );
define( 'NONCE_SALT',       ']9>?~?.H4FM|ZKi5JpECL3$g(NA50BEE%=@=H{dXfY:H7.8Dnm >AuOOI2kCB`E@' );

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
// added by seodev@littleripplemarketing.com.au
define( 'WP_MEMORY_LIMIT', '256M' );
define('DISALLOW_FILE_EDIT', true);/*this will disabled Theme Editor in Wordpress Admin*/
set_time_limit(400);
@ini_set( 'max_input_vars' , 4000 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
