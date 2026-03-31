<?php

// Add styles to admin
function lowww_theme_add_editor_styles() {
    add_editor_style( 'css/editor-styles.css' );
}
add_action( 'admin_init', 'lowww_theme_add_editor_styles' );


// ACF: Options
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(
        array(
            'page_title' => 'Website Options',
            'menu_title' => 'Website Options',
            'menu_slug'  => 'website-options',
            'capability' => 'edit_posts',
            'redirect'   => true,
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title'  => 'Footer',
            'menu_title'  => 'Footer',
            'parent_slug' => 'website-options',
            'position'    => '1.2',
        )
    );
}

// ACF: Dynamically create the section title for each section in flexible content blocks
add_filter('acf/fields/flexible_content/layout_title/name=page_sections', 'override_acf_section_layout_title', 10, 4);

function override_acf_section_layout_title( $title, $field, $layout, $i ) {

    // Modify the section flexible block title
    if( $layout['name'] !== 'section' ) {
        return $title;
    }

    // Get section ID from the section_id field
    $section_id = get_sub_field('section_id');

    if( $section_id ) {
        // Replace hypens with spaces and make first letter uppercase
        $label = ucfirst( str_replace( '-', ' ', $section_id ) );
        $title .= ': ' . esc_html( $label );
    }

    return $title;
}

// Create nav walker that adds a span inside the anchor links within the navigation
class Soffi_Nav_Walker extends Walker_Nav_Menu {

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->title) ? $item->title : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ($attr === 'href') ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . '<span>' . esc_html($item->title) . '</span>' . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/*
*  Amend items from the WYSIWYG editor
*/

// TinyMCE: First line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons') ){
    function base_extended_editor_mce_buttons($buttons) {
        // The settings are returned in this array. Customize to suite your needs.
        return array(
            'formatselect', 'styleselect', 'bold', 'underline', 'sub', 'sup', 'bullist', 'numlist', 'link', 'unlink', 'charmap', 'removeformat'
        );
    }
    add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}

// TinyMCE: Second line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons_2') ){
    function base_extended_editor_mce_buttons_2($buttons) {
        // The settings are returned in this array. Customize to suite your needs. An empty array is used here because I remove the second row of icons.
        return array();
    }
    add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}

// Customize the format dropdown items
function customformatTinyMCE($init) {
    // Add block format elements you want to show in dropdown
    $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5';

    // Add custom style formats
    $style_formats = array(
        array(
            'title' => 'H1 font size',
            'inline' => 'span',
            'wrapper' => true,
            'classes' => 'h1'
        ),
        array(
            'title' => 'H2 font size',
            'inline' => 'span',
            'wrapper' => true,
            'classes' => 'h2'
        ),
        array(
            'title' => 'H3 font size',
            'inline' => 'span',
            'wrapper' => true,
            'classes' => 'h3'
        ),
        array(
            'title' => 'H4 font size',
            'inline' => 'span',
            'wrapper' => true,
            'classes' => 'h4'
        ),
        array(
            'title' => 'H5 font size',
            'inline' => 'span',
            'wrapper' => true,
            'classes' => 'h5'
        ),
        array(
            'title' => 'Paragraph medium',
            'selector' => 'p',
            'classes' => 'text--m'
        ),
        array(
            'title' => 'Paragraph small',
            'selector' => 'p',
            'classes' => 'text--small'
        ),
        array(
            'title' => 'Paragraph x-small',
            'selector' => 'p',
            'classes' => 'text--x-small'
        ),
        array(
            'title' => 'All Caps',
            'selector' => 'p',
            'classes' => 'caps'
        ),
    );

    // Add the styleselect dropdown
    $init['style_formats'] = json_encode($style_formats);

    return $init;
}

// Modify Tiny_MCE init
add_filter('tiny_mce_before_init', 'customformatTinyMCE' );


?>