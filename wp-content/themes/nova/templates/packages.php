<?php
	$courses = 'Courses';
	if ( is_archive() ){
		$courses = 'Packages';
	}
?>

<div class="col-xs-12">
	<div class="section-top-heading text-center">
		<h2 class="title">Our <?php echo $courses; ?></h2>
	</div>
</div>
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
	'posts_per_page' => 9,
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