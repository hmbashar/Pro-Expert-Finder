<?php
/**
 * @package WP Developer Directory
 */
/*
Plugin Name: WP Developer Directory
Plugin URI: http://www.codingbank.com/plugins/wp-developer-directory
Description: This Plugin for showing developer/member/photographer lists
Version: 1.0
Author: Md Abul Bashar
Author URI: https://www.codingbank.com
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
*/
/*
*   
*/
// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;


define( 'WPDD_VERSION', '1.0' );
define( 'WPDD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


function wp_dd_script_enqueues() {
        
       
    
   if(is_page_template('photographers.php')) {   
       wp_enqueue_script( 'wedding-autocomplete', plugins_url('/js/my-autocomplete.js', __FILE__), array('jquery', 'jquery-ui-autocomplete'), true );
       wp_enqueue_style( 'auto-complete-style', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' ); 
   }

    // Font Awesome 5
    wp_enqueue_style( 'font-awesome-5', '//use.fontawesome.com/releases/v5.7.1/css/all.css', NULL, WPDD_VERSION);    
    // Bootstrap 4
    wp_enqueue_style( 'bootstrap', plugins_url('assets/css/bootstrap.css', __FILE__), NULL, WPDD_VERSION);
      // Owl Carousel 2
    wp_enqueue_style( 'owl-carousel', plugins_url('assets/css/owl.carousel.min.css', __FILE__), NULL, WPDD_VERSION);
      // Plugin Main Design
     wp_enqueue_style( 'wp-dd-style', plugins_url('assets/css/style.css', __FILE__), NULL, WPDD_VERSION);
    // Plugin Main Responsive
    wp_enqueue_style( 'wp-dd-responsive-style', plugins_url('assets/css/responsive.css', __FILE__), NULL, WPDD_VERSION);

    // Owl Carousel 
    wp_enqueue_script( 'owl-carousel', plugins_url('assets/js/owl.carousel.min.js', __FILE__), array('jquery'), true );
    wp_enqueue_script( 'owl-carousel', plugins_url('assets/js/custom.js', __FILE__), array('jquery'), true );
}

add_action('wp_enqueue_scripts', 'wp_dd_script_enqueues');



require_once( WPDD_PLUGIN_DIR . 'inc/custom-post.php' );
require_once( WPDD_PLUGIN_DIR . 'inc/autocomplete.php' );
require_once( WPDD_PLUGIN_DIR . 'inc/metabox.php' );