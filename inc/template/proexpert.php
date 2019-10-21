<?php 
/*
Template Name: Pro Expert Finder
*/
get_header();  ?>

<section class="pro-expert-finder-area">
	<div class="container">
		<!-- pro expert finder form -->
		<div class="row">
			<div class="col-xl-12">
				<div class="pro-expert-finder-form">
					<form action="">
						<input type="text" placeholder="Your Name" name="" id="">
						<input type="submit" value="submit">
					</form>
				</div>
			</div>
		</div>
		<!--/ pro expert finder form -->
		<div class="pro-expert-finder-photographer">
			<div class="pro-expert-finder-title">
				<h2>Select Your Photographer</h2>
			</div>
			<div class="row">
				<?php 
				$pro_expert_finder = new WP_Query(array(
					'post_type'		=> 'pro-experts',
					'posts_per_page' => -1
				));
				if($pro_expert_finder->have_posts()) : while($pro_expert_finder->have_posts()) : $pro_expert_finder->the_post();
					$pro_categories = get_the_terms(get_the_ID(), 'pro-expert-cat');
					$pro_expert_location = get_post_meta(get_the_ID(), 'pro-experts-location', true);
					$pro_expert_picture = get_post_meta(get_the_ID(), 'professional-expert-profile-picture', true);
					$pro_expert_facebook = get_post_meta(get_the_ID(), 'pro-experts-facebook-url', true);
					$pro_expert_twitter = get_post_meta(get_the_ID(), 'pro-experts-twitter-url', true);
					$pro_expert_linkedin = get_post_meta(get_the_ID(), 'pro-experts-linkedin-url', true);
					$pro_expert_instagram = get_post_meta(get_the_ID(), 'pro-experts-instagram-url', true);
					?>
					<!-- single photographer finder -->
					<div class="col-md-4">
						<div class="single-pro-expert-photographer">
							<div class="pro-expert-photographer-full-thumb">
								<div class="pro-expert-photographer-cover-photo">
									<?php 
										if(has_post_thumbnail()) : 
											the_post_thumbnail( 'proexpert-cover-photo');
										else :
									?>
										<img src="<?php echo WP_PRO_PLUGIN_DIR ; ?>/assets/images/default-thumb.png" alt="<?php the_title(); ?>">
									<?php endif; ?>

									<div class="pro-expert-photographer-client">
										<div class="row m-0">
											<?php if(!empty($pro_categories)) : ?>
											<div class="col-xl-5 p-0">
												<div class="pro-expert-photographer-category pl-2 pr-1">
													<p title="<?php  echo esc_html($pro_categories[0]->name); ?>" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-folder-open"></i> 
													<?php 														
														echo esc_html(wp_trim_words( $pro_categories[0]->name, 2, ' ..' ));
													?>
													</p>
												</div>
											</div>
											<?php endif; ?>

											<div class="col-xl-3">
												<div class="pro-expert-photographer-img">
													<?php if(!empty($pro_expert_picture)) : ?>
														<img src="<?php echo esc_url($pro_expert_picture); ?>" alt="">
													<?php else : ?>
														<img src="<?php echo WP_PRO_PLUGIN_DIR ; ?>/assets/images/default-thumb.png" alt="<?php the_title(); ?>">
													<?php endif; ?>
												</div>
											</div>
											<?php if(!empty($pro_expert_location)) : ?>
												<div class="col-xl-4 p-0">
													<div class="pro-expert-finder-location pl-2 pr-2">
														<p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($pro_expert_location);?></p>
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<?php if(!empty($pro_expert_facebook) || !empty($pro_expert_twitter) ||!empty($pro_expert_linkedin) ||!empty($pro_expert_instagram)) : ?>
									<div class="single-pro-expert-social">
										<?php if(!empty($pro_expert_facebook)) : ?>
											<a href="<?php echo esc_url($pro_expert_facebook); ?>" title="Facebook"><i class="fab fa-facebook-f"></i></a>
										<?php endif; ?>
										<?php if(!empty($pro_expert_twitter)) : ?>
											<a href="<?php echo esc_url($pro_expert_twitter); ?>" title="Twitter"><i class="fab fa-twitter"></i></a>
										<?php endif; ?>
										<?php if(!empty($pro_expert_linkedin)) : ?>
											<a href="<?php echo esc_url($pro_expert_linkedin); ?>" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
										<?php endif; ?>

										<?php if(!empty($pro_expert_instagram)) : ?>
											<a href="<?php echo esc_url($pro_expert_instagram); ?>" title="Instagram"><i class="fab fa-instagram"></i></a>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="pro-expert-finder-author-title">
										<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
										<a href="<?php the_permalink(); ?>"><?php _e('View Portfolio', 'proexpert');?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ single photographer finder -->
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>





<?php get_footer();