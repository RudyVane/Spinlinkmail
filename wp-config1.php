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
define('DB_NAME', 'spinlink_nl_db1');

/** MySQL database username */
define('DB_USER', 'spinlink');

/** MySQL database password */
define('DB_PASSWORD', 'zGvJbJk2');

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
define('AUTH_KEY',         'RWZO=|(~h(/M{.^T<wA7/&X[R`d`4$La*]t{a*kj?7]Pla:rl8.R2,8%@oebB*Yc');
define('SECURE_AUTH_KEY',  'HoxinPO}.-A3k#A}P62?>*0&abJ]k0p*R=39.veUgMW,yF0~A#0=>^rXCei7e0.A');
define('LOGGED_IN_KEY',    '{bgl?~Ita[{T(i@3]`9T&Gaz.s^#o&=q-4&E(&_q/({7${vZe^^fpTzVH8e8EIaQ');
define('NONCE_KEY',        ',^6#prQM[KI4`tzBe`WwEI^|5-Gy_8;7}OMkraAj=X%x8aSOd#/7D*0I8|?8e^Sx');
define('AUTH_SALT',        '*1d?j[i{pjtRbt+}(nq2MUnPDf`#L,0zVQ f`#ndh=*Jq%nkMI<Cv9~v5c8Xw;u)');
define('SECURE_AUTH_SALT', 'RTJD( WVaqKLtstG+TN==yS,LmEcwwxnf;)~Bd~0q0E_8$kC:5b 0^t>}f,1k0b4');
define('LOGGED_IN_SALT',   '@=qsTgre|a(kCJqE-AdT&%YLo#+obZj? `}<Io.J]$MecL_jR)w1Wy_me@b[WLm@');
define('NONCE_SALT',       '6>CewqQGHR_^ `s-@dLySHZG@84@+P1=|/rp(^liG5U> 3(~@kSqE6ffJ|Se/CA>');

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
