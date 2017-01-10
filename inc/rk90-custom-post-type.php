<?php

// Register Custom Taxonomy
function rk90_gadget_cat() {

	$labels = array(
		'name'                       => _x( 'rodzaje gadżetów', 'Taxonomy General Name', 'rk90' ),
		'singular_name'              => _x( 'Rodzaj gadżetu', 'Taxonomy Singular Name', 'rk90' ),
		'menu_name'                  => __( 'Taxonomy', 'rk90' ),
		'all_items'                  => __( 'All Items', 'rk90' ),
		'parent_item'                => __( 'Parent Item', 'rk90' ),
		'parent_item_colon'          => __( 'Parent Item:', 'rk90' ),
		'new_item_name'              => __( 'New Item Name', 'rk90' ),
		'add_new_item'               => __( 'Add New Item', 'rk90' ),
		'edit_item'                  => __( 'Edit Item', 'rk90' ),
		'update_item'                => __( 'Update Item', 'rk90' ),
		'view_item'                  => __( 'View Item', 'rk90' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'rk90' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'rk90' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'rk90' ),
		'popular_items'              => __( 'Popular Items', 'rk90' ),
		'search_items'               => __( 'Search Items', 'rk90' ),
		'not_found'                  => __( 'Not Found', 'rk90' ),
		'no_terms'                   => __( 'No items', 'rk90' ),
		'items_list'                 => __( 'Items list', 'rk90' ),
		'items_list_navigation'      => __( 'Items list navigation', 'rk90' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'rk90_gadget_cat', array( 'rk90_Gadget' ), $args );

}
add_action( 'init', 'rk90_gadget_cat', 0 );

// Register Custom Post Type
function rk90_gadgets_post_type() {

	$labels = array(
		'name'                  => _x( 'Gadżety', 'Post Type General Name', 'rk90' ),
		'singular_name'         => _x( 'Gadżet', 'Post Type Singular Name', 'rk90' ),
		'menu_name'             => __( 'Gadżety', 'rk90' ),
		'name_admin_bar'        => __( 'Gadżety', 'rk90' ),
		'archives'              => __( 'Archiwum gadżetów', 'rk90' ),
		'attributes'            => __( 'Item Attributes', 'rk90' ),
		'parent_item_colon'     => __( '', 'rk90' ),
		'all_items'             => __( 'Wszystkie Gadżety', 'rk90' ),
		'add_new_item'          => __( 'Dodaj nowy gadżet', 'rk90' ),
		'add_new'               => __( 'nowy gadżet', 'rk90' ),
	);
	$args = array(
		'label'                 => __( 'Gadżet', 'rk90' ),
		'description'           => __( 'Gadżety jubileuszowe', 'rk90' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
		'hierarchical'          => false,
        'taxonomies'            => array('rk90_gadget_cat'),
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
        'rewrite' => array('slug' => 'gadzety'),
	);
	register_post_type( 'rk90_Gadget', $args );

}
add_action( 'init', 'rk90_gadgets_post_type', 0 );