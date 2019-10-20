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
				?>
				<!-- single photographer finder -->
				<div class="col-md-4">
					<div class="single-pro-expert-photographer">
						<div class="pro-expert-photographer-full-thumb">
							<div class="pro-expert-photographer-cover-photo">
								<img src="<?php echo WP_PRO_PLUGIN_DIR ; ?>/assets/images/pro-expert-single-img01.jpg" alt="">
							</div>
							<div class="pro-expert-photographer-client">
								<div class="row">
									<div class="col-xl-4">
										<div class="pro-expert-photographer-category">
											<p>Los Angeles</p>
										</div>
									</div>
									<div class="col-xl-4">
										<div class="pro-expert-photographer-img">
											<img src="<?php echo WP_PRO_PLUGIN_DIR ; ?>/assets/images/team-photo-3.jpg" alt="">
										</div>
									</div>
									<div class="col-xl-4">
										<div class="pro-expert-photographer-review">

											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>

										</div>
									</div>
								</div>
							</div>
							<div class="single-pro-expert-social">
								<a href=""><i class="fab fa-facebook-f"></i></a>
								<a href=""><i class="fab fa-twitter"></i></a>
								<a href=""><i class="fab fa-linkedin-in"></i></a>
								<a href=""><i class="fab fa-instagram"></i></a>
							</div>
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