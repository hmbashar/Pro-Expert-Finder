<?php 


/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function pro_experts_list_in_review( $query_args ) {

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
function pro_expert_photographer_list() {
	return pro_experts_list_in_review( array( 'post_type' => 'pro-experts', 'numberposts' => 5 ) );
}

// Custom Post type title placeholder change.
function pro_experts_title_text( $title ){
    $screen = get_current_screen();
 
    if  ( 'review' == $screen->post_type ) {
         $title = 'Client Name';
    }

    if  ( 'pro-experts' == $screen->post_type ) {
         $title = 'Professional Expert Name';
    }
 
    return $title;
}
 
add_filter( 'enter_title_here', 'pro_experts_title_text' );




function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('Pro Expert ID');
    return $defaults;
}
function posts_custom_id_columns($column_name, $id){
    if($column_name === 'wps_post_id'){
            echo $id;
    }
}
add_filter('manage_pro-experts_posts_columns', 'posts_columns_id', 5);
add_action('manage_pro-experts_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pro-experts_pages_columns', 'posts_columns_id', 5);
add_action('manage_pro-experts_pages_custom_column', 'posts_custom_id_columns', 5, 2);   



