<?php
$part_bg = get_sub_field('section_background');
?>

<div class="section--part flowchart<?php if($part_bg !== 'default'){ echo ' has-bg bg-' . esc_attr($part_bg); } if(get_sub_field('remove_padding') == 'both' ){ echo ' no-padding'; } else if(get_sub_field('remove_padding') == 'top' ){ echo ' no-padding-top'; } else if(get_sub_field('remove_padding') == 'bottom' ){ echo ' no-padding-bottom'; } ?>">
    <div class="inner-wrapper grid">
        <div class="col--twelve col--three-lg flow">
            <?php if(get_sub_field('problem_title')){ ?>
                <h3><?php echo esc_attr( get_sub_field('problem_title') ); ?></h3>
            <?php } ?>
            <?php if(get_sub_field('problem_content')){ ?>
                <?php echo wp_kses_post( get_sub_field('problem_content') ); ?>
            <?php } ?>
            <div>
                <svg width="158" height="191" aria-hidden="true"><use href="#flame-icon"></use></svg>
            </div>
        </div>
        <div class="col--twelve col--nine-lg flow">
            <?php if(get_sub_field('solution_title')){ ?>
                <h3><?php echo esc_attr( get_sub_field('solution_title') ); ?></h3>
            <?php } ?>
            <?php if( have_rows('solution_pathways') ): ?>
                <div class="grid">
                    <?php
                        $i = 1;
                        while( have_rows('solution_pathways') ) : the_row();
                        $solution_pathway_title = get_sub_field('solution_pathway_title');
                        $solution_pathway_subtitle = get_sub_field('solution_pathway_subtitle');
                        $solution_pathway_image = get_sub_field('solution_pathway_image');
                        $solution_pathway_text = get_sub_field('solution_pathway_text');
                        $solution_pathway_link = get_sub_field('solution_pathway_link');
                        if($solution_pathway_link):
                    ?>
                            <a href="<?php echo esc_url($solution_pathway_link); ?>" title="View this pathway" class="solution-pathways--item col--twelve col--four-sm">
                                <?php if($solution_pathway_subtitle){
                                    echo '<p class="solution-pathways--item-subtitle bg-charcoal">' . esc_attr( $solution_pathway_subtitle ) . '</p>';
                                } ?>
                                <?php if($solution_pathway_title){
                                    echo '<h4 class="h3 solution-pathways--item-title">' . esc_attr( $solution_pathway_title ) . '</h4>';
                                } ?>
                                <?php if($solution_pathway_text){
                                    echo '<p class="solution-pathways--item-text bg-paper">' . esc_attr( $solution_pathway_text ) . '</p>';
                                } ?>
                                <?php if($solution_pathway_image){
                                    echo wp_get_attachment_image( $solution_pathway_image, 'thumbnail', "", array( "class" => "solution-pathways--item-image", "loading" => "lazy" ) );
                                } ?>
                            </a>
                        <?php else: ?>
                            <div class="solution-pathways--item col--twelve col--four-sm">
                                <?php if($solution_pathway_subtitle){
                                    echo '<p class="solution-pathways--item-subtitle bg-charcoal">' . esc_attr( $solution_pathway_subtitle ) . '</p>';
                                } ?>
                                <?php if($solution_pathway_title){
                                    echo '<h4 class="h3 solution-pathways--item-title">' . esc_attr( $solution_pathway_title ) . '</h4>';
                                } ?>
                                <?php if($solution_pathway_text){
                                    echo '<p class="solution-pathways--item-text bg-paper">' . esc_attr( $solution_pathway_text ) . '</p>';
                                } ?>
                                <?php if($solution_pathway_image){
                                    echo wp_get_attachment_image( $solution_pathway_image, 'thumbnail', "", array( "class" => "solution-pathways--item-image", "loading" => "lazy" ) );
                                } ?>
                            </div>
                        <?php endif; ?>
                    <?php $i++; endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if(get_sub_field('solution_signoff')){ ?>
                <p class=""><?php echo esc_attr( get_sub_field('solution_signoff') ); ?></p>
            <?php } ?>
        </div>
    </div>
</div>