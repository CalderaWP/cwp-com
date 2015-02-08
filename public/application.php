<?php
/**
 * Content dir/url
 */
if ( WP_LOCAL_DEV ) {
	$protocol = 'http://';
}else{
	$protocol = 'https://';
}

define( 'CONTENT_DIR', '/cwp-content' );
define( 'WP_CONTENT_DIR', WP_WEBROOT_DIR . CONTENT_DIR );
define( 'WP_CONTENT_URL', $protocol . $_SERVER['HTTP_HOST'] . '/public' . CONTENT_DIR );

/**
 * DB info common to both configs
 */
$table_prefix = 'wp_';
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
if ( ! defined( 'DB_HOST' ) ) {
	define( 'DB_HOST', 'localhost' );
}

/**
 * DEBUG
 */
if ( ! defined( 'WP_LOCAL_DEV' ) ) {
	define( 'WP_LOCAL_DEV', false );
}
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
if ( ! WP_LOCAL_DEV ) {
	define( 'WP_DEBUG_DISPLAY', false );
}


/**
 * Other
 */
//don't mess with files on server.
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'DISABLE_WP_CRON', true );
define( 'DISALLOW_FILE_EDIT', true );

//memory
define( 'WP_MEMORY_LIMIT', '512M' );

//memcached
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) ) {
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );
}

/**
 * Abspath
 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', WP_WEBROOT_DIR . '/wp/' );
}
