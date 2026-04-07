<?php if(!is_404()): ?>
	<div id="progress" role="progressbar" aria-label="progress"></div>
<?php endif; ?>
<?php echo get_template_part('parts/content-end');

$navFooter = array(
	'theme_location'  => 'footer',
	'menu'            => 'footer',
	'container'       => '',
	'menu_class'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);

?>
	<footer>
		<div class="inner-wrapper">
			<div>
				<a href="https://www.thegreenwebfoundation.org/" title="Visit the Green Web Foundation website" target="_blank" rel="noopener">
					<?php echo file_get_contents( get_template_directory_uri() . '/images/TGWF-logo.svg' ); ?>
				</a>
				<?php wp_nav_menu( $navFooter ); ?>
			</div>
			<div class="buttons">
				<?php
				$download_pdf = get_field('pdf_report_download', 'options');
				if($download_pdf): ?>
					<a class="download" href="<?php echo esc_url($download_pdf); ?>" title="Download a PDF version of the report" download><svg width="15" height="15" aria-hidden="true"><use href="#arrow"></use></svg><span>Download PDF</span></a>
				<?php endif; ?>
				<a href="#top" class="back-to-top"><svg width="15" height="15" aria-hidden="true"><use href="#arrow"></use></svg><span>Back to Top</span></a>
			</div>
		</div>
	</footer>

	<?php echo file_get_contents(get_template_directory_uri() . '/parts/icons/icons.svg'); ?>

	<svg class="sr-only" width="1" height="1" aria-hidden="true">
		<filter
			id="grainy-duotone"
			filterUnits="userSpaceOnUse"
			x="0" y="0"
			width="100%" height="100%"
			color-interpolation-filters="sRGB">
		<feTurbulence type="fractalNoise" baseFrequency="0.66" numOctaves="2" result="noise"/>
			<feColorMatrix type="saturate" values="0" in="noise" result="grayNoise"/>
			<feComponentTransfer in="SourceGraphic" result="duotone">
				<feFuncR type="table" tableValues="0.05 0.86"/>
				<feFuncG type="table" tableValues="0.05 0.86"/>
				<feFuncB type="table" tableValues="0.05 0.86"/>
			</feComponentTransfer>
			<feBlend mode="multiply" in="duotone" in2="grayNoise" result="textured"/>
			<feComponentTransfer in="textured">
				<feFuncA type="identity"/>
			</feComponentTransfer>
		</filter>
	</svg>

	<?php wp_footer(); ?>

	<!-- Privacy-first Analytics from Cabin -->
	<!-- <script async defer src="https://scripts.withcabin.com/hello.js"></script> -->

</body>
</html>