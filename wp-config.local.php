<?php
/**
 * Development environment config settings
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

// ===================================================
// Do not 'Disable WP Cron' locally
// ===================================================
define( 'DISABLE_WP_CRON', false );

// ========================
// WordPress Debugging Mode
// ========================
define( 'WP_DEBUG', true );
// ========================
// Locally this will be true all the time, so phpstan is yelling at me
// @phpstan-ignore-next-line
if ( constant( 'WP_DEBUG' ) ) {

	// =====================================================
	// WordPress Debugging Mode - Fine-Tuning
	//
	// Define a seperate php.debug.log
	// This replaces the need for defining
	// define( 'WP_DEBUG_LOG', true);
	//
	// because it does exactly this.
	// @see http://wordpress.stackexchange.com/a/84269/20992
	// =====================================================

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
	define( 'SCRIPT_DEBUG', false );

	// ====================
	// Store Query History
	// in WP database class
	// ====================
	define( 'SAVEQUERIES', true );
}

// ======================================
// Manually activate the MAINTENANCE MODE
// ======================================
// define( 'FT_MAINTENANCE_MODE', true );



// ============================
// Disable Caching during debug
// ============================
define( 'WP_CACHE', false );
