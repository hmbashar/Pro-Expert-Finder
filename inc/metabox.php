<?php 

/**
 * Define the metabox and field configurations.
 */
function weddingindustry_metabox_register() {


	/**
	 * Initiate the metabox
	 */
	$photographer = new_cmb2_box( array(
		'id'            => 'photographer_metabox_id',
		'title'         => __( 'Photographer Extra Information', 'weddingindustry' ),
		'object_types'  => array( 'photographer' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Regular text field
	$photographer->add_field( array(
		'name'       => __( 'Location', 'weddingindustry' ),
		'desc'       => __( 'Please write this photographer location state/city', 'weddingindustry' ),
		'id'         => 'photographer-location',
		'type'       => 'text',
	) );

	// Regular text field
	$photographer->add_field( array(
		'name'       => __( 'Short Description', 'weddingindustry' ),
		'desc'       => __( 'Please write something about this photographer', 'weddingindustry' ),
		'id'         => 'photographer-short-desc',
        'type'       => 'wysiwyg',
        'options' => array(

            'media_buttons' => false,
            'textarea_rows' => get_option('default_post_edit_rows', 5)
        ),
	) );

	// Regular text field
	$photographer->add_field( array(
		'name'       => __( 'Picture', 'weddingindustry' ),
		'desc'       => __( 'Please upload your photographer profile picture, recommended dimension 200x200px', 'weddingindustry' ),
		'id'         => 'photographer-profile-picture',
		'type'       => 'file',
	) );

	/**
	 * Initiate the metabox
	 */
	$photographer_review = new_cmb2_box( array(
		'id'            => 'photographer_review_metabox_id',
		'title'         => __( 'Photographer', 'weddingindustry' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Regular text field
	$photographer_review->add_field( array(
		'name'       => __( 'Select Photographer', 'weddingindustry' ),
		'desc'       => __( 'Please select photographer, for whom this review?', 'weddingindustry' ),
		'id'         => 'photographer_select_for_review',
        'type'       => 'select',
        'show_option_none' => true,
        'options_cb' => 'wedding_photographer_list',
	) );
	

	// Regular text field
	$photographer_review->add_field( array(
		'name'       => __( 'Photographer ID (Optional)', 'weddingindustry' ),
		'desc'       => __( 'Please Input Photographer ID, If not\' found! Photographer in above the list, You can find the photographer id from photographer list after hover.', 'weddingindustry' ),
		'id'         => 'photographer_unique_id',
        'type'       => 'text_small',
	) );

}
add_action( 'cmb2_admin_init', 'weddingindustry_metabox_register' );