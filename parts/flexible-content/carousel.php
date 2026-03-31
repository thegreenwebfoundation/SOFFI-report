<?php
    $item_count = count(get_sub_field('carousel_items'));
    $part_bg = get_sub_field('section_background');
?>
<div class="section--part carousel<?php if($part_bg !== 'default'){ echo ' has-bg bg-' . esc_attr($part_bg); } if(get_sub_field('remove_padding') == 'both' ){ echo ' no-padding'; } else if(get_sub_field('remove_padding') == 'top' ){ echo ' no-padding-top'; } else if(get_sub_field('remove_padding') == 'bottom' ){ echo ' no-padding-bottom'; } ?>">
    <div class="inner-wrapper">
        <?php if(get_sub_field('carousel_title')){ ?>
            <h3 class="h4 caps"><?php echo esc_attr( get_sub_field('carousel_title') ); ?></h3>
        <?php } ?>
        <?php if( have_rows('carousel_items') ): ?>
            <div class="slider">
                <?php
                    $i = 1;
                    while( have_rows('carousel_items') ) : the_row();
                    $c_item_title = get_sub_field('carousel_item_title');
                    $c_item_subtitle = get_sub_field('carousel_item_subtitle');
                    $c_item_image = get_sub_field('carousel_item_image');
                    $c_item_text = get_sub_field('carousel_item_text');
                    $c_item_ref = get_sub_field('carousel_item_ref');
                    $c_item_colour = get_sub_field('carousel_item_colour');
                ?>
                    <div class="slide">
                        <div class="carousel--item">
                            <div class="carousel--item-image">
                                <?php if($c_item_subtitle){
                                    echo '<p class="carousel--item-subtitle bg-charcoal">' . esc_attr( $c_item_subtitle ) . '</p>';
                                } ?>
                                <?php if($c_item_title){
                                    echo '<h4 class="carousel--item-title bg-' . esc_attr($c_item_colour) . '">' . esc_attr( $c_item_title ) . '</h4>';
                                } ?>
                                <?php if($c_item_image){
                                    echo wp_get_attachment_image( $c_item_image, 'thumbnail', array( "class" => "carousel--item-image", "loading" => "lazy" ) );
                                } ?>
                            </div>
                            <div class="carousel--item-text flow">
                                <?php
                                    echo wp_kses_post($c_item_text);

                                    if($c_item_ref){
                                        $url   = $c_item_ref['url'];
                                        $title = $c_item_ref['title'] ?: __('Reference', 'soffi');
                                ?>
                                    <a class="ref text--x-small caps" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener"><?php echo esc_attr($title); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php $i++; endwhile; ?>
            </div>
            <?php if($item_count > 1) { ?>
                <div class="buttons">
                    <button class="btn prev" aria-label="Go to previous slide"><svg width="15" height="15" aria-hidden="true"><use href="#arrow"></use></svg></button>
                    <button class="btn next" aria-label="Go to next slide"><svg width="15" height="15" aria-hidden="true"><use href="#arrow"></use></svg></button>
                </div>
            <?php } ?>
        <?php endif; ?>
    </div>
</div>