<?php 
/*
* Photographer query list for photographer template
*/ 
    $wed_location = get_post_meta(get_the_id(), 'photographer-location', true);
    $photographer_profile_pic = get_post_meta(get_the_id(), 'photographer-profile-picture', true);                          
?>
<!--Single Photographer -->
<div class="col-xl-4 col-12 col-md-6">
    <div class="single-photographer-list clearfix">
        <div class="photographer-cover-image">
            <?php the_post_thumbnail('nicdark_photographer_cover'); ?> 
                <div class="photographer-location">
                    <?php if(!empty($wed_location)) : ?>
                        <p><?php echo esc_html($wed_location); ?></p>
                    <?php endif; ?>  
                </div>                               
                <div class="single-photographer-picture">
                    <?php if(!empty($photographer_profile_pic)) : ?>
                        <img src="<?php echo esc_url($photographer_profile_pic); ?>" alt="">
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/thumbnail-default.png')); ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="single-hotographer-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
        </div>
        <div class="single-photographer-name-rating clearfix">
            <div class="single-phogotrapher-name">
                <a href="<?php the_permalink(); ?>"><h2><?php echo wp_trim_words( get_the_title(), 4, NULL ); ?></h2></a>
            </div>
        </div>
        <div class="single-photographer-portfolio-link text-center">
            <a href="<?php the_permalink(); ?>">View Portfolio </a>
        </div>
    </div>
</div><!--/ Single Photographer -->