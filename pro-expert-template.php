<?php 
/*
Template Name: Pro Expert Finder
*/
get_header();
?>
<!--Pro Expert Finder Search Bar-->
<section class="photographer-search-bar-area clearfix">
    <div class="photographer-search-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">   
                    <div class="row">
                        <div class="col-xl-5 col-md-12 col-12">
                            <div class="photographer-search-bar-text text-xl-left text-md-center text-center">
                                <h2>I would like to see Professional Expert available in </h2>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-12 col-12">
                            <div class="photographer-search-form">                        
                                <form action="" method="GET">
                                    <input type="hidden" name="photograper" value="photographer">
                                    <input type="text" name="photographer_location" id="photographer_location" placeholder="Wedding City">
                                    <input type="email" name="visitor_email" placeholder="Your Email" required>
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</section><!--/ Pro Expert Finder Search Bar-->


<!--Pro Expert Finder list area-->
<section class="photographer-list-contents-area clearfix">
    <div class="photographer-list-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <!--Pro Expert Finder content heading-->
                    <div class="photographer-content-heading text-center">
                        <h2>Select Your Photographer</h2>
                        <?php if(isset($_GET['photographer_location'])) : ?>
                            <h3 class="location-search-result">Search result for <strong><?php echo esc_html($_GET['photographer_location']); ?></strong></h3>
                        <?php endif; ?>
                    </div><!--/ Pro Expert Finder content heading-->
                </div>
                <div class="col-xl-12">
                    <!--Pro Expert Finder Member Area-->
                    <div class="photographer-member-area clearfix">
                        <div class="row">
                            <?php 
                                if(isset($_GET['photograper']) && $_GET['photograper'] == 'photographer' && !empty($_GET['visitor_email'])) { 
                                    $visitor_email = isset($_GET['visitor_email']) ? $_GET['visitor_email'] : '';
                                    if(!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) { ?>
                                        <div class="col-xl-12 text-center">
                                            <h2 class="invlide-email-text">Invalid Email Address!</h2>
                                        </div>                                  
                                    <?php 
                                    }else {
                                        $photographer_loc = isset( $_GET['photographer_location']) ? $_GET['photographer_location'] : '';
                                        $photographer_search_result = new WP_Query(array(
                                            'post_type'         => 'photographer',
                                            'posts_per_page'    => -1,
                                            'meta_query'        => array(
                                                array(
                                                    'key'       => 'photographer-location',
                                                    'value'     => $photographer_loc,
                                                    'compare'   => 'LIKE'
                                                ),
                                            ),
                                        ));
                                            if($photographer_search_result->have_posts()) : while($photographer_search_result->have_posts()) : $photographer_search_result->the_post();
                                                get_template_part('inc/pro-expert-show');
                                            endwhile; 
                                            else : 
                                            ?>
                                                <div class="col-xl-12 text-center">
                                                    <h2 class="invlide-email-text">404 Not Found!</h2>
                                                </div> 
                                            <?php 
                                            endif;
                                        $site_admin_email = get_option('admin_email');
                                        wp_mail( $site_admin_email, 'Searching Photographer', 'A visitor is looking for a photographer, giving them an email'.$visitor_email );
                                    }
                                }
                                else {
                                
                                    $photographer = new WP_Query(array(
                                        'post_type'         => 'photographer',
                                        'posts_per_page'    => -1
                                    ));

                                    if($photographer->have_posts()) : while($photographer->have_posts()) : $photographer->the_post();  
                                   
                                        get_template_part('inc/pro-expert-show');
                                    
                                    endwhile;endif;
                                }                                
                            ?>
                        </div>
                    </div><!--/ Pro Expert Finder Member Area-->

                </div>
            </div>
        </div>
    </div>
</section><!--/ Pro Expert Finder list area-->


<?php get_footer(); ?>