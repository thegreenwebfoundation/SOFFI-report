<?php

// theme set up for SOFFI

function soffi_setup() {

    // register the navigation
    register_nav_menus([
        'main' => __('Main Navigation', 'soffi'),
        'footer' => __('Footer Navigation', 'soffi'),
    ]);

}
add_action('after_setup_theme', 'soffi_setup');


// add thumbnail support
add_theme_support( 'post-thumbnails' );

// add custom image sizes
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'section-bg', 1700, 470, true );
}

add_theme_support( 'title-tag' );

?>