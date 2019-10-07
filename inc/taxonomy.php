<?php 


function pro_expert_taxonomy()  {
	register_taxonomy(
		'cb_faq_cat',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'cb_faqs',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                         => 'Category',  //Display name
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'faq-cat', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
			)
		)
	);
}
add_action('init', 'pro_expert_taxonomy');