<?php get_header(); ?>

<?php // single.php
	if(have_posts()):
		while(have_posts()): the_post();
	?>

<section class="page-content page-<?php the_ID(); ?>-content">
	<div class="mid-level-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2><?php the_title(); ?></h2>
					<div class="post-thumbnail">
						<?php
							$alttxt = get_the_title();
							if(has_post_thumbnail()):
								the_post_thumbnail('full', array('class' => 'post-img img-responsive', 'alt' => $alttxt));
							endif;
						?>
					</div>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
		endwhile;
	endif;
	wp_reset_postdata();
?>

<?php get_footer(); ?>