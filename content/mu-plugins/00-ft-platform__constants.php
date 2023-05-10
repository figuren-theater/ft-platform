<?php # -*- coding: utf-8 -*-
/*
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

defined( 'ABSPATH' ) OR exit;


// this is picked up by some logic using the
// 'ft_milestone' taxonomy on
// https://websites.fuer.figuren.theater
// 
define( 'FT_PLATTFORM_VERSION', '3.0.2' );

# 1   figuren.theater
# 4   meta.figuren.theater
# 5   websites.fuer.figuren.theater
# 12  mein.figuren.theater

// (working since PHP 7)
define(
	'FT_CORESITES',
	array(
		1 =>  'root', // this is a blog_id
		4 =>  'meta',
		5 =>  'webs',
		12 => 'mein',
	)
);

// saves one DB request per is_main_network() call
defined('PRIMARY_NETWORK_ID') || define('PRIMARY_NETWORK_ID', 1 );  // this is a network_id (populated from the sites-table ;)




function is_core_site(int $site_id = 0) : bool
{
	$site_id = (0 === $site_id) ? get_current_blog_id() : $site_id;
	return in_array($site_id, array_keys( FT_CORESITES ) );
}

function is_ft_core_site($subdomain_key, $blog_id = 0)
{
	$coresites = array_flip( FT_CORESITES );
	$blog_id   = ( 0 === $blog_id ) ? get_current_blog_id() : $blog_id;
	return (isset($coresites[$subdomain_key]) && $coresites[$subdomain_key] === $blog_id );
}
/*

	\wp_die(
		'<pre>'.
		\var_export(
			array(

				is_ft_core_site('root'),
				is_ft_core_site('root',1),
				is_ft_core_site('wald',4),
				is_ft_core_site('wald',3),
				is_ft_core_site('meta'),
			),
			true
		).
		'</pre>'
	);*/
