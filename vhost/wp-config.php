<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */


if ( strpos($_SERVER['DOCUMENT_ROOT'], 'vagrant') ) { 
  define('DB_HOST', 'localhost');
  define('DB_CHARSET', 'latin1');
  define('DB_COLLATE', '');
  define('DB_NAME', 'vagrant');
  define('DB_USER', 'vagrant');
  define('DB_PASSWORD', 'vagrant');
  define('WP_DEBUG', true);
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
} else {
  require('dbconfig_live.php');
  ini_set('display_errors', 'Off');
  define('WP_DEBUG', false);
}

function wu_hostname() {
  global $wu_hostname;
  isset($_SERVER['HTTPS']) ? $wu_hostname = 'https://' : $wu_hostname = 'http://';
  $wu_hostname .= $_SERVER['SERVER_PORT'] != '80' ? $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"] : $_SERVER['SERVER_NAME'];
  return;
}

wu_hostname();
define('WP_HOME', $wu_hostname);
define('WP_SITEURL', $wu_hostname);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '%(Tq#Wup_+$gO+BV`viJj0qfu|k<lI5%H s}QXP <c(5N5,@Z-h}Tu>oA+j-z$&1');
define('SECURE_AUTH_KEY',  '0Bz.FOW2^RX0RIk6AyO7!Vvf/Tb<g>Qm$#QI#B<CJX$:YVjF?>?q9}Lbl>7*$?Hb');
define('LOGGED_IN_KEY',    ' t+,UKM-6xUy8+:=|qa?3VAZd+|i%{QSCFwcE]Nfp(@#Y5qWvYzNG]k>26]i|* y');
define('NONCE_KEY',        '9G<ktRGs{R?M7B!l+%,dE&~Z({gik-uLPP@pm=@Eb[Eb4gD_,YW(_Xst{8.[#lth');
define('AUTH_SALT',        '}QFq>VUfq&>++Z9#.wHy`I+(ZSjLxRdL8yLUOe_G)?G5|,:6@e8.S`=u,YKZ:ntB');
define('SECURE_AUTH_SALT', 'B-Xa;IL+;@ G}B-/bM`e:+U2$GM@`tuLQ)>v1cV@^`),>5G}GN.kA|6vYwm,Pgh&');
define('LOGGED_IN_SALT',   '{v19v;o1pqu{@@ ,>2,V-?j&.NO|.S$4,e+fKXhrc4&ZVU|Bskx2q1H;csB-!wxI');
define('NONCE_SALT',       '?E<-H-15G Z7E v)oSzeU+)/dR_ACN+:ebIE-}Zy<I~a:`L|l*-5kw|*U*kPr-*!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'nl_NL');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
// define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
