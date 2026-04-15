<?php if(!is_404()): ?>
	<div id="progress" role="progressbar" aria-label="progress"><div class="progress-bar-inner"></div></div>
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
					<a class="download" data-cabin-event="Download full report PDF - Footer" href="<?php echo esc_url($download_pdf); ?>" title="Download a PDF version of the report" download><svg width="15" height="15" aria-hidden="true"><use href="#arrow"></use></svg><span>Download PDF</span></a>
				<?php endif; ?>
				<a href="#top" class="back-to-top"><svg width="15" height="15" aria-hidden="true"><use href="#arrow"></use></svg><span>Back to Top</span></a>
			</div>
		</div>
	</footer>

	<svg style="display:none;" xmlns="http://www.w3.org/2000/svg">
	    <symbol id="arrow" viewBox="0 0 15 15"><title>arrow</title><path d="M15 7.58723L7.5 0L0 7.56726L1.10526 8.68538L6.75 2.97499L6.75 14.0459L8.28947 14.0459L8.28947 3.03489L13.8947 8.70534L15 7.58723Z"/></symbol>
	    <symbol id="chevron-down" viewBox="0 0 128 128"><title>chevron-down</title><path d="m24 45 40 41 40-41"/></symbol>
	    <symbol id="flame-icon" viewBox="0 0 158 191"><title>Green Web Foundation flame icon</title><path d="M0 109.644V112.012C0 155.391 35.3099 190.774 78.7796 190.774C122.249 190.774 157.559 155.539 157.559 112.012V109.644H0ZM76.4058 151.393V185.592C67.3558 183.52 56.3771 170.788 49.5525 151.393H76.4058ZM47.9205 146.508C45.1017 137.033 43.3214 126.225 43.173 114.529H76.4058V146.508H47.9205V146.508ZM81.3017 185.592V151.393H107.858C106.078 156.131 104.149 160.72 101.776 164.866C95.5444 176.265 87.8296 183.964 81.3017 185.592ZM81.3017 146.508V114.529H114.535C114.386 125.485 112.606 136.44 109.49 146.508H81.3017V146.508ZM38.2771 114.529C38.4255 125.929 40.2058 136.884 42.8763 146.508H13.3525C8.30821 136.884 5.19263 126.077 4.89591 114.529H38.2771ZM16.1713 151.393H44.5083C49.4042 166.198 56.8222 177.894 64.6853 184.556C44.3599 180.707 26.8533 168.271 16.1713 151.393ZM92.7255 184.704C100.589 177.894 108.007 166.198 112.903 151.393H141.388C130.706 168.419 113.199 180.707 92.7255 184.704ZM144.207 146.508H114.535C117.353 136.736 119.134 125.929 119.43 114.529H152.812C152.367 126.077 149.399 136.884 144.207 146.508Z" fill="white"/><path d="M28.2108 109.556C26.4452 103.376 25.2093 96.7549 25.2093 90.7519C25.2093 81.2176 29.3584 73.6256 32.7131 69.1233L40.57 89.516L40.7466 89.8691C44.4543 95.9604 52.4878 97.9909 58.5791 94.3714L60.5213 93.2237L63.1697 56.7641L67.9368 62.1492C69.9673 64.5327 73.3219 65.239 76.1469 64.003C78.9718 62.7671 80.7374 59.8539 80.4726 56.7641C79.6781 47.9361 78.4422 36.2831 76.6766 27.102L82.5913 33.105C89.8303 47.1415 94.5091 62.2374 96.4513 77.9513L97.4224 85.5434L103.337 80.688C108.546 76.4505 111.989 70.4475 113.136 63.9148L115.52 50.3196L124.613 62.9437C125.849 65.5038 136.266 88.0152 130.792 109.644H139.444C141.298 100.904 141.298 91.2816 139.355 81.1294C136.884 68.3288 132.205 59.2359 132.028 58.8828L110.753 29.1324L104.838 62.5023C104.573 64.1796 104.043 65.8569 103.337 67.3577C100.689 53.9391 96.1864 40.9619 89.8303 28.691L89.4772 28.0731L61.6689 0L67.4954 24.277C69.4376 32.4871 70.9383 45.1111 71.7329 53.7626L56.2839 36.1065L52.3995 87.6621C50.7222 87.8386 49.0449 87.1324 48.0738 85.7199L35.8912 53.9391L31.3889 57.8234C30.7709 58.3531 16.7344 70.7123 16.7344 90.6636C16.7344 96.8432 17.882 103.376 19.4711 109.467H28.2108V109.556Z" fill="#F4803C"/></symbol>
	</svg>

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
	<script async defer src="https://scripts.withcabin.com/hello.js"></script>

</body>
</html>