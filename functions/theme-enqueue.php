<?php

/*
* Enqueue custom scripts and styles
*/
function script_enqueuer() {
    wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.min.js', array(), '1.0.2', true );
}
add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

?>