<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols // impossible to do it another way
/**
 * Production environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment
 * in this file.
 *
 * @package Figuren_Theater
 * @version 2022.10.17
 * @author  Carsten Bach  <mail@carsten-bach.de>
 */

// ====================================================
// Use "Mercator Plugin"
//
// for domain-aliasing
// • of .puppen.test
// • of .puppen.theater
// • of .xip.io
// • and custom top-level domains
//
// @see https://github.com/humanmade/Mercator/wiki
// ====================================================
define( 'SUNRISE', true );

// Required to disable the mu-plugins/dmhendricks__network-subdomain-updater.php-Plugin from loading at all.
define( 'NETWORK_LOCAL_DOMAIN_DISABLE', true );

// ===================================================
// Disable WP Cron
// Cronjobs are triggered via devgeniem/wp-cron-runner
// ===================================================
define( 'DISABLE_WP_CRON', true );

// ======================================
// Manually activate the MAINTENANCE MODE
// ======================================
define( 'FT_MAINTENANCE_MODE', false );

// ========================
// WordPress Debugging Mode
// ========================
define( 'WP_DEBUG', false );
// phpcs:ignore
// define( 'WP_CACHE', false );

// ========================
if ( constant( 'WP_DEBUG' ) ) {

	// =======================================
	// Logs including E_ALL and ~E_DEPRECATED,
	// but without ~E_STRICT
	//
	// USE ONLY in PHP 5.3 or higher
	// =======================================
	@error_reporting( E_ALL ^ E_STRICT ); // phpcs:ignore

	// ======================================
	// Define separate php.debug.log Location
	// ======================================
	@ini_set( 'error_log', WP_CONTENT_DIR . '/logs/php.debug.log' ); // phpcs:ignore

	// ============================================================
	// SCRIPT_DEBUG is a related constant that will force WordPress
	// to use the "dev" versions of core CSS and Javascript files
	// rather than the minified versions that are normally loaded.
	//
	// This is useful when you are testing modifications
	// to any built-in .js or .css files. Default is false.
	// ============================================================
	// define( 'SCRIPT_DEBUG', true );

	// ====================
	// Store Query History
	// in WP database class
	// ====================
	// define( 'SAVEQUERIES', true );

	// ============================
	// Disable Caching during debug
	// ============================
	define( 'WP_CACHE', false );

	// ===========================================
	// Automatically activate the MAINTENANCE MODE
	// ===========================================
	defined( 'FT_MAINTENANCE_MODE' ) || define( 'FT_MAINTENANCE_MODE', true );
}

// =============================================
// CACHING with 'Cache Enabler' Plugin by KeyCDN
// =============================================
defined( 'WP_CACHE' ) || define( 'WP_CACHE', true );
