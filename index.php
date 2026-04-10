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
						$section_intro_image = get_sub_field('intro_background_image');
				?>
					<div class="section-intro">
						<div class="inner-wrapper">
							<div class="flow">
								<?php echo wp_kses_post( $section_intro_text ); ?>
							</div>
						</div>
						<?php if($section_intro_image): ?>
							<?php echo wp_get_attachment_image( $section_intro_image, 'section-bg', "", array( "class" => "image--bg", "loading" => "lazy" ) ); ?>
						<?php else: ?>
							<div class="grad--bg"></div>
						<?php endif; ?>
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

	<script>
		window.__REPORT_CHART_BASE__ = '/wp-content/themes/soffi/dist';
	</script>

	<script type="module">
		const base = window.__REPORT_CHART_BASE__ || '';
	    const { default: ReportChartModule } = await import(`${base}/report-loader.js`);
	    window.ReportChart = ReportChartModule;
	</script>

<?php get_footer(); ?>