<?php get_header(); ?>

<section id="contact-us" class="page-<?php the_ID(); ?>-content">
	<div id="contact-us2" class="mid-level-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="left-section">
					<?php
						$args = array(
							'type' => 'post',
							'posts_per_page' => 1,
							'category__in' => 9
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
									<h4>United States</h4>
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
	<div id="g-map" data-image="<?php echo get_template_directory_uri(); ?>/images/markeryellow.png">
		<div class="container-fluid ">
			<div class="row">
				<div id="map"></div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBUP1lTKTVLGnboU1PaU73gRS1DBTJ21LU"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/gmaps.min.js"></script>
<?php get_footer(); ?>
