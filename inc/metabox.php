<?php 

/**
 * Define the metabox and field configurations.
 */
function proExpert_metabox_register() {


	/**
	 * Initiate the metabox
	 */
	$pro_Experts = new_cmb2_box( array(
		'id'            => 'pro_expert_metabox_id',
		'title'         => __( 'Professional Extra Information', 'proexpert' ),
		'object_types'  => array( 'pro-experts' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Regular text field
	$pro_Experts->add_field( array(
		'name'       => __( 'Location', 'proexpert' ),
		'desc'       => __( 'Please write this professional expert location state/city', 'proexpert' ),
		'id'         => 'pro-experts-location',
		'type'       => 'text',
	) );

	// Regular text field
	$pro_Experts->add_field( array(
		'name'       => __( 'Short Description', 'proexpert' ),
		'desc'       => __( 'Please write something about this professional expert', 'proexpert' ),
		'id'         => 'pro_expert-short-desc',
        'type'       => 'wysiwyg',
        'options' => array(
            'media_buttons' => false,
            'textarea_rows' => get_option('default_post_edit_rows', 5)
        ),
	) );

	// Regular text field
	$pro_Experts->add_field( array(
		'name'       => __( 'Picture', 'proexpert' ),
		'desc'       => __( 'Please upload your professional expert profile picture, recommended dimension 200x200px', 'proexpert' ),
		'id'         => 'professional-expert-profile-picture',
		'type'       => 'file',
	) );

	/**
	 * Initiate the metabox
	 */
	$pro_expert_review = new_cmb2_box( array(
		'id'            => 'pro_expert_review_metabox_id',
		'title'         => __( 'Review For Professional Expert', 'proexpert' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Regular text field
	$pro_expert_review->add_field( array(
		'name'       => __( 'Select Expert', 'proexpert' ),
		'desc'       => __( 'Please select professional expert, for whom this review?', 'proexpert' ),
		'id'         => 'pro_expert_select_for_review',
        'type'       => 'select',
        'show_option_none' => true,
        'options_cb' => 'pro_expert_photographer_list',
	) );
	

	// Regular text field
	$pro_expert_review->add_field( array(
		'name'       => __( 'Pro Expert ID (Optional)', 'proexpert' ),
		'desc'       => __( 'Please Input Pro Expert ID, If not\' found! Pro Expert in above the list, You can find the professional expert id from professional expert list after hover.', 'proexpert' ),
		'id'         => 'pro_expert_unique_id',
        'type'       => 'text_small',
	) );

}
add_action( 'cmb2_admin_init', 'proExpert_metabox_register' );