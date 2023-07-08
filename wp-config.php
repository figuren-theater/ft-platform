<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols // impossible to do it another way
/**
 * WordPress Multi-Environment Config
 *
 * Loads config file based on current environment, environment can be set
 * in either the environment variable 'WP_ENVIRONMENT_TYPE' or can be set based on the
 * server hostname.
 *
 * This also overrides the option_home and option_siteurl settings in the
 * WordPress database to ensure site URLs are correct between environments.
 *
 * Common environment names are as follows, though you can use what you wish:
 *
 *   production
 *   staging
 *   development
 *
 * For each environment a config file must exist named wp-config.{environment}.php
 * with any settings specific to that environment. For example a development
 * environment would use the config file: wp-config.development.php
 *
 * Default settings that are common to all environments can exist in wp-config.default.php
 *
 * @package Figuren_Theater
 * @version 2022.10.17
 * @author  Carsten Bach  <mail@carsten-bach.de>
 */

// ===========================================================================
// Define the absolute base directories once
// ===========================================================================
define( 'FT_ROOT_DIR', __DIR__ );
define( 'FT_WP_DIR', '/wp' );

// ===========================================================================
// Loads environment variables from .env file to getenv(), $_ENV and $_SERVER.
//
// This may be the only file that is grabbed directly with require because it
// is so sweet small with no composer package and no git repo and nothin'.
// ===========================================================================
require_once __DIR__ . '/lib/dotenv/DotEnv.php';
( new DevCoder\DotEnv( FT_ROOT_DIR . '/.env' ) )->load();

if ( getenv( 'WP_ENVIRONMENT_TYPE' ) !== false ) {
	/*
	 * @var string Set Environment, while filtering non-alphabetical characters for security
	 */
	define( 'WP_ENVIRONMENT_TYPE', preg_replace( '/[^a-z]/', '', getenv( 'WP_ENVIRONMENT_TYPE' ) ) );
}
defined( 'WP_ENVIRONMENT_TYPE' ) || define( 'WP_ENVIRONMENT_TYPE', 'production' );

if ( getenv( 'WP_BASE_URL' ) !== false ) {
	/*
	 * @var string Domain plus top-level domain without protocoll and path.
	 */
	define( 'WP_BASE_URL', getenv( 'WP_BASE_URL' ) );
}
defined( 'WP_BASE_URL' ) || define( 'WP_BASE_URL', 'figuren.theater' );

// =================
// Load config files
// =================
require_once __DIR__ . '/wp-config.default.php';
require_once __DIR__ . '/wp-config.' . WP_ENVIRONMENT_TYPE . '.php';

// ====================================================================================================
// Depend the use of the object-cache.php dropin on the WP_CACHE constant which is set per ENVIRONMENT.
// ====================================================================================================
define( 'WP_SQLITE_OBJECT_CACHE_DISABLED', ! constant( 'WP_CACHE' ) );
// phpcs:ignore
// define( 'WP_SQLITE_OBJECT_CACHE_DISABLED', true );

// ============================================
// New Default SQLite cache location
//
// used by 'SQLite Object Cache' Plugin
// and is called by 'object-cache.php' dropin
// which defines the need to have this defined,
// that early and not inside the typical
// vendor/plugin/structure
// ============================================
// define( 'WP_SQLITE_OBJECT_CACHE_DB_FILE', WP_CONTENT_DIR . '/cache/.ht.object-cache.sqlite' );
//
// Prevent Error: "Unable to execute statement: database is locked"
// by using a sqlite-cache-file outside of htdocs
//
// Detailed explanation at:
// https://wordpress.org/support/topic/uncaught-exception-unable-to-execute-statement-database-is-locked/#post-16401191
define( 'WP_SQLITE_OBJECT_CACHE_DB_FILE', '/mnt/php/upload/.ht.object-cache.sqlite' );

// ===========================================================================
// CE // default: ABSPATH . 'index.php'
// ===========================================================================
define( 'CACHE_ENABLER_INDEX_FILE', FT_ROOT_DIR . '/index.php' );

// ===========================================================================
// Let composer load all namespaced classes.
// ===========================================================================
require __DIR__ . '/vendor/autoload.php';

// ========
// Clean up
// ========
unset( $hostname );

// =========================================
// End of WordPress Multi-Environment Config
// =========================================

/* That's all, stop editing! Happy blogging. */

// ===================
// Bootstrap WordPress
// ===================
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', FT_ROOT_DIR . FT_WP_DIR . '/' );
}

require_once ABSPATH . 'wp-settings.php';
