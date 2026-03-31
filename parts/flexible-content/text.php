<?php $part_bg = get_sub_field('section_background'); ?>
<div class="section--part text<?php if($part_bg !== 'default'){ echo ' has-bg bg-' . esc_attr($part_bg); } if(get_sub_field('remove_padding') == 'both' ){ echo ' no-padding'; } else if(get_sub_field('remove_padding') == 'top' ){ echo ' no-padding-top'; } else if(get_sub_field('remove_padding') == 'bottom' ){ echo ' no-padding-bottom'; } ?>">
    <div class="inner-wrapper flow">
        <?php echo wp_kses_post( get_sub_field('text_section_content') ); ?>
    </div>
</div>