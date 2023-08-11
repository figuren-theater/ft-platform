<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols // impossible to do it another way
/**
 * WordPress bootstrapper
 *
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package Figuren_Theater
 */

/**
 * What is the constant WP_USE_THEMES for?
 *
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool $WP_USE_THEMES
 * @see https://wordpress.stackexchange.com/a/12923
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp/wp-blog-header.php';
