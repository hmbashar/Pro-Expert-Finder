<?php 

get_header(); 

if(have_posts()) : while(have_posts()) : the_post();

/*-----------------------------
* Metabox Variable
-------------------------------*/
$pro_expert_value = get_post_meta(get_the_ID(), 'pro_expert_value_group', true);
$pro_expert_pic = get_post_meta(get_the_ID(), 'professional-expert-profile-picture', true);
$pro_expert_about_me_desc = get_post_meta(get_the_ID(), 'pro_expert-short-desc', true);
$pro_expert_profession = get_post_meta(get_the_ID(), 'pro_expert_profession_group', true);
$pro_expert_skill_desc = get_post_meta(get_the_ID(), 'pro_expert-skill-short-desc', true);
$pro_expert_skill_url = get_post_meta(get_the_ID(), 'pro_expert_skill_contact_url', true);
$pro_expert_skills = get_post_meta(get_the_ID(), 'pro_expert_skills_group', true);
$pro_expert_resume_desc = get_post_meta(get_the_ID(), 'pro_expert-result-short-desc', true);
$pro_expert_resume_url = get_post_meta(get_the_ID(), 'pro_expert_resume_download_url', true);
$pro_expert_edu_desc = get_post_meta(get_the_ID(), 'pro_expert-education-short-desc', true);
$pro_expert_edu_list = get_post_meta(get_the_ID(), 'pro_expert_education_group', true);

include_once( WP_PRO_PLUGIN_PATH . 'inc/template/header.php' );
?>


<section class="focal-services-area">
	<div class="focal-services">
		<div class="container">
			<div class="row">
				<?php 
					if(!empty($pro_expert_value)) : foreach($pro_expert_value as $pro_value) :
				?>
				<!-- single services -->
				<div class="col-xl-4">
					<div class="focal-single-services">
						<h2><?php echo esc_html($pro_value['pro_expert_value_title']); ?></h2>
						<p><?php echo esc_html($pro_value['pro_expert_value_content']); ?></p>
					</div>
				</div>
				<!-- single services -->
				<?php endforeach; endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="focal-about-me-area">
	<div class="focal-about-me">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-5 pl-0">
					<div class="focal-about-left-images">
						<?php if(!empty($pro_expert_pic)) : ?>
							<img src="<?php echo esc_url($pro_expert_pic); ?>" alt="<?php the_title(); ?>">
						<?php else : ?>
							<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/default-thumb.png" alt="<?php the_title(); ?>">
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xl-7">
					<div class="focal-about-right-site">
						<div class="focal-about-title">
							<h2>About Me</h2>
							<?php echo wpautop($pro_expert_about_me_desc); ?>
						</div>
						<div class="focal-about-services">
							<div class="row">
								<?php 
									if(!empty($pro_expert_profession)) : foreach($pro_expert_profession as $pro_profession) :
								?>
								<div class="col-xl-6">
									<div class="single-focal-about-services">
										<div class="single-focal-about-services-icon">
											<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/about-services/icon01.png" alt="">
										</div> 
										<div class="single-focal-about-services-text">
											<h2><?php echo esc_html($pro_profession['pro_expert_professoin_name']); ?></h2>
											<p><?php echo esc_html($pro_profession['pro_expert_professoin_content']); ?></p>
										</div>
									</div>
								</div>
								<?php endforeach; endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="focal-my-skills-area">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="focal-my-skills-left">
					<div class="my-skills-title">
						<h2>My Skills</h2>
						<?php echo wpautop($pro_expert_skill_desc); ?>

						<a href="<?php echo esc_url($pro_expert_skill_url); ?>">Contact Me</a>

					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="focal-skills-progressbar">
					<?php 
						if(!empty($pro_expert_skills)) : foreach($pro_expert_skills as $pro_skills) :
					?>
					<div class="focal-single-progressbar">
						<h4><?php echo esc_html($pro_skills['pro_expert_skill_name']); ?></h4>
						<div class="progress">
						<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo esc_html($pro_skills['pro_expert_skill_percent']); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<?php endforeach; endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="focal-resume-area">
	<div class="container">
		<div class="single-focal-resume-content">
			<h2>RESUME</h2>
			<p><?php echo esc_html($pro_expert_resume_desc); ?></p>
			<a href="<?php echo esc_url($pro_expert_resume_url); ?>">Download Resume</a>
		</div>
	</div>
</section>

