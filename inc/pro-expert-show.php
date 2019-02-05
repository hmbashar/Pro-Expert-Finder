<?php 
/*
* Pro Experts query list for Pro Experts template
*/ 
    $pro_Expert_Location = get_post_meta(get_the_id(), 'pro-experts-location', true);
    $proExpertPicture = get_post_meta(get_the_id(), 'professional-expert-profile-picture', true);                          
?>
<!--Single Photographer -->
<div class="col-xl-4 col-12 col-md-6">
    <div class="single-photographer-list clearfix">
        <div class="photographer-cover-image">
            <?php the_post_thumbnail('nicdark_photographer_cover'); ?> 
                <div class="photographer-location">
                    <?php if(!empty($pro_Expert_Location)) : ?>
                        <p><?php echo esc_html($pro_Expert_Location); ?></p>
                    <?php endif; ?>  
                </div>                               
                <div class="single-photographer-picture">
                    <?php if(!empty($proExpertPicture)) : ?>
                        <img src="<?php echo esc_url($proExpertPicture); ?>" alt="">
                    <?php else : ?>
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) .'assets/images/thumbnail-default.png'); ?>" alt="">
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