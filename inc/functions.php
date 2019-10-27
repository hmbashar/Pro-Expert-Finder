<?php 


//basic function
function pro_expert_basic_action() {
  add_theme_support('post-thumbnails', array('pro-experts'));
}
add_action('after_setup_theme', 'pro_expert_basic_action');

/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function pro_experts_finder_list_in_review( $query_args ) {

	$args = wp_parse_args( $query_args, array(
		'post_type'   => 'pro-experts',
		'numberposts' => 15,
	) );

	$posts = get_posts( $args );

	$post_options = array();
	if ( $posts ) {
		foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
		}
	}

	return $post_options;
}

/**
 * Gets 5 posts for your_post_type and displays them as options
 * @return array An array of options that matches the CMB2 options array
 */
function pro_expert_finder_list() {
	return pro_experts_finder_list_in_review( array( 'post_type' => 'pro-experts', 'numberposts' => 15 ) );
}

// Custom Post type title placeholder change.
function pro_experts_title_text( $title ){
    $screen = get_current_screen();
 
    if  ( 'pro-expert-review' == $screen->post_type ) {
         $title = 'Client Name';
    }

    if  ( 'pro-experts' == $screen->post_type ) {
         $title = 'Professional Expert Name';
    }
 
    return $title;
}
 
add_filter( 'enter_title_here', 'pro_experts_title_text' );




function pro_expert_posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('Pro Expert ID');
    return $defaults;
}
function pro_expert_posts_custom_id_columns($column_name, $id){
    if($column_name === 'wps_post_id'){
            echo $id;
    }
}
add_filter('manage_pro-experts_posts_columns', 'pro_expert_posts_columns_id', 5);
add_action('manage_pro-experts_posts_custom_column', 'pro_expert_posts_custom_id_columns', 5, 2);
add_filter('manage_pro-experts_pages_columns', 'pro_expert_posts_columns_id', 5);
add_action('manage_pro-experts_pages_custom_column', 'pro_expert_posts_custom_id_columns', 5, 2);


//Page  Attribute
function pro_expert_tamplate_add_page_attribute_dropdown( $post_templates, $wp_theme, $post, $post_type ) {

    $post_templates['proexpert.php'] = __('Pro Expert Finder');

    return $post_templates;
}

add_filter( 'theme_page_templates', 'pro_expert_tamplate_add_page_attribute_dropdown', 10, 4 );


//Template chnage
function pro_expert_load_tamplate_from_plugin( $template ) {

    if(  get_page_template_slug() === 'proexpert.php' ) {
    
        if ( $theme_file = locate_template( array( 'proexpert.php' ) ) ) {
            $template = $theme_file;
        } else {
            $template = WP_PRO_PLUGIN_PATH . 'inc/template/proexpert.php';
        }
    }

     if( is_singular( 'pro-experts' ) ) {
            $template = WP_PRO_PLUGIN_PATH .'inc/template/single-pro-expert.php';
      }


    if($template == '') {
        throw new \Exception('No template found');
    }

    return $template;
}

add_filter( 'template_include', 'pro_expert_load_tamplate_from_plugin' );