<?php get_header(); ?>

	<section class="hero">
		<div class="inner-wrapper">
			<?php echo file_get_contents( get_template_directory_uri() . '/images/TGWF-logo.svg' ); ?>
			<div class="flow">
				<h1>404</h1>
				<h2 class="h3">Sorry, this page doesn't exist.</h2>
				<a class="btn btn--home" href="/" title="Back to the homepage">View the report<span><svg aria-hidden="true" width="30" height="30"><use href="#arrow"></use></svg></span></a>
			</div>
		</div>
		<div class="grad--bg"></div>
	</section>

<?php get_footer(); ?>