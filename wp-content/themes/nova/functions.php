<?php
function nova_filesInjection(){
	wp_enqueue_style('Bootstyle', get_template_directory_uri().'/css/bootstrap.css', array(),'3.3.7','all');
	wp_enqueue_style('FontIcon', get_template_directory_uri().'/css/font-awesome.css', array(),'4.7.0','all');
	wp_enqueue_style('Settings', get_template_directory_uri().'/css/settings.css', array(),'2.0.0','all');
	wp_enqueue_style('Layers', get_template_directory_uri().'/css/layers.css', array(),'2.0.0','all');
	wp_enqueue_style('Navi', get_template_directory_uri().'/css/navigation.css', array(),'2.0.0','all');
	wp_enqueue_style('FStyle', get_template_directory_uri().'/fonts/stylesheet.css', array(),'2.0.0','all');
	wp_enqueue_style('Owl', get_template_directory_uri().'/css/owl.carousel.css', array(),'2.0.0','all');
	wp_enqueue_style('Fancy', get_template_directory_uri().'/css/fancybox.css', array(),'2.0.0','all');
	wp_enqueue_style('FancyThumbs', get_template_directory_uri().'/css/fancybox-thumbs.css', array(),'2.0.0','all');
	wp_enqueue_style('Animate', get_template_directory_uri().'/css/animate.css', array(),'2.0.0','all');
	wp_enqueue_style('Slick', get_template_directory_uri().'/css/slick.css', array(),'1.8.0','all');
	wp_enqueue_style('ThemeStyle', get_template_directory_uri().'/style.css', array(),'2.0.0','all');
 
	wp_enqueue_script('jqLib', get_template_directory_uri().'/js/jquery1.12.4.js', array(), '1.12.1', false);
	// wp_enqueue_script('jqLib', get_template_directory_uri().'/js/jquery.min.js', array(), '1.11.0', false);
	wp_enqueue_script('BootQuery', get_template_directory_uri().'/js/bootstrap.min.js', array(), '3.3.7', true);
	wp_enqueue_script('rTabsJS', get_template_directory_uri().'/js/responsiveTabs.min.js', array(), '1.6.1', true);
	wp_enqueue_script('OwlJS', get_template_directory_uri().'/js/owl.carousel.min.js', array(), '2.0.0', true);
	wp_enqueue_script('FancyJS', get_template_directory_uri().'/js/fancybox.pack.js', array(), '2.1.5', true);
	wp_enqueue_script('FancyThumbsJS', get_template_directory_uri().'/js/fancybox-thumbs.js', array(), '1.0.7', true);
	wp_enqueue_script('WowJS', get_template_directory_uri().'/js/wow.js', array(), '0.1.9', true);
	wp_enqueue_script('SlickJS', get_template_directory_uri().'/js/slick.min.js', array(), '1.8.0', true);
	wp_enqueue_script('Parallax', get_template_directory_uri().'/js/parallax.min.js', array(), '2.0.0', true);
// 	wp_enqueue_script('InstaFeeds', get_template_directory_uri().'/js/instafeed.min.js', array(), '2.0.0', false);
// 	wp_enqueue_script('Marquee', get_template_directory_uri().'/js/marquee.min.js', array(), '2.0.0', false);
	wp_enqueue_script('ScriptsJS', get_template_directory_uri().'/js/script.js', array(), '2.0.0', true);
}
add_action('wp_enqueue_scripts','nova_filesInjection');

add_action("wpcf7_before_send_mail", "wpcf7_filter_spams");  
function wpcf7_filter_spams($cf7) {
	$wpcf = WPCF7_ContactForm::get_current();
	$submission = WPCF7_Submission::get_instance();
	if ( $submission ) {
		$posted_data = $submission->get_posted_data();
		$lngth = 0;
// 		$ru   = ".ru";
		foreach($posted_data as $key=>$value){
			preg_match_all("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value, $match);
			$lngth = $lngth + count($match[0]);

    //         if( strpos( $value, $ru ) !== false) {
    //             $lngth = $lngth + 1;
    //         }
    //         print_r($value); 
    //         echo"\n";
            
    // // 		print_r($lngth);
    // // 		print_r($key .' > '. $value);
		
		}
		
		if($lngth > 0){
		    $submission->skip_mail = true;
		}
	}
	return $wpcf;
}

// // add defer and async in Javascript
// add_filter( 'clean_url', function( $url ){
// 	if ( FALSE === strpos( $url, '.js' ) ){
// 		return $url;
// 	}
// 	return "$url' defer='defer' async='async";
// }, 11, 1 );

// // add defer and async in CSS
// function addCustomAttr( $html, $handle, $href, $media ){
// 	$html = str_replace('href', "defer='defer' async='async' href", $html);
// 	return $html;
// }
// add_filter( 'style_loader_tag',  'addCustomAttr', 10, 4 );

function admin_js() {
	echo '<link type="text/css" rel="stylesheet" href="'.get_template_directory_uri().'/css/admin.css" />';
	echo '<script type="text/javascript" src="'. get_template_directory_uri() . '/js/admin.js"></script>';
}
add_action('admin_footer', 'admin_js');

function nova_menus(){
	add_theme_support('menus');
	register_nav_menu('FrontPageMenu', 'Frontpage Top Menu');
	register_nav_menu('MainMenu', 'Main Menu');
	register_nav_menu('ContactInfo', 'Contact Info');
	register_nav_menu('SocialLinks', 'Social Links');
}
add_action('init', 'nova_menus');

if ( is_admin() ) {
	function remove_revolution_slider_meta_boxes() {
		remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'packages', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'testimonial', 'normal' );
	}
	add_action( 'do_meta_boxes', 'remove_revolution_slider_meta_boxes' );
}

