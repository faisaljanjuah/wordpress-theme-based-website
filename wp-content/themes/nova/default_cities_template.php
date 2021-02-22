<?php 
/*
	Template Name: Default_cities 
*/
get_header(); ?>

<section class="page-content page-<?php the_ID(); ?>-content">
	<div class="low-level-padding">
		<div class="container">
			<div class="row" id="safty-row">
				<img src="https://www.novadrivingschoolva.com/wp-content/uploads/safimg.jpg" />
				<div class="cont_div">
				<h3 id="cont_over"><?php the_field('safty_first_content'); ?></h3>
			    </div>
				<div class="saf_cont">
				<?php echo the_content(); ?>
				<div class="col-xs-12 submitForm mt-20">
					<a href="<?php echo get_permalink( get_page_by_title( 'Courses' ) ); ?>" class="btn button">Explore Courses</a>
				</div>
			    </div>
			</div>
			<div class="row">
			<div class="col-xs-12">
	            <div class="section-top-heading text-center">
		          <h2 class="title">Our Courses</h2>
	          </div>
                </div>
				<div <?php post_class('col-xs-12'); ?>>
<div class="novaCourses">
<?php
$counter = 0;
$link = '#registerOnline';
$scroll = 'scroll';
if(!is_front_page()){
	$link = get_permalink( get_page_by_title( 'Register Online' ) );
	$scroll = '';
}

$slide = ['fadeInLeft','fadeInUp','fadeInRight','fadeInLeft','fadeInUp','fadeInRight'];
$args = array(
	'post_type' => 'packages',
	'posts_per_page' => 3,
	// 'category__in' => 11 // packages
);
$about = new WP_Query($args);
if($about->have_posts()):
	while($about->have_posts()): $about->the_post();
		?>
		<div class="course-<?php the_ID(); ?> col-sm-4 colsm-2 wow <?php echo $slide[$counter]; ?>"<?php if($counter==1||$counter==4) echo ' data-wow-duration="2s"'; ?>>
			<div class="pricing-table <?php if($counter<=2)echo 'tablRow1'; else echo 'tablRow2'; ?>">
				<div class="type">
					<h4><?php the_title(); ?></h4>
				</div>
				<div class="price">
					<div class="row">
						<div class="col-xs-4">
							<h2><span class="dollar">&#36;</span> <?php echo the_field('course_price'); ?></h2>
						</div>
						<div class="col-xs-8">
							<p><?php echo the_field('courses_description'); ?></p>
						</div>
					</div>
				</div>
				<?php the_content(); ?>
				<a href="<?php echo $link; ?>" class="btn button <?php echo $scroll; ?>">Get Started</a>
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
		</div>
	</div>
</section>
<div id="reviews-page">
	<?php $vidReviewsId = 17; ?>
	<section id="videoReviews" class="reviews-<?php the_ID(); ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-8">
					<div class="videoSlider">
						<?php
						$args = array(
							'type' => 'post',
							'posts_per_page' => 6,
						'category__in' => $vidReviewsId // Video Reviews
					);
						$vidReviews = new WP_Query($args);
						if($vidReviews->have_posts()):
							while($vidReviews->have_posts()): $vidReviews->the_post();
								?>
								<div class="sliderItem">
									<div class="videoWrapper">
										<?php echo get_the_content(); ?>
									</div>
								</div>
								<?php
							endwhile;
						endif;
						wp_reset_postdata();
						?>
					</div>
				</div>
				<div class="col-md-5 col-sm-4">
					<div class="top-section vertical-heading right">
						<span>Who We Are</span>
						<h2>
							From<br>
							Our <strong>Students</strong>
						</h2>
					</div>
					<?php echo category_description($vidReviewsId); ?>
					<div class="videoControls">
						<div class="videoArrows">
							<div class="videoDots"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="testimonial-reviews" id="portfolio">
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
</div>
	
<?php get_footer(); ?>