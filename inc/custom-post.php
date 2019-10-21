<?php 

// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;



/* Register Custom Post Types********************************************/
function proexpert_create_post_type() {
        // Register post type for Professional
        register_post_type( 'pro-experts',
                array(
                        'labels' => array(
                                'name' => __( 'Pro Experts', 'proexpert' ),
                                'singular_name' => __( 'Pro Expert', 'proexpert' ),
                                'add_new' => __( 'Add New Expert', 'proexpert' ),
                                'add_new_item' => __( 'Add New Pro Expert', 'proexpert' ),
                                'edit_item' => __( 'Edit Pro Experts', 'proexpert' ),
                                'new_item' => __( 'New Pro Experts', 'proexpert' ),
                                'view_item' => __( 'View Pro Experts', 'proexpert' ),
                                'not_found' => __( 'Sorry, we couldn\'t find the Pro Expert you are looking for.', 'vision' ),
                                'set_featured_image'    => __('Set Cover Image', 'proexpert'),
                                // Overrides the “Remove featured image” label
                                'remove_featured_image' => _x( 'Remove cover image', 'proexpert' ),
                                // Overrides the “Use as featured image” label
                                'use_featured_image'    => _x( 'Use as cover image', 'proexpert' ),
                        ),
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'has_archive' => false,
                'hierarchical' => false,
                'capability_type' => 'page',
                'rewrite' => array( 'slug' => 'pro-expert' ),
                'supports' => array( 'title', 'editor', 'thumbnail' )
                )
        );
        // Register post type for Review
        register_post_type( 'review',
                array(
                        'labels' => array(
                                'name' => __( 'Reviews', 'proexpert' ),
                                'singular_name' => __( 'Review', 'proexpert' ),
                                'add_new' => __( 'Add New Review', 'proexpert' ),
                                'add_new_item' => __( 'Add New Review', 'proexpert' ),
                                'edit_item' => __( 'Edit Review', 'proexpert' ),
                                'new_item' => __( 'New Review', 'proexpert' ),
                                'view_item' => __( 'View Review', 'proexpert' ),
                                'not_found' => __( 'Sorry, we couldn\'t find the Review you are looking for.', 'vision' ),
                        ),
                'public' => true,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'has_archive' => false,
                'hierarchical' => false,
                'capability_type' => 'page',
                'rewrite' => array( 'slug' => 'review' ),
                'supports' => array( 'title', 'editor')
                )
        );

}
add_action( 'init', 'proexpert_create_post_type' );