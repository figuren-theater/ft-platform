<?php
/**
 * CONSTANTS for whole network for puppeteers figuren.theater
 *
 * @package           figuren-theater/ft-platform
 * @author            figuren.theater
 * @copyright         2023 figuren.theater
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:  figuren.theater NETWORK | CONSTANTS for whole figuren.theater network
 * Description:
 * Plugin URI:
 * Version:      2023.05.10
 * Author:       Carsten Bach
 * Author URI:   https://carsten-bach.de
 * License:      MIT
 */

declare(strict_types=1);

namespace Figuren_Theater;

use function get_current_blog_id;

defined( 'ABSPATH' ) || exit;

/**
 * Get Version number of ft-platform
 *
 * Returns a string with the semver formatted version number, which gets set automatically on each Release (via github).
 *
 * @since 3.2 Deprecated former FT_PLATTFORM_VERSION constant in favor of this function.
 *
 * @return string String with the semver formatted version number.
 */
function get_platform_version(): string {

	// Retrieve metadata from a file.
	$version = get_file_data(
		\FT_ROOT_DIR . '/plugin.php',
		[
			'Version' => 'Version',
		]
	);
	if ( ! isset( $version['Version'] ) ) {
		return '';
	}
	return $version['Version'];
}

// 1   figuren.theater
// 4   meta.figuren.theater
// 5   websites.fuer.figuren.theater
// 12  mein.figuren.theater

/**
 * An associative array defining core sites and their corresponding identifiers.
 *
 * This constant defines core sites using an associative array, where each key represents a site identifier
 * (blog_id) and its corresponding value represents a site name. The array provides a mapping of site identifiers
 * to their respective - human-made, and totally un-related- names.
 *
 * @var $FT_CORESITES array<int, string> An associative array of core site identifiers and their names.
 */
define(
	'FT_CORESITES',
	[
		1  => 'root',
		4  => 'meta',
		5  => 'webs',
		12 => 'mein',
	]
);

// Saves one DB request per is_main_network() call.
// This is a network_id (populated from the sites-table ;) .
defined( 'PRIMARY_NETWORK_ID' ) || define( 'PRIMARY_NETWORK_ID', 1 ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound

/**
 * Checks if a site is a core site based on its identifier.
 *
 * This function determines whether a site is a core site by checking if its identifier (blog_id)
 * exists in the predefined array of core site identifiers. The function accepts an optional site
 * identifier as a parameter. If no identifier is provided, the function uses the current blog's identifier.
 *
 * @param int $site_id The site identifier (blog_id) to be checked. Optional, defaults to the current blog's identifier.
 * @return bool True if the site is a core site, false otherwise.
 */
function is_core_site( int $site_id = 0 ): bool {
	// If no site identifier is provided, use the current blog's identifier.
	$site_id = ( 0 === $site_id ) ? get_current_blog_id() : $site_id;

	// Check if the provided site identifier exists in the array of core site identifiers.
	return in_array(
		$site_id,
		array_keys( FT_CORESITES ),
		true
	);
}

/**
 * Check if given site is one of the figuren.theater platforms core sites.
 *
 * @example is_ft_core_site('root',1)
 * @example is_ft_core_site('wald')
 * @example is_ft_core_site('wald',3)
 *
 * @param string  $subdomain_key The subdomain-slug as defined in FT_CORESITES.
 * @param integer $blog_id The uniquie WordPress site-ID (aka blog_id).
 *
 * @return boolean
 */
function is_ft_core_site( string $subdomain_key, int $blog_id = 0 ): bool {
	$coresites = array_flip( FT_CORESITES );
	$blog_id   = ( 0 === $blog_id ) ? get_current_blog_id() : $blog_id;

	return ( isset( $coresites[ $subdomain_key ] ) && $coresites[ $subdomain_key ] === $blog_id );
}
