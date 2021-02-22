<?php 
/*
	Template Name: Cities 
*/
get_header(); ?>

<section class="page-content page-<?php the_ID(); ?>-content">
	<div class="low-level-padding">
		<div class="container">
			<div class="row">
				<div <?php post_class('col-xs-12'); ?>>
					
					<?php
					if(have_posts()):
						while(have_posts()) : the_post();
							// the_title();
							the_content();
						endwhile;
					endif;
					wp_reset_postdata();
					?>

				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 submitForm mt-20">
					<a href="<?php echo get_permalink( get_page_by_title( 'Courses' ) ); ?>" class="btn button">Explore Courses</a>
				</div>
				<?php // include('templates/packages.php'); ?>
			</div>
			
		</div>
	</div>
</section>

	
<?php get_footer(); ?>