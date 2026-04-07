<?php
	$hero_subtitle = get_field('hero_subtitle');
	$hero_title = get_field('hero_title');
	$hero_description = get_field('hero_description');
	$download_pdf = get_field('pdf_report_download', 'options');
?>
<section class="hero" id="top" tab-index="-1">
	<div class="inner-wrapper">
		<a href="https://www.thegreenwebfoundation.org/" title="Visit the Green Web Foundation website" target="_blank" rel="noopener">
			<?php echo file_get_contents( get_template_directory_uri() . '/images/TGWF-logo.svg' ); ?>
		</a>
		<div class="flow">
			<?php if($hero_title): ?>
				<h1 class="hero--title"><?php echo esc_attr($hero_title); ?></h1>
			<?php else: ?>
				<h1 class="hero--title"><?php echo esc_attr(get_the_title()); ?></h1>
			<?php endif; ?>
			<?php if($hero_subtitle): ?>
				<p class="h5 caps"><?php echo esc_attr($hero_subtitle); ?></p>
			<?php endif; ?>
		</div>

		<?php if($hero_description): ?>
			<p class="hero--description"><?php echo $hero_description; ?></p>
		<?php endif; ?>

		<?php if($download_pdf): ?>
			<a class="btn btn--download" href="<?php echo esc_url($download_pdf); ?>" title="Download a PDF version of the report" download>Download PDF<span><svg aria-hidden="true" width="30" height="30"><use href="#arrow"></use></svg></span></a>
		<?php endif; ?>
	</div>
	<div class="grad--bg"></div>
</section>