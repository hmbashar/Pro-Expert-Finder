<?php
$pro_expert_slider = get_post_meta(get_the_ID(), 'pro_expert_profession_slider_group', true);

?>
<section class="focal-slider-section">
	<div class="focal-slider-area">
		<div class="focal-slider-content owl-carousel">
			<?php 
				if(!empty($pro_expert_slider)) : foreach($pro_expert_slider as $pro_slider) :
			?>
			<!-- single sliders start -->
			<div class="focal-single-slide-content">
				<div class="focal-single-slide-img">
					<img src="<?php echo esc_url($pro_slider['professional-expert-slider-image']); ?>" alt="">
				</div>
				<div class="focal-single-slide-name">
					<div class="focal-single-slide-title">
						<h2><?php echo esc_html($pro_slider['professional-expert-slider-text']); ?></h2>						
					</div>
					<div class="focal-single-slide-more">
						<a href="<?php echo esc_url($pro_slider['professional-expert-slider-learn-url']); ?>"><?php echo esc_html($pro_slider['professional-expert-slider-learn-text']); ?></a>				
					</div>						
				</div>
			</div>
			<!-- single sliders Ends -->	
			<?php endforeach; endif; ?>
		</div>
	</div>
</section>