<?php

/**
 * Plugin Name: Flipbook Finder
 * Description: Find the URLs for Flipbooks on your website
 * Author: Tony DeStefano
 * Version: 0.0.1
 * Text Domain: flipfind
 *
 * Copyright 2017 Tony DeStefano
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

require_once ( 'classes/FlipFind/Controller.php' );

$flipfind_controller = new \FlipFind\Controller;

/* enqueue js and css */
add_action( 'init', array( $flipfind_controller, 'init' ) );

/* admin stuff */
if ( is_admin() )
{
	/* Add main menu and sub-menus */
	add_action( 'admin_menu', array( $flipfind_controller, 'admin_menus') );

	/* add the plugin page link */
	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $flipfind_controller, 'plugin_link' ) );
}