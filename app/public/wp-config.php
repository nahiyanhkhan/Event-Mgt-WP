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
define( 'AUTH_KEY',          'o%U~2L4?ASZ+sG2SQEpbr_mTST!gawlv<e<7&ZPyw4$?OYfq):~eGu/c?$iw)Z0V' );
define( 'SECURE_AUTH_KEY',   '1xt!IB0Lh~h$R^qU^0[EPo^}4TDn]PDxCpU=3#PF}@m8_yNVZFo(v?/}PO#}LSdD' );
define( 'LOGGED_IN_KEY',     'N@6Uri]aZ3l&=Trh mBzJq2U;}rD1o&$aI,0,`|w$CjGF`1-=o>VqsK5Ve,i9TDY' );
define( 'NONCE_KEY',         ']5|wj,CiwEr:Fxw;&gFjY4UyV/B3/JBV8ASolONqkwa1 .PeF#173,o*L%A)I~);' );
define( 'AUTH_SALT',         'W_h.@3)a,|UIg$rN>]]sic&1q;-OaP<r!OgUy,{WJ*^{AMB&oW1Sin.~E &XGpO]' );
define( 'SECURE_AUTH_SALT',  'jlfHmX;fG0:t{sotr0HhS=AcIPO%6G0oOVB-kvx[3xPBRJ?5bqHE71EbUB_r;daN' );
define( 'LOGGED_IN_SALT',    'CA<4Ih4lO7;v}gN2EJlRH5|;J_0{W;bQTo!#LMHzk.am-1g6Xg:FbW$1>GLUbfJr' );
define( 'NONCE_SALT',        '`?V4/-D~>pMy^:%]]hWx>>V*EJ6JnfMSU.3xcstq/&}s36|qR*lniPMzigI2x@cC' );
define( 'WP_CACHE_KEY_SALT', '++?CZ^Y(b5 A}Gf:<?/1#2Lx1-0KGmLO_Fr{)St3}_#_o,4-#@&3LzajD#rt:35i' );


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
