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
define('DB_NAME', 'gurfinke_fnbdb2');

/** MySQL database username */
define('DB_USER', 'gurfinke_fnbdb2');

/** MySQL database password */
define('DB_PASSWORD', 'kP-0[85S5V');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '3qp33x0zu5ugsrbpnj9cabj6vceijsml7jshlpxnyv4ptdbrf3vbui9umxe8hmtn');
define('SECURE_AUTH_KEY',  'zsjtnl5tqe5izlylb3ffkludktfbmk96tgqbmk2fkendkzvwrts3cc1rek19bbzf');
define('LOGGED_IN_KEY',    'm0g73i4yedz4h67setbi69no066kznaquyjjllqppzju1t03m2g4nb4gqig5yv3v');
define('NONCE_KEY',        '4yk7dnw0lrlhmqfxmrot9dmwhbnotqnpodh1ykbrqu9al4ntafriygiqcis6wffu');
define('AUTH_SALT',        'prst4x2krjfxd648cfkhfodffqduuvhucuw6ltozed1yeim1enb3swjo9uqqcrbr');
define('SECURE_AUTH_SALT', 'igjcknoxawk3fd84rlskcmsxoflxb6aymyqzstjqsuhakxnzjdvdh4evprksjtoh');
define('LOGGED_IN_SALT',   's5ebowxvqtlfddz8adthppwoclsc3r6dqitkfbm0rvbemiwq1zx9iicdb9aqmjvd');
define('NONCE_SALT',       'yyael2coej55oaxrwpdu3d9qretpxb4qy2eydhucx57rsj9ath41fitohmvcgqrn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fnb2';

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
