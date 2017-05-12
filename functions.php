<?php

add_action( 'wp_enqueue_scripts', '_my_child_theme_styles' );


/**
 * Enqueue parent theme styles considering styles dependencies.
 */
function _my_child_theme_styles() {


    // Parent styles that need to be loaded before the child theme styles. Replace 'modern.css' with the parent style you're using.
    $parent_styles = array(  'parent_style_1' => 'style.css', 'parent_style_2' => 'styles/modern.css' );


    // Enqueue parent styles using the custom handles and considering styles dependencies.
    foreach( $parent_styles as $handle => $style ) {
        wp_enqueue_style( $handle, get_template_directory_uri() . '/' . $style, array( 'hrb-normalize', 'hrb-foundation' ) );
    }


    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array_keys( $parent_styles )
    );


}


?>