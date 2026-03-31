<?php
    $item_count = count(get_sub_field('stats_items'));
    $part_bg = get_sub_field('section_background');
?>
<div class="section--part carousel stats<?php if($part_bg !== 'default'){ echo ' has-bg bg-' . esc_attr($part_bg); } if(get_sub_field('remove_padding') == 'both' ){ echo ' no-padding'; } else if(get_sub_field('remove_padding') == 'top' ){ echo ' no-padding-top'; } else if(get_sub_field('remove_padding') == 'bottom' ){ echo ' no-padding-bottom'; } ?>">
    <div class="inner-wrapper">
        <?php if(get_sub_field('stats_title')){ ?>
            <h3 class="text--m caps"><?php echo esc_attr( get_sub_field('stats_title') ); ?></h3>
        <?php } ?>
        <?php if( have_rows('stats_items') ): ?>
            <div class="slider">
                <?php
                    $i = 1;
                    while( have_rows('stats_items') ) : the_row();
                    $stat_item_text = get_sub_field('stat_text');
                    $stat_item_ref = get_sub_field('stat_ref');
                    $stat_item_colour = get_sub_field('stat_colour');
                ?>
                    <div class="slide">
                        <div class="stat--item flow<?php echo ' bg-' . esc_attr($stat_item_colour); ?>">
                            <?php
                                echo '<p class="h3">' . esc_attr($stat_item_text) . '</p>';

                                if($stat_item_ref){
                                    $url   = $stat_item_ref['url'];
                                    $title = $stat_item_ref['title'] ?: __('Reference', 'soffi');
                            ?>
                                <a class="ref text--x-small caps" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener"><?php echo esc_attr($title); ?></a>
                            <?php } ?>
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