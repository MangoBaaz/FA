<?php

/**
* Khana functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Khana
 */

if ( ! function_exists( 'khana_setup' ) ) :

function khana_setup() {
	
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );
	
	// 	This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'khana' ),
		) );
	
	// 	Thumbnail sizes
	add_image_size( 'content-width-full', 1024, 9999 );
	add_image_size( 'content-width-half', 512, 9999 );
	add_image_size( 'content-width-quarter', 256, 9999 );
	add_image_size( 'header-home', 1800, 1010, true );
	add_image_size( 'header-page', 1800, 800, true );
	add_image_size( 'article-square', 400, 400, true );
	
	
	
	/*
	* Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	
	// 	Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'khana_setup' );

function khana_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'khana_content_width', 640 );
}
add_action( 'after_setup_theme', 'khana_content_width', 0 );



/**
* Enqueue scripts and styles.
 */
function khana_scripts() {
	wp_enqueue_style( 'khana-style', get_stylesheet_uri() );

	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_enqueue_scripts', 'khana_scripts' );

/**
* Clean up wp_head output.
**/
function cleanup_head() {
	// EditURI link.
	remove_action( 'wp_head', 'rsd_link' );
	// Category feed links.
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// Post and comment feed links.
	remove_action( 'wp_head', 'feed_links', 2 );
	// Windows Live Writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Index link.
	remove_action( 'wp_head', 'index_rel_link' );
	// Previous link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Start link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Canonical.
	remove_action( 'wp_head', 'rel_canonical', 10, 0 );
	// Shortlink.
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	// Links for adjacent posts.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version.
	remove_action( 'wp_head', 'wp_generator' );
	// Emoji detection script.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	// Emoji styles.
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'cleanup_head' );
/**
* Disable autosave for posts
**/
function disable_autosave() {
  wp_deregister_script( 'autosave' );
}
add_action( 'admin_init', 'disable_autosave' );
/**
* Remove WP version from RSS Feed
**/
function remove_rss_wp_version() {
    return '';
}
add_filter( 'the_generator', 'remove_rss_wp_version' );
/**
* Remove P tags wrapping images from WYSISYG fields.
**/
function filter_ptags_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/**
* Detects the post slug and adds the current class to the menu item
*
* @return string
**/
function add_current_nav_class($classes, $item) {
  // Getting the current post details
  global $post;
  // Getting the post type of the current post
  $current_post_type = get_post_type_object(get_post_type($post->ID));
  $current_post_type_slug = $current_post_type->rewrite['slug'];
  // Getting the URL of the menu item
  $menu_slug = strtolower(trim($item->url));
  // If the menu item URL contains the current post types slug add the current-menu-item class
  if (strpos($menu_slug,$current_post_type_slug) !== false) {
    $classes[] = 'site-header-nav__item--current';
  }
  // Return the corrected set of classes to be added to the menu item
  return $classes;
}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

add_filter( 'xmlrpc_methods', function( $methods ) {
  unset( $methods['pingback.ping'] );
  return $methods;
} );

// Register Cuisine Taxonomy for Restaurants
function cuisine_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Cuisines', 'Taxonomy General Name', 'Khana' ),
		'singular_name'              => _x( 'Cuisine', 'Taxonomy Singular Name', 'Khana' ),
		'menu_name'                  => __( 'Cuisine', 'Khana' ),
		'all_items'                  => __( 'All Cuisines', 'Khana' ),
		'parent_item'                => __( 'Parent Cuisine', 'Khana' ),
		'parent_item_colon'          => __( 'Parent Cuisine:', 'Khana' ),
		'new_item_name'              => __( 'New Cuisine Name', 'Khana' ),
		'add_new_item'               => __( 'Add New Cuisine', 'Khana' ),
		'edit_item'                  => __( 'Edit Cuisine', 'Khana' ),
		'update_item'                => __( 'Update Cuisine', 'Khana' ),
		'view_item'                  => __( 'View Item', 'Khana' ),
		'separate_items_with_commas' => __( 'Separate Cuisines with commas', 'Khana' ),
		'add_or_remove_items'        => __( 'Add or remove Cuisine', 'Khana' ),
		'choose_from_most_used'      => __( 'Choose from the most used Cuisine', 'Khana' ),
		'popular_items'              => __( 'Popular Items', 'Khana' ),
		'search_items'               => __( 'Search Cuisines', 'Khana' ),
		'not_found'                  => __( 'Not Found', 'Khana' ),
		'no_terms'                   => __( 'No items', 'Khana' ),
		'items_list'                 => __( 'Items list', 'Khana' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Khana' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'cuisine', array( 'restaurant' ), $args );

}
add_action( 'init', 'cuisine_taxonomy', 0 );

// Register Location Taxonomy for Restaurants
function location_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Location', 'Taxonomy General Name', 'Khana' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'Khana' ),
		'menu_name'                  => __( 'Location', 'Khana' ),
		'all_items'                  => __( 'All Location', 'Khana' ),
		'parent_item'                => __( 'Parent Location', 'Khana' ),
		'parent_item_colon'          => __( 'Parent Location:', 'Khana' ),
		'new_item_name'              => __( 'New Location Name', 'Khana' ),
		'add_new_item'               => __( 'Add New Location', 'Khana' ),
		'edit_item'                  => __( 'Edit Location', 'Khana' ),
		'update_item'                => __( 'Update Location', 'Khana' ),
		'view_item'                  => __( 'View Item', 'Khana' ),
		'separate_items_with_commas' => __( 'Separate Locations with commas', 'Khana' ),
		'add_or_remove_items'        => __( 'Add or remove Location', 'Khana' ),
		'choose_from_most_used'      => __( 'Choose from the most used Location', 'Khana' ),
		'popular_items'              => __( 'Popular Items', 'Khana' ),
		'search_items'               => __( 'Search Locations', 'Khana' ),
		'not_found'                  => __( 'Not Found', 'Khana' ),
		'no_terms'                   => __( 'No items', 'Khana' ),
		'items_list'                 => __( 'Items list', 'Khana' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Khana' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'location', array( 'restaurant' ), $args );

}
add_action( 'init', 'location_taxonomy', 0 );

// Register Restaurants Post Type
function restaurant_post_type() {

	$labels = array(
		'name'                  => _x( 'Restaurants', 'Post Type General Name', 'Khana' ),
		'singular_name'         => _x( 'restaurant', 'Post Type Singular Name', 'Khana' ),
		'menu_name'             => __( 'Restaurants', 'Khana' ),
		'name_admin_bar'        => __( 'Restaurant', 'Khana' ),
		'archives'              => __( 'Item Archives', 'Khana' ),
		'attributes'            => __( 'Item Attributes', 'Khana' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Khana' ),
		'all_items'             => __( 'All Items', 'Khana' ),
		'add_new_item'          => __( 'Add New Item', 'Khana' ),
		'add_new'               => __( 'Add New', 'Khana' ),
		'new_item'              => __( 'New Item', 'Khana' ),
		'edit_item'             => __( 'Edit Item', 'Khana' ),
		'update_item'           => __( 'Update Item', 'Khana' ),
		'view_item'             => __( 'View Item', 'Khana' ),
		'view_items'            => __( 'View Items', 'Khana' ),
		'search_items'          => __( 'Search Item', 'Khana' ),
		'not_found'             => __( 'Not found', 'Khana' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'Khana' ),
		'featured_image'        => __( 'Featured Image', 'Khana' ),
		'set_featured_image'    => __( 'Set featured image', 'Khana' ),
		'remove_featured_image' => __( 'Remove featured image', 'Khana' ),
		'use_featured_image'    => __( 'Use as featured image', 'Khana' ),
		'insert_into_item'      => __( 'Insert into item', 'Khana' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'Khana' ),
		'items_list'            => __( 'Items list', 'Khana' ),
		'items_list_navigation' => __( 'Items list navigation', 'Khana' ),
		'filter_items_list'     => __( 'Filter items list', 'Khana' ),
	);
	$args = array(
		'label'                 => __( 'restaurant', 'Khana' ),
		'description'           => __( 'Restaurants information page.', 'Khana' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'cuisine', 'location' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-store',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'restaurant', $args );

}
add_action( 'init', 'restaurant_post_type', 0 );

// Register Cities Taxonomy for Guides
function city_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Cities', 'Taxonomy General Name', 'Khana' ),
		'singular_name'              => _x( 'City', 'Taxonomy Singular Name', 'Khana' ),
		'menu_name'                  => __( 'Cities', 'Khana' ),
		'all_items'                  => __( 'All Cities', 'Khana' ),
		'parent_item'                => __( 'Parent City', 'Khana' ),
		'parent_item_colon'          => __( 'Parent City:', 'Khana' ),
		'new_item_name'              => __( 'New City Name', 'Khana' ),
		'add_new_item'               => __( 'Add New City', 'Khana' ),
		'edit_item'                  => __( 'Edit City', 'Khana' ),
		'update_item'                => __( 'Update City', 'Khana' ),
		'view_item'                  => __( 'View Item', 'Khana' ),
		'separate_items_with_commas' => __( 'Separate Cities with commas', 'Khana' ),
		'add_or_remove_items'        => __( 'Add or remove Cities', 'Khana' ),
		'choose_from_most_used'      => __( 'Choose from the most used Cities', 'Khana' ),
		'popular_items'              => __( 'Popular Items', 'Khana' ),
		'search_items'               => __( 'Search Cities', 'Khana' ),
		'not_found'                  => __( 'Not Found', 'Khana' ),
		'no_terms'                   => __( 'No items', 'Khana' ),
		'items_list'                 => __( 'Items list', 'Khana' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Khana' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'city', array( 'guide' ), $args );

}
add_action( 'init', 'city_taxonomy', 0 );

// Register Guides Post Type
function guide_post_type() {

	$labels = array(
		'name'                  => _x( 'Guides', 'Post Type General Name', 'Khana' ),
		'singular_name'         => _x( 'Guide', 'Post Type Singular Name', 'Khana' ),
		'menu_name'             => __( 'Guides', 'Khana' ),
		'name_admin_bar'        => __( 'Guides', 'Khana' ),
		'archives'              => __( 'Item Archives', 'Khana' ),
		'attributes'            => __( 'Item Attributes', 'Khana' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Khana' ),
		'all_items'             => __( 'All Items', 'Khana' ),
		'add_new_item'          => __( 'Add New Item', 'Khana' ),
		'add_new'               => __( 'Add New', 'Khana' ),
		'new_item'              => __( 'New Item', 'Khana' ),
		'edit_item'             => __( 'Edit Item', 'Khana' ),
		'update_item'           => __( 'Update Item', 'Khana' ),
		'view_item'             => __( 'View Item', 'Khana' ),
		'view_items'            => __( 'View Items', 'Khana' ),
		'search_items'          => __( 'Search Item', 'Khana' ),
		'not_found'             => __( 'Not found', 'Khana' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'Khana' ),
		'featured_image'        => __( 'Featured Image', 'Khana' ),
		'set_featured_image'    => __( 'Set featured image', 'Khana' ),
		'remove_featured_image' => __( 'Remove featured image', 'Khana' ),
		'use_featured_image'    => __( 'Use as featured image', 'Khana' ),
		'insert_into_item'      => __( 'Insert into item', 'Khana' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'Khana' ),
		'items_list'            => __( 'Items list', 'Khana' ),
		'items_list_navigation' => __( 'Items list navigation', 'Khana' ),
		'filter_items_list'     => __( 'Filter items list', 'Khana' ),
	);
	$args = array(
		'label'                 => __( 'Guide', 'Khana' ),
		'description'           => __( 'Guides', 'Khana' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'city' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-slides',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'guides', $args );

}
add_action( 'init', 'guide_post_type', 0 );

