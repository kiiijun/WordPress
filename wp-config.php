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

//Using environment variables for memory limits
$wp_memory_limit = (getenv('WP_MEMORY_LIMIT') && preg_match("/^[0-9]+M$/", getenv('WP_MEMORY_LIMIT'))) ? getenv('WP_MEMORY_LIMIT') : '128M';
$wp_max_memory_limit = (getenv('WP_MAX_MEMORY_LIMIT') && preg_match("/^[0-9]+M$/", getenv('WP_MAX_MEMORY_LIMIT'))) ? getenv('WP_MAX_MEMORY_LIMIT') : '256M';

/** General WordPress memory limit for PHP scripts*/
define('WP_MEMORY_LIMIT', $wp_memory_limit );

/** WordPress memory limit for Admin panel scripts */
define('WP_MAX_MEMORY_LIMIT', $wp_max_memory_limit );


//Using environment variables for DB connection information

// ** Database settings - You can get this info from your web host ** //
$connectstr_dbhost = getenv('AZURE_MYSQL_HOST');
$connectstr_dbname = getenv('AZURE_MYSQL_DBNAME');
$connectstr_dbusername = getenv('AZURE_MYSQL_USERNAME');
$connectstr_dbpassword = getenv('AZURE_MYSQL_PASSWORD');
//$connectstr_dbflag = getenv('AZURE_MYSQL_FLAG');

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

// /** Enabling support for connecting external MYSQL over SSL*/
// $mysql_sslconnect = (getenv('DB_SSL_CONNECTION')) ? getenv('DB_SSL_CONNECTION') : 'true';
// if (strtolower($mysql_sslconnect) != 'false' && !is_numeric(strpos($connectstr_dbhost, "127.0.0.1")) && !is_numeric(strpos(strtolower($connectstr_dbhost), "localhost"))) {
// 	define('MYSQL_CLIENT_FLAGS', $connectstr_dbflag);
// }


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WP [gxsO-O{%v,;rs$Xu}836Iwns|o312/P}VN:Oyk+_so+-:Q{2ei^V*^|0P _A');
define('SECURE_AUTH_KEY',  'N<;IO4?3JD>vui%gfqAJhgFs K+?y4KsVw!v+>Z]&;Qll266ri[4+)pGET)6>+^9');
define('LOGGED_IN_KEY',    '0Ir)(nN;luF;<pCwanV+.(e-9*}t;fvCp|e|,Mn;aO1w.zovBm4s@q&Ss]Mv)er.');
define('NONCE_KEY',        'YL(qS44[|h.U5~P,-Dve2`.k{_XGLjwdN|${i+<C~.xjV2oe$)T1+5O G<5>T(UR');
define('AUTH_SALT',        '+loxj{rXpv6|^4un8wH(Xdj7;7or[KBos1Fn)yXs^%o+/b+w@v-Xqv!@FDJ/Wm[T');
define('SECURE_AUTH_SALT', '#Vn(y[_),8j-av5N#G.)]s#TbzhKd)jIlrv]kJAYUi^7GmhjGT91m=z2ZcJUZU-)');
define('LOGGED_IN_SALT',   'spnaBE+do MBktP:D]ux@]oxI#8).W}9*ocsIp*}UPuneT}5.;f+cb>^@.;Lb( u');
define('NONCE_SALT',       'q(@TiVF+,OoI[W5P+[)xn9JWH&Ad~t3+1%4i8-?rL9lQ hn84t&}Qf;t7ln?o5!A');

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
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
	$_SERVER['HTTPS'] = 'on';

$http_protocol='http://';
if (!preg_match("/^localhost(:[0-9])*/", $_SERVER['HTTP_HOST']) && !preg_match("/^127\.0\.0\.1(:[0-9])*/", $_SERVER['HTTP_HOST'])) {
	$http_protocol='https://';
}

//Relative URLs for swapping across app service deployment slots
define('WP_HOME', $http_protocol . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $http_protocol . $_SERVER['HTTP_HOST']);
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST']);

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
