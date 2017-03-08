<?php

// Register Theme Features
function custom_theme_features()  {
	global $wp_version;

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'photo' ) );	
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'custom_theme_features' );

// Navigation Menus
register_nav_menus( array(
	'main-menu' => 'Huvudmeny'
) );

// Register Theme Features
function top_header_image()  {

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
		'width'                  => 100,
		'height'                 => 0,
		'flex-width'             => true,
		'flex-height'            => true,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $header_args );
}
add_action( 'after_setup_theme', 'top_header_image' );

// Register Custom Post Type
function photo_post_type() {

	$labels = array(
		'name'                => _x( 'Fotografier', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Fotografi', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Fotografier', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'Alla foton', 'text_domain' ),
		'view_item'           => __( 'Visa fotografi', 'text_domain' ),
		'add_new_item'        => __( 'Lägg till fotografi', 'text_domain' ),
		'add_new'             => __( 'Lägg till', 'text_domain' ),
		'edit_item'           => __( 'Ändra fotografi', 'text_domain' ),
		'update_item'         => __( 'Uppdatera fotografi', 'text_domain' ),
		'search_items'        => __( 'Sök fotografi', 'text_domain' ),
		'not_found'           => __( 'Hittades ej', 'text_domain' ),
		'not_found_in_trash'  => __( 'Hittades inte i papperskorgen', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'fotografier',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'          => array( 'album' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'photo', $args );

}

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Album', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Album', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Album', 'text_domain' ),
		'all_items'                  => __( 'Alla album', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'album', array( 'photo' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

// Hook into the 'init' action
add_action( 'init', 'photo_post_type', 0 );?>