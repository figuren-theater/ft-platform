<?php
/**
 * Staging environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment
 * in this file.
 *
 * @package Figuren_Theater
 * @version 2022.10.17
 * @author  Carsten Bach  <mail@carsten-bach.de>
 */

// ====================================================
// Use "Mercator Plugin" for domain-mapping via .xip.io
// @see https://github.com/humanmade/Mercator/wiki
// ====================================================
// define( 'SUNRISE', true );


// Required to disable the mu-plugins/dmhendricks__network-subdomain-updater.php-Plugin from loading at all.
define( 'NETWORK_LOCAL_DOMAIN_DISABLE', true );





// ======================================
// Manually activate the MAINTENANCE MODE
// ======================================
// define( 'FT_MAINTENANCE_MODE', true );

// ========================
// WordPress Debugging Mode
// ========================
define( 'WP_DEBUG', false );
// ========================
if ( constant( 'WP_DEBUG' ) ) {

	// =======================================
	// Logs including E_ALL and ~E_DEPRECATED,
	// but without ~E_STRICT
	//
	// USE ONLY in PHP 5.3 or higher
	// =======================================
	@ini_set( 'error_reporting', E_ALL ^ E_STRICT ); // phpcs:ignore

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
	define( 'SCRIPT_DEBUG', true );

	// ====================
	// Store Query History
	// in WP database class
	// ====================
	define( 'SAVEQUERIES', true );
}