add_theme_support( 'post-thumbnails' );

function is_blog() {
	return ( is_archive() || is_category() ) && 'post' == get_post_type();
}

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});

// Nova Packages
function nova_packages() {
	$labels = array(
		'name'                  => 'Packages',
		'singular_name'         => 'Packages',
		'menu_name'             => 'Our Packages',
		'add_new'               => 'Add Package',
		'all_items'             => 'All Packages',
		'add_new_item'          => 'Add Package',
		'new_item'              => 'New Package',
		'edit_item'             => 'Edit Package',
		'update_item'           => 'Update Package',
		'view_item'             => 'View Package',
		'search_items'          => 'Search Package',
		'not_found'             => 'No package found',
		'not_found_in_trash'    => 'No package found in Trash',
		'parent_item_colon'	    => 'Parent package'
	);
	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'has_archive'           => true,
		'publicly_queryable'    => true,
		'query_var'		        => true,
		'rewrite' 		        => true,
		'capability_type' 	    => 'post',
		'hierarchical'          => false,
		'supports' 		        => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'menu_position'         => 5,
		'can_export'            => true,
		'exclude_from_search'   => false,
		'menu_icon'  		=> 'dashicons-tickets-alt',
	);
	register_post_type( 'Packages', $args );

}
add_action( 'init', 'nova_packages');

// Testimonials post Type
function nova_Testimonials() {
	$labels = array(
		'name'                  => 'Testimonial',
		'singular_name'         => 'testimonial',
		'menu_name'             => 'Testimonials',
		'add_new'               => 'Add Testimonial',
		'all_items'             => 'All Testimonials',
		'add_new_item'          => 'Add Testimonial',
		'new_item'              => 'New Testimonial',
		'edit_item'             => 'Edit Testimonial',
		'update_item'           => 'Update Testimonial',
		'view_item'             => 'View Testimonial',
		'search_items'          => 'Search Testimonial',
		'not_found'             => 'No Testimonial found',
		'not_found_in_trash'    => 'No Testimonial found in Trash',
		'parent_item_colon'	    => 'Parent Testimonial'
	);
	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'has_archive'           => true,
		'publicly_queryable'    => true,
		'query_var'		        => true,
		'rewrite' 		        => true,
		'capability_type' 	    => 'post',
		'hierarchical'          => false,
		'supports' 		        => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'menu_position'         => 9,
		'can_export'            => true,
		'exclude_from_search'   => false,
		'menu_icon'  			=> 'dashicons-format-quote',
	);
	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'nova_Testimonials');

function footerWidget(){
	register_sidebar(
		array(
			'name' => 'DMV Useful Links',
			'id' => 'footer-wiget1',
			'class' => 'custom',
			'description' => 'DMV Useful Links',
			'before_widget' => '<div class="footerSection">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => 'DMV Downloads',
			'id' => 'footer-wiget2',
			'class' => 'custom',
			'description' => 'DMV Downloads',
			'before_widget' => '<div class="footerSection">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => 'We accept all cards',
			'id' => 'footer-wiget3',
			'class' => 'custom',
			'description' => 'We accept all cards',
			'before_widget' => '<div class="footerSection">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'footerWidget');

// Post numbered navigation
function my_numeric_posts_nav() {
	if( is_singular() ){
		return;
	}
	global $wp_query;
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 ){
		return;
	}
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	/** Add current page to the array */
	if ( $paged >= 1 ){
		$links[] = $paged;
	}
	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<div class="num_pagination"><ul>' . "\n";
	/** Previous Post Link */
	if ( get_previous_posts_link() ){
		printf( '<li class="prevLink">%s</li>' . "\n", get_previous_posts_link() );
	}
	/** Link to first page, plus ellipses if necessary */

	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		if ( ! in_array( 2, $links ) ){
			echo '<li>…</li>';
		}
	}
	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ){
			echo '<li>…</li>' . "\n";
		}
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	/** Next Post Link */
	if ( get_next_posts_link() ){
		printf( '<li class="nextLink">%s</li>' . "\n", get_next_posts_link() );
	}
	echo '</ul></div>' . "\n";
}