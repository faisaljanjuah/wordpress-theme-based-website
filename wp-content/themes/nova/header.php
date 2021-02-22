<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?php (is_front_page() || is_home()) ? bloginfo('description') : wp_title(''); echo ' | '; bloginfo('name'); ?></title>

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-iphone4.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-ipad-retina.png" />
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88919646-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-88919646-1');
	</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php 
$homeClass = '';
if(is_front_page()){
	$homeClass = 'home';
}
?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" <?php body_class($homeClass); ?>>
<!-- <div class="loader">
		<div class="rotator"></div>
	</div> -->

	<!--Home Start -->
	<Section id="Home">
		<div class="topHeader">
			<div class="container">
				<?php
					wp_nav_menu(array('theme_location' => 'ContactInfo', 'container' => false, 'menu_class' => 'topInfo' ));
				?>
				<ul id="social_icons"><li><a href="https://www.facebook.com/novadrivingschoolva"><i class="fa fa-fw fa-facebook"></i></a></li><li><a href="https://www.instagram.com/novadrivingva/"><i class="fa fa-fw fa fa-instagram"></i></a></li></ul>
			</div>
		</div>
		<nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<a class="side-menu-button"><span class="visible-menu-sm">Menu</span><i class="fa fa-bars" aria-hidden="true"></i></a>
				<div class="navbar-header">

					<a class="navbar-brand" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logoWhite.png" data-url="<?php echo get_template_directory_uri(); ?>" alt="Nova Driving School VA"></a>

				</div>
				<div class="container menu-lg">
					<div class="collapse navbar-collapse navbar-ex1-collapse  ">
						<?php 
						if(is_front_page()){
							wp_nav_menu(array('theme_location' => 'FrontPageMenu', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right' ));
						}
						else{
							wp_nav_menu(array('theme_location' => 'MainMenu', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right' ));
						}
						?>
					</div>
				</div>
				<div class="sidenav">
					<?php
					if(is_front_page()){
						wp_nav_menu(array('theme_location' => 'FrontPageMenu', 'container' => false, 'menu_class' => 'nav' )); 
					}
					else{
						wp_nav_menu(array('theme_location' => 'MainMenu', 'container' => false, 'menu_class' => 'nav' )); 
					}
					?>
				</div>

			</div>
		</nav>
		<?php
		if ( is_front_page() ){
			?>
			<div id="slider">
				<?php echo do_shortcode('[rev_slider alias="Nova Slider"]'); ?>
			</div>
			<?php
		}
		else { ?>
		<div <?php post_class('headerImage'); ?>>
			<span><?php 
			  $current_url="//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			?></span>
			<h1><?php
			  if( is_post_type_archive('packages')||is_post_type_archive('testimonials')){
				  echo post_type_archive_title();
			  }
			  elseif(strpos($current_url, '/blog/') !== false){
				  echo 'Blog - NOVA Driving School VA';
			  }
			  elseif (is_search()){
				  echo 'Search result for: "'.get_search_query().'"';
			  }
			  elseif (is_404()){
				  echo 'Page not found!!!' ;
			  }
			  else {
				  the_title(); 
			  }
			?></h1>
			<?php if(is_page_template('default_cities_template.php')): ?>
			<div class="col-xs-12 submitForm mt-20" id="enrolnw">
<a href="https://www.novadrivingschoolva.com/register-online" class="btn button">ENROLL NOW</a>
			</div>
		<?php endif; ?>
		</div>
		<script>
			jQuery(function(){
				jQuery('.headerImage').parallax({
					imageSrc: '<?php
					if(get_field('header_image')){echo the_field('header_image');}
					else {echo get_template_directory_uri()."/images/defaultBanner.jpg";}
					?>',
					speed: 0.3,
				});
			});
		</script>
		<?php
		}
		?>
</Section>
<!-- Home End -->