<?php
	switch( get_row_layout() ) {
		case 'text_section':
			get_template_part( 'parts/flexible-content/text' );
			break;
		case 'infographic':
			get_template_part( 'parts/flexible-content/infographics' );
			break;
		case 'carousel':
			get_template_part( 'parts/flexible-content/carousel' );
			break;
		case 'stats':
			get_template_part( 'parts/flexible-content/stats' );
			break;
		case 'flowchart':
			get_template_part( 'parts/flexible-content/flowchart' );
			break;
	}
?>