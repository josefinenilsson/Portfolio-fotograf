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
		'taxonomies'          => array( 'category', 'post_tag' ),
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

// Hook into the 'init' action
add_action( 'init', 'photo_post_type', 0 );

?>