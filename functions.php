<?php

function showbook_theme_scripts() {
	// Add css.
	wp_enqueue_style( 'basic-sh', get_template_directory_uri() . '/css/basic.css', array(), '1.0' );
    wp_enqueue_style( 'custom-sh', get_template_directory_uri() . '/css/custom.css', array(), '1.0' );
	wp_enqueue_style( 'agenda-showbook', get_template_directory_uri() . '/css/agenda.css', array(), '1.0' );
	wp_enqueue_style( 'tooltip-showbook', get_template_directory_uri() . '/css/tooltipster.bundle.css', array(), '1.0' );
	wp_enqueue_style( 'tooltip-borderless-showbook', get_template_directory_uri() . '/css/tooltipster-sideTip-borderless.min.css', array(), '1.0' );

	if (! is_page('home') ){
		wp_enqueue_style( 'pages-sh', get_template_directory_uri() . '/css/pages.css', array(), '1.0' );
	}
	wp_enqueue_style( 'tricks-sh', get_template_directory_uri() . '/css/tricks.css', array(), '1.0' );

	// Theme stylesheet.
	wp_enqueue_style( 'showbook-style', get_stylesheet_uri() );

	wp_enqueue_script('jcycle', get_template_directory_uri() . '/js/jcycle.js', array('jquery'), '1.0');
	wp_enqueue_script('scrollbox', get_template_directory_uri() . '/js/jquery.scrollbox.js', array('jquery'), '1.0');
	wp_enqueue_script('tooltip-showbook-script', get_template_directory_uri() . '/js/tooltipster.bundle.js', array('jquery'), '1.0');
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


function modify_tribe_venues(  $post_type, $args ) {
    if ( $post_type == 'tribe_venue' ) {

        global $wp_post_types;
        $args->public = true;
		$args->publicly_queryable = true;
		$args->show_ui = true;
		$args->exclude_from_search = false;
		$args->show_in_nav_menus = true;

        $wp_post_types[ $post_type ] = $args;
    }
}
add_action( 'registered_post_type', 'modify_tribe_venues', 10, 2);

function showbook_add_query_vars_filter( $vars ){
  $vars[] = "slug";
  return $vars;
}
add_filter( 'query_vars', 'showbook_add_query_vars_filter' );

function add_custom_taxonomies_artistas_bares() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('regiao', 'tribe_venue', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Região', 'taxonomy general name' ),
      'singular_name' => _x( 'Região', 'taxonomy singular name' ),
      'search_items' =>  __( 'Pesquisar Regiões' ),
      'all_items' => __( 'Todas as Regiões' ),
      'parent_item' => __( 'Região Pai' ),
      'parent_item_colon' => __( 'Região Pai:' ),
      'edit_item' => __( 'Editar Região' ),
      'update_item' => __( 'Atualizar Região' ),
      'add_new_item' => __( 'Adicionar nova Região' ),
      'new_item_name' => __( 'Novo nome de região' ),
      'menu_name' => __( 'Regiões' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'regiao', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies_artistas_bares', 0 );


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
		"taxonomies" => array( "category" ),
	);
	register_post_type( "artista", $args );

// End of cptui_register_my_cpts_artista()
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_campos-do-evento',
		'title' => 'Campos do Evento',
		'fields' => array (
			array (
				'key' => 'field_576815ef2d5ed',
				'label' => 'Artistas',
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
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_5765acc6011df',
				'label' => 'Banner Principal',
				'name' => 'banner_principal',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5765ae3e5dc32',
				'label' => 'Banner Secundario',
				'name' => 'banner_secundario',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
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
		'id' => 'acf_campos-local',
		'title' => 'Campos Local',
		'fields' => array (
			array (
				'key' => 'field_ds87sfjdk23',
				'label' => 'Resumo Local',
				'name' => 'resumo_local',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Aberto da ..... / Faixa de preço: ...',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5761ef2ac777c',
				'label' => 'Url Facebook',
				'name' => 'url_facebook',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Cole aqui o link da página do facebook',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5761da943a37e',
				'label' => 'Banner Principal',
				'name' => 'banner_principal',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_5761e11822ccf',
				'label' => 'Local Evento',
				'name' => 'local_evento',
				'type' => 'google_map',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
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
	register_field_group(array (
		'id' => 'acf_novas-imagens-artista',
		'title' => 'Novas imagens artista',
		'fields' => array (
			array (
				'key' => 'field_572b2d07053eb',
				'label' => 'Banner Principal',
				'name' => 'banner_principal',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_57322973b15df',
				'label' => 'Rider Tecnico',
				'name' => 'rider_tecnico',
				'type' => 'file',
				'save_format' => 'id',
				'library' => 'all',
			),
			array (
				'key' => 'field_5732299f63bed',
				'label' => 'Release Tecnico',
				'name' => 'release_tecnico',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_575974a84aaad',
				'label' => 'Facebook Album Id',
				'name' => 'facebook_album_id',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Copie e cole aqui o Id do album que você quer mostrar (album público)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5761b076b2c4c',
				'label' => 'ID Playlist Youtube',
				'name' => 'youtube_playlist_id',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Copie e cole aqui o ID da playlist que você quer mostrar (playlist pública)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5761bbd693bc9',
				'label' => 'Url Facebook',
				'name' => 'url_facebook',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5761bcb03e6fb',
				'label' => 'Banner Miniatura',
				'name' => 'banner_miniatura',
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
					'value' => 'artista',
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


function showbook_filter_control_artista( $control ) {
	return is_page('artistas');
}

function showbook_filter_control_casas( $control ) {
	return is_page('casas');
}

function mytheme_customize_register( $wp_customize )
{
    $wp_customize->add_section('showbook_theme_banner_header', array(
        'title'    => __('Banner Inicial', 'showbook_theme'),
        'description' => '',
        'priority' => 120,
    ));

    $wp_customize->add_section('showbook_theme_footer_contact', array(
        'title'    => __('Formulário Contato', 'showbook_theme'),
        'description' => '',
        'priority' => 120,
    ));

    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('showbook_theme_image_banner_artistas', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_banner_artistas', array(
        'label'    => __('Banner principal Artistas', 'showbook'),
        'section'  => 'showbook_theme_banner_header',
        'settings' => 'showbook_theme_image_banner_artistas',
		'active_callback' => 'showbook_filter_control_artista',
    )));

    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('showbook_theme_image_banner_casas', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_banner_casas_noturnas', array(
        'label'    => __('Banner principal Casas Noturnas', 'showbook'),
        'section'  => 'showbook_theme_banner_header',
        'settings' => 'showbook_theme_image_banner_casas',
		'active_callback' => 'showbook_filter_control_casas',
    )));

    //  =============================
    //  = Shortcode Formulário de contato              =
    //  =============================
    $wp_customize->add_setting('showbook_theme_contact_form_shortcode', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('formulario_contato_footer', array(
        'label'    => __('Formulário de contato Rodapé', 'showbook'),
        'section'  => 'showbook_theme_footer_contact',
        'settings' => 'showbook_theme_contact_form_shortcode',
		'type' => 'text',
    ));


	//  =============================
	//  = Shortcode Formulário Faça Parte
	//  =============================
	$wp_customize->add_setting('showbook_theme_faca_parte_form_shortcode', array(
		'capability'        => 'edit_theme_options',
		'type'           => 'option',

	));

	$wp_customize->add_control('formulario_faca_parte', array(
		'label'    => __('Formulário Faça Parte', 'showbook'),
		'section'  => 'showbook_theme_footer_contact',
		'settings' => 'showbook_theme_faca_parte_form_shortcode',
		'type' => 'text',
	));

}
add_action( 'customize_register', 'mytheme_customize_register' );

 ?>
