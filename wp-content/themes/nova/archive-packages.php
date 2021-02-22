<?php get_header(); ?>

<section id="portfolio" class="archive-<?php the_ID(); ?>-content">
	<div id="ourCourses" class="mid-level-padding">
		<div class="container">
			<div class="row">
				<?php include('templates/packages.php'); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>