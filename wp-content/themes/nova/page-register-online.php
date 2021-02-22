<?php get_header(); ?>

<section class="page-<?php the_ID(); ?>-content">
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
</section>


<?php get_footer(); ?>