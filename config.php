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
define( 'WP_PRO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('WP_PRO_PLUGIN_DIR', plugin_dir_url( __FILE__ ));


function wp_pro_expert_script_enqueues() {      
           
   if(is_page_template('proexpert.php')) {   
       wp_enqueue_script( 'wp-pro-expert-autocomplete', WP_PRO_PLUGIN_DIR. 'js/my-autocomplete.js', array('jquery', 'jquery-ui-autocomplete'), true );
       wp_enqueue_style( 'auto-complete-style', WP_PRO_PLUGIN_DIR.'assets/css/jquery-ui.css' ); 
   }

    // Font Awesome 5
    wp_enqueue_style( 'font-awesome-5', '//use.fontawesome.com/releases/v5.7.1/css/all.css', NULL, WP_PRO_EXPERT_VERSION);    
    // Bootstrap 4 Grid
    wp_enqueue_style( 'bootstrap-grids', WP_PRO_PLUGIN_DIR.'assets/css/bootstrap.grids.min.css', NULL, WP_PRO_EXPERT_VERSION);
      // Owl Carousel 2
    wp_enqueue_style( 'owl-carousel', WP_PRO_PLUGIN_DIR.'assets/css/owl.carousel.min.css', NULL, WP_PRO_EXPERT_VERSION);
      // Plugin Main Design
    wp_enqueue_style( 'wp-pro-expert-style', WP_PRO_PLUGIN_DIR.'assets/css/style.css', NULL, WP_PRO_EXPERT_VERSION);
    // Plugin Main Responsive
    wp_enqueue_style( 'wp-pro-expert-responsive-style', WP_PRO_PLUGIN_DIR.'assets/css/responsive.css', NULL, WP_PRO_EXPERT_VERSION);

    // Owl Carousel 
    wp_enqueue_script( 'owl-carousel', WP_PRO_PLUGIN_DIR.'assets/js/owl.carousel.min.js', array('jquery'), true );
    wp_enqueue_script( 'wp-pro-expert-custom', WP_PRO_PLUGIN_DIR.'assets/js/custom.js', array('jquery'), true );
}

add_action('wp_enqueue_scripts', 'wp_pro_expert_script_enqueues');



require_once( WP_PRO_PLUGIN_PATH . 'inc/custom-post.php' );
//require_once( WP_PRO_PLUGIN_PATH . 'inc/autocomplete.php' );
require_once( WP_PRO_PLUGIN_PATH . 'inc/metabox.php' );
require_once( WP_PRO_PLUGIN_PATH . 'inc/functions.php' );
require_once( WP_PRO_PLUGIN_PATH . 'inc/taxonomy.php' );

