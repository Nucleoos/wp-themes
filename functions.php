<?php

function showbook_theme_scripts() {
	// Add css.
	wp_enqueue_style( 'basic-sh', get_template_directory_uri() . '/css/basic.css', array(), '1.0' );
    wp_enqueue_style( 'custom-sh', get_template_directory_uri() . '/css/custom.css', array(), '1.0' );

	// Theme stylesheet.
	wp_enqueue_style( 'showbook-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'showbook_theme_scripts' );

add_theme_support( 'post-thumbnails', array ('tribe_events', 'artista') );
set_post_thumbnail_size( 210, 190, true );
add_image_size( 'events-thumbnail', 219, 210, true );

 ?>
