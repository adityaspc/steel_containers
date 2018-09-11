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
define('DB_NAME', 'steel_containers_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '*technoadmin#');

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
define('AUTH_KEY',         'Rm3S2l5:;g&DDQMw>!}Zrcc*#C-ukf(l|:;AuEe.6<AE?{n?unUDktF2MhdjTg%#');
define('SECURE_AUTH_KEY',  '+{Dg6PA8K<Lq*Ar(dXgJI=z^Mt7_7&l&f,nByVe0G#Whx?Idv_>?/,m!lI^XKF.g');
define('LOGGED_IN_KEY',    'z[1^BTXIKX]:##Qo|o:HL#H=W6X!ol}we~TN5aZbm`o-,(.:^lUL1b#?rnB^8wx=');
define('NONCE_KEY',        'kl`)jfLB,_dl7l/1Gq|s>!G*JpXy-$HiC:z)q#9u$#[C6x>2LI%J@X:`%Ye$|nym');
define('AUTH_SALT',        'k[MH{;,fllp C&w/z=`/]qU^=iv>]TRawWZp#c+OFpN4^.IMB]6TWcUBKCg>60X%');
define('SECURE_AUTH_SALT', 's5:XZ|p0Cg>a^b7 ;Lo5}IJ;Wv}6Wr6Q2ZE88Mn3WR1A[sI^3a]gGmSw?vBMHA9D');
define('LOGGED_IN_SALT',   'ietE2B8!=R;f_DvvD~(M-4G#dk~1xU^?4uSWfqG(xr?yzhj-sQyQ&gx$HresL}Ws');
define('NONCE_SALT',       '%zE?71A~rT[JAaUu>?4nLqq-B9z<Vi=Lf1Q-P(Q$c5gS/b1x,b7aA!zHv^<$/K!F');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
