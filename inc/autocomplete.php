<?php 

function proExpertAutoComplete() {
    if(is_page_template('proexpert.php')) {   
        $pro_expert_loc = new WP_Query(array(
            'post_type'         => 'pro-experts',
            'posts_per_page'    => -1

        ));
        if($pro_expert_loc->have_posts()) { 
            
            while($pro_expert_loc->have_posts()) { $pro_expert_loc->the_post();
            $pro_expert_loca_array = get_post_meta(get_the_ID(), 'pro-experts-location', true);       
                $pro_expert_list[] = $pro_expert_loca_array;
            }
        }

        $pro_location_list = json_encode($pro_expert_list);

        wp_localize_script('wp-pro-expert-autocomplete', 'pro_expert_location', array(
            'pro_expert_locat'    => $pro_location_list,
        ));
    }
}
add_action('wp_enqueue_scripts', 'proExpertAutoComplete');