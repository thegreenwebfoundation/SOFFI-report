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
		</div>
	</div>
</div>