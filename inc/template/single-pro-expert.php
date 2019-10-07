<?php 
get_header();

if(have_posts()) : while(have_posts()) : the_post();
$wed_location = get_post_meta(get_the_id(), 'photographer-location', true);
$photographer_profile_pic = get_post_meta(get_the_id(), 'photographer-profile-picture', true);
$photographer_desc = get_post_meta(get_the_id(), 'photographer-short-desc', true);
?>

<!--Photographer Portfolio Area-->
<section class="photographer-portfolio-area clearfix">
    <div class="photographer-portfolio">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                  <!--Photographer portfolio header-->
                   <div class="photographer-portfolio-header clearfix">
                       <div class="row">
                           <div class="col-xl-2 col-12 col-md-3">
                               <div class="photographer-profile-picture">
                                    <?php if(!empty($photographer_profile_pic)) : ?>
                                        <img src="<?php echo esc_url($photographer_profile_pic); ?>" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_theme_file_uri('/images/thumbnail-default.png')); ?>" alt="">
                                    <?php endif; ?>
                                   <div class="photographer-profile-favorate">                                       
                                       <?php the_favorites_button(get_queried_object_id(  ) ); ?>
                                    </div>
                                </div>
                           </div>
                           <div class="col-xl-10 col-12 col-md-9">
                               <div class="photographer-profile-information clearfix">
                                   <div class="photographer-profile-info d-xl-flex">
                                       <div class="photographer-profile-name">
                                           <h2><?php the_title(); ?></h2>
                                           <?php if(!empty($wed_location)) : ?>
                                                <p><?php echo esc_html($wed_location); ?></p>
                                            <?php endif; ?>
                                       </div>
                                       <div class="photographer-profile-rating">                                           
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                       </div>
                                       <div class="photographer-profile-review-link">
                                           <a href="#photographer_feedback" class="see_photo_review">See Reviews</a>
                                        </div>
                                   </div>
                                   <div class="photographer-profile-description">
                                       <p>
                                            <?php if(!empty($photographer_desc)) {
                                                echo $photographer_desc;
                                            }                                        
                                            ?>
                                       </p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div> <!--/ Photographer portfolio header-->
                </div>
                <!--Photographer portfolio Footer/Content-->
                <div class="col-xl-12">
                    <div class="photographer-profile-content-area clearfix">
                        <div class="photographer-profile-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div><!--/ Photographer portfolio Footer/Content-->
                <!--Photographer portfolio Feedback -->
                <div class="col-xl-12">
                    <div class="photographer-profile-feedback" id="photographer_feedback">
                        <div class="photographer-profile-feedback-heading text-center mb-3">
                            <h2>Reviews from Wedding Dustry</h2>
                        </div>
                        <div class="photographer-profile-feedback-content owl-carousel">
                            <?php 
                                $review_list = new WP_Query(array(
                                    'post_type'     => 'review',
                                    'posts_per_page' => 5,
                                ));
                                if($review_list->have_posts()) : while($review_list->have_posts()) : $review_list->the_post();
                                $photographer_selected = get_post_meta(get_the_ID(), 'photographer_select_for_review', true);
                                $photographer_unique_id = get_post_meta(get_the_ID(), 'photographer_unique_id', true);
                                if(!empty($photographer_selected)) {
                                    $photographer_selected_id = $photographer_selected;
                                }elseif (!empty($photographer_unique_id)) {
                                    $photographer_selected_id = $photographer_unique_id;
                                }else {
                                    $photographer_selected_id = NULL;
                                }
                                $photographer_id = get_queried_object_id(); 


                                if($photographer_selected_id == $photographer_id )  :
                            ?>
                            <!--Single Feedback-->                            
                            <div class="single-feedback-for-photographer">
                                <div class="photographer-client-feedback">
                                    <p><?php the_content(); ?></p>
                                </div>
                                <div class="photographer-feedback-client-name">
                                    <h2>-- <?php the_title(); ?></h2>
                                </div>
                            </div><!--/ Single Feedback-->
                            <?php endif; endwhile; endif; ?>
                        </div>
                    </div>
                </div><!--/ Photographer portfolio Feedback -->
            </div>
        </div>
    </div>
</section><!--/ Photographer Portfolio Area-->

<?php 
endwhile; endif;
get_footer(); ?>