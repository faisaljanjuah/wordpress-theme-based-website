<?php get_header(); ?>

<!-- about us start -->
<section id="about-us">
		<!--portfolio1 start -->
	<div id="ourCourses" class="mid-level-padding">
		<div class="container">
			<div class="row">
				<?php include('templates/packages.php'); ?>
			</div>
		</div>
	</div>
	<!--portfolio1 end -->
	<!-- about-us-1 start -->
	<div id="about-us-1" class="big-padding">

		<?php
			$args = array(
				'type' => 'post',
				'posts_per_page' => -1,
				'category__in' => 3 // Who we are
			);
			$welcome = new WP_Query($args);
			if($welcome->have_posts()):
				while($welcome->have_posts()): $welcome->the_post();
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 wow slideInLeft">
					<div class="outer-bound">
						<div class="left-section vertical-heading">
							<span>Who We Are</span>
							<h1 class="big-text"><?php the_title(); ?></h1>
						</div>
					</div>
					<?php 
						if( has_post_thumbnail() ) {
					?>
					<div class="welcome_image wow fadeInLeft" data-wow-duration="3s">
						<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
					</div>
					<?php } ?>
				</div>
				<div class="col-sm-6 wow slideInRight">
					<div class="right-section">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
				endwhile;
			endif;
			wp_reset_postdata();
		?>
	</div>
	<!-- about-us-1 end-->

	<!-- about-us-2 start-->
	<div id="about-us-2" class="mid-level-padding text-center">
		<div class="container">
			<div class="row">
				<?php
					$counter = 0;
					$slide = ['fadeInLeft','fadeInUp','fadeInRight'];
					$args = array(
						'type' => 'post',
						'order' => 'ASC',
						'posts_per_page' => 3,
						'category__in' => 4 // We offers
					);
					$about = new WP_Query($args);
					if($about->have_posts()):
						while($about->have_posts()): $about->the_post();
				?>
				<div class="col-sm-4 wow <?php echo $slide[$counter]; ?>"<?php if($counter==1) echo ' data-wow-duration="2s"'; ?>>
					<div class="left-section section we-offer">
						<h2><i class="<?php echo the_field('icon'); ?>" aria-hidden="true"></i><span class="sr-only">icon</span></h2>
						<h4><?php the_title(); ?></h4>
						<hr>
						<div class="we-offer-content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<?php
						$counter++;
						endwhile;
					endif;
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
	<!-- about-us-2 end-->
	
	<!-- about-us-4 start-->
	<div id="about-us-4" class="big-padding text-center">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 wow fadeIn">
					<div class="section">
						<h3><i class="fa fa-quote-left" aria-hidden="true"></i> And suddenly, I realized that I was no longer driving the car consciously.<br>I was driving it by a kind of instinct, only I was in a different dimension <i class="fa fa-quote-right" aria-hidden="true"></i></h3>
						<p>- Ayrton Senna -</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- about-us-4 end-->
	
	<!--portfolio3 start -->
	<div id="registerOnline" class="mid-level-padding">
		<div class="container">
			<div class="row text-center">
				<div class="col-xs-12">
					<div class="section-top-heading">
						<h5>Online Registration</h5>
						<h2>Enroll Now</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="2s">
				<?php
					echo do_shortcode('[contact-form-7 id="17" title="Register Online"]');
					$args = array(
						'type' => 'post',
						'posts_per_page' => 1,
						'category__in' => 6 // Contract Statement
					);
					$contract = new WP_Query($args);
					if($contract->have_posts()):
						while($contract->have_posts()): $contract->the_post();
							echo '<p class="important">'.get_the_content().'</p>';
						endwhile;
					endif;
					wp_reset_postdata();
				?>
				</div>
			</div>

		</div>
	</div>
	<!--portfolio3 end -->
	
	
	<!--  services start -->
	<section id="services">
		<!--  service-2 start -->
		<div id="service-2" class="mid-level-padding">
			<div id="responsiveTabsDemo">
				<?php
					$tabID = 1;
					$slideNum = [];
				?>
				<ul class="text-center">
				<?php
					$args = array(
						'type' => 'post',
						'posts_per_page' => 6,
						'category__in' => 14 // Tabs
					);
					$tabList = new WP_Query($args);
					if($tabList->have_posts()):
						while($tabList->have_posts()): $tabList->the_post(); ?>
							<li><a href="<?php echo '#tab-'.$tabID; ?>"><?php the_title(); ?></a></li>
					<?php	
							$slideNum[$tabID] = $tabID;
							$tabID++;
						endwhile;
					endif;
					wp_reset_postdata();
				?>
				</ul>
				<?php
					$tabID = 1;
					$args = array(
						'type' => 'post',
						'posts_per_page' => 6,
						'category__in' => 14 // Tabs
					);
					$tabBody = new WP_Query($args);
					if($tabBody->have_posts()):
						while($tabBody->have_posts()): $tabBody->the_post(); ?>
							<div id="<?php echo 'tab-'.$tabID; ?>">
								<div class="container">
									<div class="row">
										<div class="col-xs-12 flip-tabs">
											<div class="col-md-6">
												<div class="tabs-bg">
													<h2><?php echo '0'.$slideNum[$tabID]; ?></h2>
													<h3><?php the_title(); ?></h3>
													<?php the_content(); ?>
												</div>
											</div>
											<div class="col-md-6">
												<img src="<?php if(has_post_thumbnail()){the_post_thumbnail_url();}else{echo get_template_directory_uri().'/images/defaultTab.jpg';}?>" alt="<?php the_title(); ?>" class="element-center">
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php
							$tabID++;
						endwhile;
					endif;
					wp_reset_postdata();
				?>
			</div>
		</div>
		<!--  service-2 end -->

		<!-- Coverage Areas start -->

		<div id="coverage-areas" class="mid-level-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 wow slideInUp" data-wow-duration="2s">
						<div class="page-content">
							<?php
								$page = get_posts(
									array(
										'name'      => 'coverage-areas',
										'post_type' => 'page'
									)
								);
								if( $page ) :
									echo $page[0]->post_content;
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--  Coverage Areas end -->

		<!-- service-3 start -->
		<div id="service-3" class="mid-level-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 wow slideInLeft">
						<div class="top-section vertical-heading">
							<span>fun facts</span>
							<h2>We Give<br><strong>Excellent</strong> Services</h2>
						</div>
					</div>
				</div>
				<div class="row wow fadeInUp" data-wow-duration="2s">
					<div class="col-sm-12">
						<div class="bottom-section text-center">
							<div class="row">
								<?php
									$args = array(
										'type' => 'post',
										'order' => 'ASC',
										'posts_per_page' => 4,
										'category__in' => 5 // Fun facts
									);
									$funfacts = new WP_Query($args);
									if($funfacts->have_posts()):
										while($funfacts->have_posts()): $funfacts->the_post();
								?>
								<div class="col-sm-3 col-xs-6">
									<div class="left-section section">
										<h2><i class="<?php echo the_field('icon'); ?>" aria-hidden="true"></i><span class="sr-only">icon</span></h2>
										<h3><?php echo get_the_content(); ?></h3>
										<p><?php the_title(); ?></p>
									</div>
								</div>
								<?php
										endwhile;
									endif;
									wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- service-3 end -->
	</section>
	<!--  services end-->
	
	
	<!--  portfolio start-->
	<section id="portfolio">
		<!-- portfolio-2 start -->
		<div id="testimonials">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 wow slideInLeft">
						<div class="vertical-heading low-level-padding ">
							<span>Who We Are</span>
							<h2>Don’t Take <br><strong>Our Word</strong> for It</h2>
						</div>
					</div>
					<div class="col-sm-8 wow fadeIn" data-wow-duration="2s">
						<div id="client-slider" class="testimonial-slider">
							<?php
								$args = array(
									'post_type' => 'testimonial',
									// 'order' => 'ASC',
									'posts_per_page' => 6,
									'category__in' => 2 // Testimonials
								);
								$testimonials = new WP_Query($args);
								if($testimonials->have_posts()):
									while($testimonials->have_posts()): $testimonials->the_post();
							?>
							<div class="item">
								<div class="row">
									<div class="col-xs-12">
										<h3><?php the_title(); ?></h3>
									</div>
								</div>
								<div class="long">
									<?php the_content(); ?>
								</div>
								<div class="client">
									<div class="row">
										<div class="col-xs-12">
											<div class="client-name">
												<p>City</p>
												<p><?php echo the_field('cityname'); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
									endwhile;
								endif;
								wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- portfolio-2 end -->
	</section>
	<!--  portfolio end-->
	
	<!-- about-us-3 start -->
	<?php 
		$textSlider = 16;
	?>
	<div id="about-us-3" class="mid-level-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 wow slideInLeft clr-sm" id="of">
					<div class="top-section vertical-heading">
						<span>Who We Are</span>
						<h2>Wait,<br>there’s <strong>more!</Strong></h2>
					</div>
					<?php echo category_description($textSlider); ?>
				</div>
				<div class="col-sm-6 wow slideInRight clr-sm">
					<div class="thumbnailSection">
						<?php
							$args = array(
								'type' => 'post',
								'category__in' => $textSlider // Text Slider
							);
							$textLoop = new WP_Query($args);
							if($textLoop->have_posts()):
								while($textLoop->have_posts()): $textLoop->the_post(); ?>
									<div class="itemSection">
										<div class="block_heading">
											<h2><?php the_title(); ?></h2>
										</div>
									</div>
						<?php	endwhile;
							endif;
							wp_reset_postdata();
						?>
					</div>
				</div>
				<div class="col-sm-12 wow slideInBottom clr-sm">
					<div id="content-slider">
						<?php
							$args = array(
								'type' => 'post',
								'category__in' => $textSlider // Text Slider
							);
							$textLoop = new WP_Query($args);
							if($textLoop->have_posts()):
								while($textLoop->have_posts()): $textLoop->the_post(); ?>
									<div class="item-content">
										<?php the_content(); ?>
									</div>
						<?php	endwhile;
							endif;
							wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- about-us-3 end -->
