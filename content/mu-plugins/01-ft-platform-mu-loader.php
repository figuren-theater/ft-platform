<?php
/**
 * The must-use-loader for the figuren.theater plattform
 *
 * @package           figuren-theater/ft-platform
 * @author            figuren.theater
 * @copyright         2023 figuren.theater
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:  must-use-loader for the figuren.theater plattform
 * Description:  Autoloads ft-modules from subfolders
 * Plugin URI:   https://github.com/figuren-theater/ft-core
 * Version:      2023.09.11
 * Author:       figuren.theater
 * Author URI:   https://figuren.theater
 * License:      GPL-3.0-or-later
 */

declare(strict_types=1);

namespace Figuren_Theater;

use FT_VENDOR_DIR;
use WPMU_PLUGIN_DIR;
use WP_PLUGIN_DIR;
use function add_filter;
use function do_action;
use function get_current_blog_id;
use function get_current_network_id;

const FT_PACKAGES = [
	'ft-admin-ui',
	'ft-core', // Will be loaded first.
	'ft-data',
	'ft-interactive',
	'ft-maintenance',
	'ft-media',
	'ft-onboarding',
	'ft-options',
	'ft-performance',
	'ft-privacy',
	'ft-routes',
	'ft-security',
	'ft-seo',
	'ft-site-editing',
	'ft-theater',
	'ft-theming',
];

defined( 'ABSPATH' ) || exit;

/**
 * Requires the necessary platform files for initialization.
 *
 * This function loads the required platform files, including modules, network-specific mu-plugins,
 * blog-specific mu-plugins, and specific legacy files. It also triggers initialization actions and
 * module registration hooks.
 *
 * @return void
 */
function require_platform_files(): void {

	// Load modules one by one,
	// should|could be done by composer.
	array_map(
		function ( string $package ) {
			// The path-part "FT" is defined inside composer.json
			// as "extra:installer-paths".
			require_once WPMU_PLUGIN_DIR . "/FT/{$package}/plugin.php"; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingCustomConstant
		},
		FT_PACKAGES
	);

	// Load network specific mu-plugins.
	$_network_mu_plugin_loader = 'mu-per-network/' . get_current_network_id() . '/namespace.php';
	if ( file_exists( WPMU_PLUGIN_DIR . '/' . $_network_mu_plugin_loader ) ) {
		require_once WPMU_PLUGIN_DIR . '/' . $_network_mu_plugin_loader; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingCustomConstant, WordPressVIPMinimum.Files.IncludingFile.UsingVariable
	}

	// Load blog specific mu-plugins.
	$_blog_mu_plugin_loader = 'mu-per-blog/' . get_current_blog_id() . '/namespace.php';
	if ( file_exists( WPMU_PLUGIN_DIR . '/' . $_blog_mu_plugin_loader ) ) {
		require_once WPMU_PLUGIN_DIR . '/' . $_blog_mu_plugin_loader; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingCustomConstant, WordPressVIPMinimum.Files.IncludingFile.UsingVariable
	}

	// old pseudo-oop hoorror
	// needs to be removed
	// one by one and over time ...
	require_once WPMU_PLUGIN_DIR . '/Figuren_Theater/Figuren_Theater.php'; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingCustomConstant

	do_action( __NAMESPACE__ . '\\init', FT::site() );

	// Allow for and trigger module registration.
	do_action( 'altis.loaded_autoloader' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound

	do_action( __NAMESPACE__ . '\\loaded', FT::site() );
}
require_platform_files();

/**
 * Filters MO file path for loading translations for a specific text domain.
 *
 * @todo https://github.com/figuren-theater/ft-core/issues/1 !!!
 *
 * @param string $mofile Path to the MO file.
 * @return string Path to the MO file.
 */
function load_textdomain_mofile( string $mofile ): string {

	// Looking for a weird path-structure: "/FULL-ABSPATH-2-PLUGINS-DIR/FULL-ABSPATH-2-VENDOR-DIR" !
	$search = WP_PLUGIN_DIR . FT_VENDOR_DIR;

	if ( 0 === strpos( $mofile, $search ) ) {
		$mofile = str_replace( $search, FT_VENDOR_DIR, $mofile );
	}

	return $mofile;
}
add_filter( 'load_textdomain_mofile', __NAMESPACE__ . '\\load_textdomain_mofile', 1000 );
