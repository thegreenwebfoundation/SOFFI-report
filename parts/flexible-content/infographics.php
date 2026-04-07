<div class="section--part infographic<?php if(get_sub_field('remove_padding') == 'both' ){ echo ' no-padding'; } else if(get_sub_field('remove_padding') == 'top' ){ echo ' no-padding-top'; } else if(get_sub_field('remove_padding') == 'bottom' ){ echo ' no-padding-bottom'; } ?>">
	<div class="inner-wrapper">
		<div class="graphic-container">
			<?php
				$graphic = get_sub_field('infographic_choice');

				switch( $graphic ) {
					case 'one':
						get_template_part( 'parts/infographics/graphic-one' );
						break;
					case 'two':
						get_template_part( 'parts/infographics/graphic-two' );
						break;
					case 'three':
						get_template_part( 'parts/infographics/graphic-three' );
						break;
					case 'four':
						get_template_part( 'parts/infographics/graphic-four' );
						break;
					case 'five':
						get_template_part( 'parts/infographics/graphic-five' );
						break;
				}
			?>
			<?php
				$graphic_source = get_sub_field('infographic_source');
				$graphic_download = get_sub_field('infographic_download');
				if($graphic_source || $graphic_download):
			?>
				<div class="graphic-info">
					<div>
						<?php if($graphic_source){ ?>
							<p><?php echo esc_attr($graphic_source); ?></p>
						<?php } ?>
					</div>
					<div>
						<?php if($graphic_download){ ?>
							<a class="btn btn--download" href="<?php echo esc_url($graphic_download); ?>" title="Download the infographic" download>Download <span><svg aria-hidden="true" width="30" height="30"><use href="#arrow"></use></svg></a>
						<?php } ?>
					</div>
				</div>
			<?php
				endif;
			?>
		</div>
	</div>
</div>