<?php
/**
 * @package WP Pro Experts Finder
 */
/*
Plugin Name: WP Pro Experts Finder
Plugin URI: http://www.codingbank.com/plugins/pro-expert-finder
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


define( 'WP_PRO_EXPERT_VERSION', '1.0' );
define( 'WP_PRO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


function wp_pro_expert_script_enqueues() {      
           
   if(is_page_template('proexpert.php')) {   
       wp_enqueue_script( 'wp-pro-expert-autocomplete', plugins_url('/js/my-autocomplete.js', __FILE__), array('jquery', 'jquery-ui-autocomplete'), true );
       wp_enqueue_style( 'auto-complete-style', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' ); 
   }

    // Font Awesome 5
    wp_enqueue_style( 'font-awesome-5', '//use.fontawesome.com/releases/v5.7.1/css/all.css', NULL, WP_PRO_EXPERT_VERSION);    
    // Bootstrap 4
    wp_enqueue_style( 'bootstrap', plugins_url('assets/css/bootstrap.css', __FILE__), NULL, WP_PRO_EXPERT_VERSION);
      // Owl Carousel 2
    wp_enqueue_style( 'owl-carousel', plugins_url('assets/css/owl.carousel.min.css', __FILE__), NULL, WP_PRO_EXPERT_VERSION);
      // Plugin Main Design
    wp_enqueue_style( 'wp-pro-expert-style', plugins_url('assets/css/style.css', __FILE__), NULL, WP_PRO_EXPERT_VERSION);
    // Plugin Main Responsive
    wp_enqueue_style( 'wp-pro-expert-responsive-style', plugins_url('assets/css/responsive.css', __FILE__), NULL, WP_PRO_EXPERT_VERSION);

    // Owl Carousel 
    wp_enqueue_script( 'owl-carousel', plugins_url('assets/js/owl.carousel.min.js', __FILE__), array('jquery'), true );
    wp_enqueue_script( 'wp-pro-expert-custom', plugins_url('assets/js/custom.js', __FILE__), array('jquery'), true );
}

add_action('wp_enqueue_scripts', 'wp_pro_expert_script_enqueues');



require_once( WP_PRO_PLUGIN_DIR . 'inc/custom-post.php' );
require_once( WP_PRO_PLUGIN_DIR . 'inc/autocomplete.php' );
require_once( WP_PRO_PLUGIN_DIR . 'inc/metabox.php' );
require_once( WP_PRO_PLUGIN_DIR . 'inc/functions.php' );