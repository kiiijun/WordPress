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

//Using environment variables for DB connection information

// ** Database settings - You can get this info from your web host ** //
$connectstr_dbhost = getenv('AZURE_MYSQL_HOST');
$connectstr_dbname = getenv('AZURE_MYSQL_DBNAME');
$connectstr_dbusername = getenv('AZURE_MYSQL_USERNAME');
$connectstr_dbpassword = getenv('AZURE_MYSQL_PASSWORD');

/** The name of the database for WordPress */
define('DB_NAME', $connectstr_dbname);

/** MySQL database username */
define('DB_USER', $connectstr_dbusername);

/** MySQL database password */
define('DB_PASSWORD',$connectstr_dbpassword);

/** MySQL hostname */
define('DB_HOST', $connectstr_dbhost);

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'u-z@793_;|j+,>CM&{g]p1vJC7OVLJ6?2Ba  l:ct^Z%)9rY;pr-,C;C)O0DE9V6');
define('SECURE_AUTH_KEY',  '//q0}Ub pr%W/k@2.FM-b=H6$BQ_.>[Ot$_9H(tr}4zRN|i#%#goPc1W%+vgeN!Q');
define('LOGGED_IN_KEY',    'f=XO/qJO*y}{>!,^g>cUbvZDz~x.^p&A9LB*M1-9+U][G~Sd%^4x8BbKMy5@<udE');
define('NONCE_KEY',        '?PdAq+1:8q|aT=%<r0Q%sN]1@gN9D!H$WzZ8x<15DLM{n@a+zA9Ob:M<)YTgbEKl');
define('AUTH_SALT',        '#)(G;;_6q+kdwj.f5N1$As0mrqm<Sl34%WA=fU17JlB *lrkUPk:4m|gD-Q~xnES');
define('SECURE_AUTH_SALT', '5,a@W+<xo%qF z7% e-A2tD-c`%fEG=}tAMwqVCWv+T.T[-o|JDb~e @HrT+|(yu');
define('LOGGED_IN_SALT',   'xT!m4fkn-=VQk^RADW_@.0@4mxN7T16mWtsz9Excf5YB-OIZYUR)^ b#:%<Y7&|*');
define('NONCE_SALT',       'se?v*i+#+WM|kq|ngN?w&dQEv+ogRvuzPe.Xb|rUD.n9MP@--!%,l_a_+#*UBja]');

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */
/**https://developer.wordpress.org/reference/functions/is_ssl/ */


/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
