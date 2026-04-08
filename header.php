<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<meta name="keywords" content="">
	<?php wp_head(); ?>
	<link rel="preload" as="font" href="<?php echo esc_url(get_template_directory_uri()); ?>/fonts/TWKEverett-Regular.woff2" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo esc_url(get_template_directory_uri()); ?>/fonts/TWKEverett-Medium.woff2" type="font/woff2" crossorigin="anonymous">
	<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/favicon-16x16.png">
	<link rel="stylesheet" id="screen-css" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/style.min.css?ver=1.0.4" type="text/css" media="all">
</head>
<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#maincontent">Skip to content</a>

<?php
	$navMain = array(
		'theme_location'  => 'main',
		'menu'            => 'main',
		'container'       => '',
		'menu_class'      => '',
		'items_wrap'      => '<ol id="page-section-links" class="%2$s">%3$s</ol>',
		'walker'         => new Soffi_Nav_Walker(),
	);
?>
	<?php if(!is_404()): ?>
		<a id="gwf-icon" href="#top" title="Back to the top">
			<?php echo file_get_contents( get_template_directory_uri() . '/images/TGWF-icon.svg' ); ?>
		</a>
		<nav id="site-nav">
			<?php if ( has_nav_menu( 'main' ) ) {
				wp_nav_menu( $navMain );
			} ?>
		</nav>
	<?php endif; ?>

	<?php echo get_template_part('parts/content-start'); ?>