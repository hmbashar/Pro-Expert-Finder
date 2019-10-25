<?php 

add_action( 'cmb2_admin_init', 'pro_expert_finder_metabox' );
/**
 * Define the metabox and field configurations.
 */
function pro_expert_finder_metabox() {

	/*-------------------------------------------
	 * General the metabox
	 -------------------------------------------*/
	$pro_Experts = new_cmb2_box( array(
		'id'            => 'pro_expert_metabox_id',
		'title'         => __( 'Professional Information', 'proexpert' ),
		'object_types'  => array( 'pro-experts' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'closed'         => true, // true to have the groups closed by default
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

	$pro_expert_profession = $pro_Experts->add_field( array(
	'id'          => 'pro_expert_profession_group',
	'type'        => 'group',
	// 'repeatable'  => false, // use false if you want non-repeatable group
	'options'     => array(
		'group_title'       => __( 'Profession {#}', 'proexpert' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'        => __( 'Add Another profession', 'proexpert' ),
		'remove_button'     => __( 'Remove profession', 'proexpert' ),
		'sortable'          => true,
		'closed'         => true, // true to have the groups closed by default
		'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'proexpert' ), // Performs confirmation before removing group.
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$pro_Experts->add_group_field( $pro_expert_profession, array(
		'name' => 'Professoin Name',
		'id'   => 'pro_expert_professoin_name',
		'type' => 'text',		
	) );

	$pro_Experts->add_group_field( $pro_expert_profession, array(
		'name' => 'Description',
		'description' => 'Write a short description for this professoin',
		'id'   => 'pro_expert_professoin_content',
		'type' => 'textarea_small',
	) );



	/*-------------------------------------------
	 * Social metabox
	 -------------------------------------------*/
	$pro_Experts_social_profile = new_cmb2_box( array(
		'id'            => 'pro_expert_social_metabox_id',
		'title'         => __( 'Social Information', 'proexpert' ),
		'object_types'  => array( 'pro-experts' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'closed'         => true, // true to have the groups closed by default
	) );

	// Regular text field
	$pro_Experts_social_profile->add_field( array(
		'name'       => __( 'Facebook', 'proexpert' ),
		'desc'       => __( 'Please Input expert facebook profile url', 'proexpert' ),
		'id'         => 'pro-experts-facebook-url',
		'type'       => 'text_url',
	) );
	// Regular text field
	$pro_Experts_social_profile->add_field( array(
		'name'       => __( 'Twitter', 'proexpert' ),
		'desc'       => __( 'Please Input expert twitter profile url', 'proexpert' ),
		'id'         => 'pro-experts-twitter-url',
		'type'       => 'text_url',
	) );
	// Regular text field
	$pro_Experts_social_profile->add_field( array(
		'name'       => __( 'LinkedIn', 'proexpert' ),
		'desc'       => __( 'Please Input expert linkedIn profile url', 'proexpert' ),
		'id'         => 'pro-experts-linkedin-url',
		'type'       => 'text_url',
	) );
	// Regular text field
	$pro_Experts_social_profile->add_field( array(
		'name'       => __( 'Instagram', 'proexpert' ),
		'desc'       => __( 'Please Input expert instagram profile url', 'proexpert' ),
		'id'         => 'pro-experts-instagram-url',
		'type'       => 'text_url',
	) );


	/*-------------------------------------------
	 * Value metabox
	 --------------------------------------------*/
	$pro_expert_value = new_cmb2_box( array(
		'id'            => 'pro_expert_value_metabox_id',
		'title'         => __( 'Value Information', 'proexpert' ),
		'object_types'  => array( 'pro-experts' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'closed'         => true, // true to have the groups closed by default
	) );

	$pro_expert_value_field = $pro_expert_value->add_field( array(
	'id'          => 'pro_expert_value_group',
	'type'        => 'group',
	// 'repeatable'  => false, // use false if you want non-repeatable group
	'options'     => array(
		'group_title'       => __( 'Value {#}', 'proexpert' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'        => __( 'Add Another Value', 'proexpert' ),
		'remove_button'     => __( 'Remove Value', 'proexpert' ),
		'sortable'          => true,
		'closed'         => true, // true to have the groups closed by default
		'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'proexpert' ), // Performs confirmation before removing group.
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$pro_expert_value->add_group_field( $pro_expert_value_field, array(
		'name' => 'Value Title',
		'id'   => 'pro_expert_value_title',
		'type' => 'text',		
	) );

	$pro_expert_value->add_group_field( $pro_expert_value_field, array(
		'name' => 'Description',
		'description' => 'Write a short description for this value',
		'id'   => 'pro_expert_value_content',
		'type' => 'textarea_small',
	) );



	/*-------------------------------------------
	 * Skills metabox
	 -------------------------------------------*/
	$pro_expert_skills = new_cmb2_box( array(
		'id'            => 'pro_expert_skills_metabox_id',
		'title'         => __( 'Skills', 'proexpert' ),
		'object_types'  => array( 'pro-experts' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'closed'         => true, // true to have the groups closed by default
	) );
	// Regular text field
	$pro_expert_skills->add_field( array(
		'name'       => __( 'Short Description', 'proexpert' ),
		'desc'       => __( 'Please write something about this professional expert', 'proexpert' ),
		'id'         => 'pro_expert-skill-short-desc',
        'type'       => 'wysiwyg',
        'options' => array(
            'media_buttons' => false,
            'textarea_rows' => get_option('default_post_edit_rows', 5)
        ),
	) );

	// Regular text field
	$pro_expert_skills->add_field( array(
		'name'       => __( 'Contact URL', 'proexpert' ),
		'desc'       => __( 'Contact url', 'proexpert' ),
		'id'         => 'pro_expert_skill_contact_url',
		'type'       => 'text_url',
	) );

	$pro_expert_profession = $pro_expert_skills->add_field( array(
	'id'          => 'pro_expert_skills_group',
	'type'        => 'group',
	// 'repeatable'  => false, // use false if you want non-repeatable group
	'options'     => array(
		'group_title'       => __( 'Skill {#}', 'proexpert' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'        => __( 'Add Another skill', 'proexpert' ),
		'remove_button'     => __( 'Remove skill', 'proexpert' ),
		'sortable'          => true,
		'closed'         => true, // true to have the groups closed by default
		'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'proexpert' ), // Performs confirmation before removing group.
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$pro_expert_skills->add_group_field( $pro_expert_profession, array(
		'name' => 'Skill Name',
		'id'   => 'pro_expert_skill_name',
		'type' => 'text',		
	) );

	$pro_expert_skills->add_group_field( $pro_expert_profession, array(
		'name' => 'Percent',
		'description' => 'Input Number for how much percent do you have experience with this skill, like 80',
		'id'   => 'pro_expert_skill_percent',
		'type' => 'text_small',
	) );



	/*-------------------------------------------
	 * Review metabox
	 -------------------------------------------*/
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
        'options_cb' => 'pro_expert_finder_list',
	) );
	

	// Regular text field
	$pro_expert_review->add_field( array(
		'name'       => __( 'Pro Expert ID (Optional)', 'proexpert' ),
		'desc'       => __( 'Please Input Pro Expert ID, If not\' found! Pro Expert in above the list, You can find the professional expert id from professional expert list after hover.', 'proexpert' ),
		'id'         => 'pro_expert_unique_id',
        'type'       => 'text_small',
	) );



}