<?php get_header(); ?>

	<?php echo get_template_part('parts/hero'); ?>

	<?php if( have_rows('page_sections') ): ?>

		<?php while ( have_rows('page_sections') ) : the_row(); ?>

			<?php
				$section_id = get_sub_field('section_id');
				$section_bg = get_sub_field('section_background');
				$section_intro = get_sub_field('has_intro');
			?>
			<section<?php if($section_id){ echo ' id="' . esc_attr( sanitize_title( $section_id ) ) . '" tab-index="-1"'; } if($section_bg !== 'default'){ echo 'class="bg-' . esc_attr($section_bg) . '"'; } ?>>

				<?php
					if($section_intro === 'yes'):
						$section_intro_text = get_sub_field('section_intro_text');
				?>
					<div class="section-intro">
						<div class="inner-wrapper">
							<div class="flow">
								<?php echo wp_kses_post( $section_intro_text ); ?>
							</div>
						</div>
						<div class="grad--bg"></div>
					</div>
				<?php endif; ?>

				<?php if( have_rows('section_parts') ): ?>
					<?php while ( have_rows('section_parts') ) : the_row(); ?>
						<?php echo get_template_part('parts/flexible-content'); ?>
					<?php endwhile; ?>
				<?php endif; ?>

			</section>

		<?php endwhile; ?>

	<?php endif; ?>

	<!-- Configure base path for subdirectory deployment -->
	<script>
		window.__REPORT_CHART_BASE__ = '/wp-content/themes/soffi/dist'; // Set to '/subdir' if deployed to a subdirectory
	</script>

	<!-- Load the FULL CHART bundle for immediate loading -->
	<script type="module">
		const base = window.__REPORT_CHART_BASE__ || '';

		// Import minimal loader - only ~2-5 KB initially
	    // LazyChart wrapper and chart component load when scrolled into view
	    const { default: ReportChartModule } = await import(`${base}/report-loader.js`);
	    window.ReportChart = ReportChartModule;
	</script>

<?php get_footer(); ?>