<section class="focal-education-section">
	<div class="container">
		<!-- Single Focal Education Area Start -->
		<div class="single-focal-education-area">
			<div class="row">
				<div class="col-xl-6">
					<div class="focal-experince-left-site">
						<h2>My Education</h2>
						<?php echo wpautop($pro_expert_edu_desc); ?>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="focal-experince-right-site">
						<?php 
							if(!empty($pro_expert_edu_list)) : foreach($pro_expert_edu_list as $pro_education) :
						?>
						<!-- focal single experince right post start -->
						<div class="focal-single-experince-right-post">
							<div class="single-experince-right-post-title">
								<h2><?php echo esc_html($pro_education['pro_expert_education_name']); ?></h2>
								<p> <strong><?php echo esc_html($pro_education['pro_expert_collage_name']); ?>  / </strong><?php echo esc_html($pro_education['pro_expert_education_year']); ?> </p>
								<a><?php echo esc_html($pro_education['pro_expert_education_gpa']); ?> </a>
							</div>
							<div class="single-experince-right-post-content">
								<p><?php echo esc_html($pro_education['pro_expert_education_desc']); ?></p>
							</div>
						</div>
						<!-- focal single experince right post ends -->
						<?php endforeach; endif; ?>

					</div>
				</div>
			</div>
		</div>	<!-- Single Focal Education Area Ends -->
	</div>
</section>

<section class="focal-client-area-section">
	<div class="container">
		<div class="focal-client-area owl-carousel">
			<?php 
				$pro_expert_review = new WP_Query(array(
					'post_type'		=> 'pro-expert-review',
					'posts_per_page' => 10,
				));
				if($pro_expert_review->have_posts()) : while($pro_expert_review->have_posts()) : $pro_expert_review->the_post();
					$pro_expert__selected = get_post_meta(get_the_ID(), 'pro_expert_select_for_review', true);
					$pro_expert__unique_id = get_post_meta(get_the_ID(), 'pro_expert_unique_id', true);
					if(!empty($pro_expert__selected)) {
						$pro_expert__selected_id = $pro_expert__selected;
					}elseif (!empty($pro_expert__unique_id)) {
						$pro_expert__selected_id = $pro_expert__unique_id;
					}else {
						$pro_expert__selected_id = NULL;
					}
					$pro_expert__id = get_queried_object_id(); 


					if($pro_expert__selected_id == $pro_expert__id )  :
			?>					
			<div class="single-focal-client">
				<?php the_content(); ?>
				<h3><?php the_title(); ?></h3>
			</div>
			<?php endif; endwhile; endif; ?>
		</div>
	</div>
</section>
<section class="focal-portfolio-area-section">
	<div class="focal-portfolio-area">
		<div class="container">
			<div class="focal-portfolio-section-title">
				<h2>Portfolio</h2>
				<p>Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri. </p>
			</div>
			<div class="focal-portfoio-mixetup-area">

				<div class="row focal-portfolio-mix">

					<!-- single portfolio item start -->
					<div class="col-xl-4 single-portfolio-filter-cat">
					
							<div class="portfolio-filter-title">
								<h2>Filter By Category</h2>
								
								<ul class="ul-area">
									<li data-filter="*">all</li>
									<li data-filter=".themes">themes</li>
									<li data-filter=".icons">icons</li>
									<li data-filter=".patterms">patterms</li>
									<li data-filter=".kits">ui kits</li>
								</ul>
							</div>
					</div>
					<!-- single portfolio item ends -->

					<!-- single portfolio item start -->
					<div class="col-xl-4 mix themes">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
					<!-- single portfolio item start -->
					<div class="col-xl-4 mix icons">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
					<!-- single portfolio item start -->
					<div class="col-xl-4 mix patterms">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
					<!-- single portfolio item start -->
					<div class="col-xl-4 mix themes">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
					<!-- single portfolio item start -->
					<div class="col-xl-4 mix icons">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
					<!-- single portfolio item start -->
					<div class="col-xl-4 mix patterms">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
					<!-- single portfolio item start -->
					<div class="col-xl-4 mix kits">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
					<!-- single portfolio item start -->
					<div class="col-xl-4 mix themes">
						<div class="single-portfolio-item">
							<div class="single-portfolio-item-thumb">
								<img src="<?php echo WP_PRO_PLUGIN_DIR; ?>/assets/images/pro-expert-mixetup-img01.png" alt="">
							</div>
							<div class="single-portfolio-item-view">
								<a href=""><i class="fas fa-search"></i></a>
							</div>
						</div>
					</div>
					<!-- single portfolio item ends -->
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
endwhile; endif;

get_footer();