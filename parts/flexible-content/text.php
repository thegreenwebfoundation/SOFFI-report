<?php
$part_id = get_sub_field('part_id');
$part_bg = get_sub_field('section_background');
?>
<div<?php if($part_id){ echo ' id="' . esc_attr( sanitize_title( $part_id ) ) . '" tab-index="-1"'; } ?> class="section--part text<?php if($part_bg !== 'default'){ echo ' has-bg bg-' . esc_attr($part_bg); } if(get_sub_field('remove_padding') == 'both' ){ echo ' no-padding'; } else if(get_sub_field('remove_padding') == 'top' ){ echo ' no-padding-top'; } else if(get_sub_field('remove_padding') == 'bottom' ){ echo ' no-padding-bottom'; } ?>">
    <div class="inner-wrapper flow">
        <?php echo wp_kses_post( get_sub_field('text_section_content') ); ?>
    </div>
</div>