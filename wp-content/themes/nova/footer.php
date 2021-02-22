<div class="mainFooter">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="footerLogo">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logoWhite.png" />
					<p class="slogan">The Best Professional Driving School in VA</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<?php dynamic_sidebar('DMV Useful Links'); ?> 
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<?php dynamic_sidebar('DMV Downloads'); ?> 
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<?php dynamic_sidebar('We accept all cards'); ?>
			</div>
		</div>
	</div>
</div>


<!-- footer start -->
<footer class="copyrights">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<p class="footer-copyright text-center">Copyright &copy; <?php echo date("Y"); ?> Nova Driving School VA. <span>All Rights Reserved.</span> <span>Powered by <a href="http://theagiletech.com">AgileTechnologies</a></span></p>
			</div>
		</div>
	</div>
</footer>
<!-- footer end -->
<?php wp_footer(); ?>
</body>
</html>