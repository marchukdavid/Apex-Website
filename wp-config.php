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
define('DB_NAME', 'APEX');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'superman');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'iOMd1u@6:Tu]_H|jtNf/iD&/K6OqH<o-1lCMYKT^+.s4[.55EY- @r&l3gn:XeG5');
define('SECURE_AUTH_KEY',  'F_gEc_+$N<hvjF*k<!7{qkZyoEo]qWguBJ$^3H8p*}179.I88)3^O+)]}X]hWwyh');
define('LOGGED_IN_KEY',    'B8]it^1oI]FQ65.GC,8w*)En#F$qUEnHPGE5+9&>*}QA<@>SbQRFI&W2{d}wd#M>');
define('NONCE_KEY',        '~#e)In)5DgNBeU[m ,rG!Y$gxA,zU*OK}nZ.7;Qq%FH[lDw0(tPstTao(tqT(5AK');
define('AUTH_SALT',        'g_1L4q7hJs-B0>CA6Np>#O@%d);9i1PViPkUH.WN2KXliRWbG~uaC!~`L|WwDFYa');
define('SECURE_AUTH_SALT', 'tX.|.@.uc`6q9[?uF))AODVLS0~y6r!jnyO{2vzhjV;M>2%A<B?|b_ztRg2lRZfd');
define('LOGGED_IN_SALT',   ')/>lBLzF^+40W~8B;XCT%P_J_k-K+t*m*$N]1&]#xMJ[afL0gc1pTX9{@mnu}9}F');
define('NONCE_SALT',       'E; b^0!~t$jEIGv37>&ManwxaxxW#_X_3/w!HNv_Fgj%)RHt1vAeIkv;n?+yVKiq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'APEX_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

