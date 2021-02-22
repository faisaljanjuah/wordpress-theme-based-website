<?php get_header(); ?>

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