</section>
<!-- about us end -->

<!-- Blog start -->
<section id="ourBlog">
	<?php
		$blog = 13; // category ID
	?>
	<div id="blogSection" class="mid-level-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-4 wow slideInLeft">
					<div class="left-section">
						<div class="top-section vertical-heading">
							<span>Who We Are</span>
							<h2>
								From<br>
								The <strong>Blog</strong>
							</h2>
						</div>
						<?php
							echo category_description($blog);
						?>
						<a class="btn button" href="<?php echo get_permalink( get_page_by_title( 'Blog' ) ) ?>">View All Posts</a>
					</div>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-8">
					<div class="row wow fadeInUp" data-wow-duration="3s">
						<?php
							$args = array(
								'type' => 'post',
								'posts_per_page' => 2,
								'category__in' => $blog
							);
							$blogLoop = new WP_Query($args);
							if($blogLoop->have_posts()):
								while($blogLoop->have_posts()): $blogLoop->the_post();
						?>
						<div class="col-sm-6">
							<div class="middle-section blog-section wow">
								<h4><?php the_title(); ?></h4>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>">Read More ></a>
								<div class="user">
									<div class="row">
										<div class="col-xs-12">
											<div style="display: inline-block; width: 70%;">
												<div class="post_user" style="background-image: url(<?php 
												if( has_post_thumbnail() ) {
													the_post_thumbnail_url('thumbnail');
												}
												else {
													echo get_template_directory_uri().'/images/user.png'; 
												}
											?>);"></div>
											<p><span class="userName"><?php 
												if( get_field('blogUser') ){
													echo the_field('blogUser');
												}
												else {
													echo 'Website Admin';
												}
											?></span></p>
											</div>
											<p class="text-right" style="float: right;"><?php echo get_the_date('F j, Y'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
								endwhile;
							endif;
							wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog end -->

<!-- contact us start -->
<section id="contact-us">
	<?php
	$args = array(
		'type' => 'post',
		'posts_per_page' => 1,
		'category__in' => 18 // facebook post
	);
	$contact = new WP_Query($args);
	if($contact->have_posts()):
		while($contact->have_posts()): $contact->the_post();
			?>
			<div class="fb-area">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="fb-dtable">
								<div class="fb-post-container">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;
	wp_reset_postdata();
	?>

	<!-- contact-us2 start -->
	<div id="contact-us2" class="mid-level-padding">
		<div class="container">

			<div class="row">
				<div class="col-sm-6">
					<div class="left-section">
					<?php
						$args = array(
							'type' => 'post',
							'posts_per_page' => 1,
							'category__in' => 9 // Contact Statement
						);
						$contact = new WP_Query($args);
						if($contact->have_posts()):
							while($contact->have_posts()): $contact->the_post();
					?>
						<div class="vertical-heading">
							<span>Who We Are</span>
							<h2><?php the_title(); ?></h2>
						</div>
						<?php the_content(); ?>
					<?php
							endwhile;
						endif;
						wp_reset_postdata();
					?>
						<div id="countries">
							<div class="row">
								<div class="col-xs-12">
									<h4>NOVA Driving School</h4>
									<?php wp_nav_menu(array('theme_location' => 'ContactInfo', 'container' => false, 'menu_class' => 'details one' )); ?>
								</div>
							</div>
						</div>
						<?php wp_nav_menu(array('theme_location' => 'SocialLinks', 'container' => false, 'menu_class' => 'list-inline' )); ?>
					</div>

				</div>
				<div class="col-sm-6">
					<div class="right-section" id="form-elements">
						<?php echo do_shortcode('[contact-form-7 id="85" title="Contact Form"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- contact-us2 end-->

	<!-- contact-us3 start-->
	<!--/g-map-->
	<div id="g-map" data-image="<?php echo get_template_directory_uri(); ?>/images/markeryellow.png">
		<div class="container-fluid ">
			<div class="row">
				<div id="map"></div>
			</div>
		</div>
	</div>
	<!--/g-map-->
	<!-- contact-us3 end-->

</section>
<!-- contact us end -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBUP1lTKTVLGnboU1PaU73gRS1DBTJ21LU"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/gmaps.min.js"></script>
<script type="text/javascript">
</script>
<?php get_footer(); ?>