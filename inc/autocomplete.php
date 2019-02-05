<?php 

function wedAutoComplete() {
    if(is_page_template('photographers.php')) {   
        $photographer_lc = new WP_Query(array(
            'post_type'         => 'photographer',
            'posts_per_page'    => -1

        ));
        if($photographer_lc->have_posts()) { 
            
            while($photographer_lc->have_posts()) { $photographer_lc->the_post();
            $photogr_loc = get_post_meta(get_the_ID(), 'photographer-location', true);       
                $photographer_loc_list[] = $photogr_loc;
            }
        }

        $location_list = json_encode($photographer_loc_list);

        wp_localize_script('wedding-autocomplete', 'photographer_location', array(
            'photographer_locat'    => $location_list,
        ));
    }
}
add_action('wp_enqueue_scripts', 'wedAutoComplete');