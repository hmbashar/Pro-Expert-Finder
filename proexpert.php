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
                                    <input type="hidden" name="pro_expert" value="pro_expert">
                                    <input type="text" name="pro_expert_location" id="pro_experts_location" placeholder="Location">
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
                        <h2>Select Your Expert</h2>
                        <?php if(isset($_GET['pro_expert_location'])) : ?>
                            <h3 class="location-search-result">Search result for <strong><?php echo esc_html($_GET['pro_expert_location']); ?></strong></h3>
                        <?php endif; ?>
                    </div><!--/ Pro Expert Finder content heading-->
                </div>
                <div class="col-xl-12">
                    <!--Pro Expert Finder Member Area-->
                    <div class="photographer-member-area clearfix">
                        <div class="row">
                            <?php 
                                if(isset($_GET['pro_expert']) && $_GET['pro_expert'] == 'pro_expert' && !empty($_GET['visitor_email'])) { 
                                    $visitor_email = isset($_GET['visitor_email']) ? $_GET['visitor_email'] : '';
                                    if(!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) { ?>
                                        <div class="col-xl-12 text-center">
                                            <h2 class="invlide-email-text">Invalid Email Address!</h2>
                                        </div>                                  
                                    <?php 
                                    }else {
                                        $pro_expert_loc = isset( $_GET['pro_expert_location']) ? $_GET['pro_expert_location'] : '';
                                        $pro_experts_search_result = new WP_Query(array(
                                            'post_type'         => 'pro-experts',
                                            'posts_per_page'    => -1,
                                            'meta_query'        => array(
                                                array(
                                                    'key'       => 'pro-experts-location',
                                                    'value'     => $pro_expert_loc,
                                                    'compare'   => 'LIKE'
                                                ),
                                            ),
                                        ));
                                            if($pro_experts_search_result->have_posts()) : while($pro_experts_search_result->have_posts()) : $pro_experts_search_result->the_post();
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
                                        wp_mail( $site_admin_email, 'Searching experts', 'A visitor is looking for a expert, giving them an email'.$visitor_email );
                                    }
                                }
                                else {
                                
                                    $pro_experts = new WP_Query(array(
                                        'post_type'         => 'pro-experts',
                                        'posts_per_page'    => -1
                                    ));

                                    if($pro_experts->have_posts()) : while($pro_experts->have_posts()) : $pro_experts->the_post();  
                                   
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