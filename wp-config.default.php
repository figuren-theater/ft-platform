<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file. These can then be overridden in the environment config files.
 * 
 * Please note if you add constants in this file (i.e. define statements) 
 * these cannot be overridden in environment config files.
 * 
 * @package Figuren_Theater
 * @version 2022.10.16
 * @author  Carsten Bach  <mail@carsten-bach.de>
 */

// =====================================
// Authentication Unique Keys and Salts.
// =====================================
/**#@+
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 1.0
 * @since 2.10 Use environment variables, as it's much safer than having thoose salts in our vcs.
 */
define( 'AUTH_KEY',         getenv( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY',  getenv( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY',    getenv( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY',        getenv( 'NONCE_KEY' ) );
define( 'AUTH_SALT',        getenv( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT',   getenv( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT',       getenv( 'NONCE_SALT' ) );

// =================
// Custom Directorys
// =================
define( 'FT_VENDOR_DIR', FT_ROOT_DIR . '/vendor' );

define( 'WP_CONTENT_DIR', FT_ROOT_DIR . '/content' );
define( 'WPMU_PLUGIN_DIR', WP_CONTENT_DIR . '/mu-plugins' ); // used in sunrise.php
// define( 'MUPLUGINDIR', 'content/mu-plugins' ); // deprecated in favor of WPMU_PLUGIN_DIR
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
// define( 'PLUGINDIR', 'content/plugins' ); // deprecated in favor of WP_PLUGIN_DIR


// Old static relative path maintained for limited backwards compatibility
define( 'LANGDIR', 'content/languages' );

// ===========
// Custom URLS
// ===========
define( 'WP_CONTENT_URL', 'https://assets.' . WP_BASE_URL );
// define( 'WP_CONTENT_URL', 'https://' . WP_BASE_URL . '/content' );
define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins' );
define( 'WPMU_PLUGIN_URL', WP_CONTENT_URL . '/mu-plugins' );

// define( 'FT_VENDOR_URL', WP_CONTENT_URL . '/v/wpackagist-plugin' ); // symlinked to DOCROOT/vendor
define( 'FT_VENDOR_URL', WP_CONTENT_URL . '/v' ); // symlinked to DOCROOT/vendor

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', 'utf8mb4_unicode_520_ci' );


// ==============
// MySQL settings
// ==============
define( 'DB_HOST', getenv( 'DB_HOST' ) );
define( 'DB_NAME', getenv( 'DB_NAME' ) );
define( 'DB_USER', getenv( 'DB_USER' ) );
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$table_prefix = getenv( 'DB_TABLE_PREFIX' );

// ===========================================================================
// Configuring Automatic Background Updates
// @source http://codex.wordpress.org/Configuring_Automatic_Background_Updates
// ===========================================================================
define( 'AUTOMATIC_UPDATER_DISABLED', true );

// =====================================================================
// Make WordPress core updates only update the core
// Skips the wp-content Directory While Updating
// so updating goes without Akismet, Hello Dolly and the Twenty-n-Themes
// =====================================================================
define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true );

// ======================
// Disable WP File Editor
// ======================
define( 'DISALLOW_FILE_EDIT', true );
// no updates, nags, for updates, themes and core
define( 'DISALLOW_FILE_MODS', true );

// =====================================================
// Set Memory Limit
// overwrite a typical and possible default value of 32M
// =====================================================
define( 'WP_MEMORY_LIMIT', '128M' );

// ============================
// Setup WP default compression
// ============================
$do_concatenate_scripts = ( isset( $_SERVER['HTTP2'] ) && 'on' === $_SERVER['HTTP2'] ) ? false : true;
define( 'CONCATENATE_SCRIPTS', $do_concatenate_scripts );
define( 'COMPRESS_SCRIPTS', true );
define( 'COMPRESS_CSS', true );
define( 'ENFORCE_GZIP', true );

// =======================
// Config Workflow Options
// =======================
define( 'AUTOSAVE_INTERVAL', 300 ); // default 60
define( 'WP_POST_REVISIONS', 3 );
define( 'EMPTY_TRASH_DAYS', 60 );

// ==================================
// Use Secure Connection via https://
// ==================================
define( 'FORCE_SSL_ADMIN', true );
define( 'FORCE_SSL_LOGIN', true );

// =====================
// Define cookie domains
// =====================
define( 'ADMIN_COOKIE_PATH', '/' );

define( 'COOKIE_DOMAIN', $hostname ); # must be disabled, because of MU-Subdomain-Configuration // re-enabled to make carstenbach.puppen.test work, triggers a PHP warning by mercator

// define( 'COOKIEPATH', '/' ); // TESTING LOGOUT-ISSUE https://wordpress.org/support/topic/customer-log-out-not-working/#post-13289425
define( 'COOKIEPATH', '' ); // TESTING for wp-multi-network (removed slash)

define( 'SITECOOKIEPATH', '/' ); // TESTING LOGOUT-ISSUE https://wordpress.org/support/topic/customer-log-out-not-working/#post-13289425 // TESTING for wp-multi-network (is recommended setup)

// define( 'PLUGINS_COOKIE_PATH', WP_CONTENT_DIR .'/plugins' );


// =====================
// WP Multisite Defaults
// =====================
define( 'MULTISITE', true );
// The SUBDOMAIN_INSTALL constant needs to be set,
// and will be set by ms_subdomain_constants() if not defined prior.
// 
// Because we want to switch this constant based on the currently queried network
// 
// @TODO
// We need a nice way to change this constant.
// 
// TESTING for wp-multi-network (disabled, rely on ms_subdomain_constants() ) 
// BUT needs to be enabled for ft-core-domaincheck-block (re-enabled)
// Added switch.
switch ( rtrim( $hostname, '/' ) ) {
	case 'mein.figuren.theater':
	case 'mein.figuren.test':
	// case 'mein.puppen.test': // --> results in an untrackable error, when Alias is active
		define( 'SUBDOMAIN_INSTALL', false ); 
		break;
	case 'websites.fuer.figuren.theater':
	case 'websites.fuer.figuren.test':
		// Only when
		if ( 0 === strpos($_SERVER['REQUEST_URI'], '/demos') ) {
			define( 'SUBDOMAIN_INSTALL', false ); 
		}
		break;
	
	default:
		break;
}
// the absolute default
defined( 'SUBDOMAIN_INSTALL' ) || define( 'SUBDOMAIN_INSTALL', true );

$base = '/';
if ( true === constant('SUBDOMAIN_INSTALL') )
	define( 'PATH_CURRENT_SITE', '/' ); // TESTING for wp-multi-network (disabled) // needs to be enabled for meractor // needs to be disabled to allow 2nd-level-nested subdir-installs // introduced the if check
// define( 'SITE_ID_CURRENT_SITE', 1 );
// define( 'BLOG_ID_CURRENT_SITE', 1 ); // defined in wp-config.env.php
define( 'DOMAIN_CURRENT_SITE', rtrim( $hostname, '/' ) ); // TESTING for wp-multi-network (disabled) // needs to be enabled for meractor



// =============================================================================
// Prevent WP Multisite Redirect Loop
// @see https://tommcfarlin.com/resolving-the-wordpress-multisite-redirect-loop/
// @see https://stackoverflow.com/a/31982882
//
// If registration is disabled, please set NOBLOGREDIRECT 
// to a URL you will redirect visitors to 
// if they visit a non-existent site.
//
// =============================================================================
define( 'NOBLOGREDIRECT', '%siteurl%' ); // NEEDS mu-plugins\cbstdsys_sw_noblogredirect-404-fix.php // Required to be TRUE by mu-plugins/dmhendricks__network-subdomain-updater.php
define( 'NSDU_URL', WP_BASE_URL ); // https://github.com/dmhendricks/wordpress-network-subdomain-updater-plugin/pull/2




// =======================================================
// Disable all kinds of displaying errors or debug notices
// =======================================================
ini_set(  'display_errors', 0 );
@ini_set( 'display_errors', 'Off' );
define( 'WP_DEBUG_DISPLAY', false );

// =============================
// Define php.error.log Location
// =============================
ini_set(  'log_errors', 1 );
@ini_set( 'log_errors', 'On' );
@ini_set( 'error_log', WP_CONTENT_DIR . '/logs/php.error.log' );


// ==============================
// Set Network-Wide Default Theme
// ==============================
// define( 'WP_DEFAULT_THEME', 'twentytwentytwo-ft' );
define( 'WP_DEFAULT_THEME', 'oaknut' );





// ============================================
// New Default SQLite cache location
// 
// used by 'SQLite Object Cache' Plugin
// and is called by 'object-cache.php' dropin
// which defines the need to have this defined,
// that early and not inside the typical
// vendor/plugin/structure
// ============================================
define( 'WP_SQLITE_OBJECT_CACHE_DB_FILE', WP_CONTENT_DIR . '/cache/.ht.object-cache.sqlite' );

