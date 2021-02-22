<?php get_header(); ?>

<section class="page-content page-<?php the_ID(); ?>-content">
	<div class="low-level-padding">
		<div class="container">
			<div class="row">
				<div <?php post_class('col-xs-12 not-found'); ?>>
					<h1 class="error-title">Error 404</h1>
					<p class="error-des">Oops! That page can&rsquo;t be found. </p>
					<p>It looks like nothing was found at this location. Maybe try a search?</p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

	
<?php get_footer(); ?>