<?php

function showbook_theme_scripts() {
	// Add css.
	wp_enqueue_style( 'basic-sh', get_template_directory_uri() . '/css/basic.css', array(), '1.0' );
	wp_enqueue_style( 'nicemodal-sh', get_template_directory_uri() . '/css/jquery-nicemodal.css', array(), '1.0' );
    wp_enqueue_style( 'custom-sh', get_template_directory_uri() . '/css/custom.css', array(), '1.0' );

	if (! is_page('home') ){
		wp_enqueue_style( 'pages-sh', get_template_directory_uri() . '/css/pages.css', array(), '1.0' );
	}

	// Theme stylesheet.
	wp_enqueue_style( 'showbook-style', get_stylesheet_uri() );

	wp_enqueue_script('jcycle', get_template_directory_uri() . '/js/jcycle.js', array('jquery'), '1.0');
	wp_enqueue_script('scrollbox', get_template_directory_uri() . '/js/jquery.scrollbox.js', array('jquery'), '1.0');
	wp_enqueue_script('nicemodal', get_template_directory_uri() . '/js/jquery-nicemodal.js', array('jquery'), '1.0');
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0');
}
add_action( 'wp_enqueue_scripts', 'showbook_theme_scripts' );

function showbook_add_thumbnail_support(){
	add_post_type_support('tribe_venue', 'thumbnail');
}

add_action( 'init', 'showbook_add_thumbnail_support' );

add_theme_support( 'post-thumbnails', array ('tribe_events', 'tribe_venue', 'artista') );
set_post_thumbnail_size( 210, 190, true );
add_image_size( 'events-thumbnail', 219, 210, true );

add_action( 'init', 'cptui_register_my_cpts_artista' );
function cptui_register_my_cpts_artista() {
	$labels = array(
		"name" => __( 'Artistas', 'showbook' ),
		"singular_name" => __( 'Artista', 'showbook' ),
		);

	$args = array(
		"label" => __( 'Artistas', 'showbook' ),
		"labels" => $labels,
		"description" => "Registra artistas que vão comparecer ao evento",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "artista", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-money",
		"supports" => array( "title", "editor", "thumbnail", "custom-fields", "comments" ),
		"taxonomies" => array( "post_tag" ),
	);
	register_post_type( "artista", $args );

// End of cptui_register_my_cpts_artista()
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_artistas',
		'title' => 'Artistas',
		'fields' => array (
			array (
				'key' => 'field_57243441ca408',
				'label' => 'Artistas do Evento',
				'name' => 'artistas',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'artista',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tribe_events',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_images-venue',
		'title' => 'Images Venue',
		'fields' => array (
			array (
				'key' => 'field_5724d407c7015',
				'label' => 'Secondary Image',
				'name' => 'secondary_image',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'events-thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tribe_venue',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



 ?>
