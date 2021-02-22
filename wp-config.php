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

define('DB_NAME', 'novacleandb'); // old local DB
// define('DB_NAME', 'novadrivingschoo_8');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Gyp*E8}o9G|FXv)/Pg&>7exk,vIk}K6k1Zhnljj*l=r|AO@Aj/~oH8V,MhUFget9');
define('SECURE_AUTH_KEY',  'Wx3%Ih6p.8]?Eo!Vn? YvQHGvj^^LkW0*]:4}n&O1`7gFX :>@w:]Ntoy4$qqe2V');
define('LOGGED_IN_KEY',    '~[ *GGR+-=^;<#X<?Wo+Lb,G!I>0.6IV/%*kNMGhP>$oz|}pCkB!fNxxpw|F6j~}');
define('NONCE_KEY',        '@>X!oMWD>+e+5181{T<v~((Mm0gO6d|E_3`;adi)S$OR*PpbF(>Qy!;kVr%8.;-2');
define('AUTH_SALT',        'jeA/ps%f|NBW+HSum0KXD(vS-P7zU(t*k*K1t=irn{Fmy;U/jyYzY:TZi,>CB8Y ');
define('SECURE_AUTH_SALT', '6zxZm$_AU7w6id;)cKbv_T}`Wk&}MG1fCZUK6_arZn|dP`e`=K5&Wt_MKy+O<<U8');
define('LOGGED_IN_SALT',   '@W0C^D_QbfsX/^euy66F}M2dRjuru1B1(9PwMY?yCqISmfB#D%_8{./yZDw2nG?@');
define('NONCE_SALT',       'EIF$XE$4U}>EoLdssv_$+i0MrYH}M.t-j/Z%NR,~ck_A2&4rE+aj$++r9@zBwi/1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fkj_';

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
