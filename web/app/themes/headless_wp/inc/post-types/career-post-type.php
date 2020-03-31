<?php
/**
 * Register the career post type.
 */
add_action('init', 'registerCareerPostType');

function registerCareerPostType() {
	$labels = [
		'name'               => __('Careers'),
		'singular_name'      => __('Career'),
		'menu_name'          => __('Careers'),
		'name_admin_bar'     => __('Career'),
		'add_new'            => __('Add New'),
		'add_new_item'       => __('Add New Career'),
		'new_item'           => __('New Career'),
		'edit_item'          => __('Edit Career'),
		'view_item'          => __('View Career'),
		'all_items'          => __('All Careers'),
		'search_items'       => __('Search Careers'),
		'parent_item_colon'  => __('Parent Careers:'),
		'not_found'          => __('No Careers found.'),
		'not_found_in_trash' => __('No Careers found in Trash.')
    ];

	register_post_type('career', [
        'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => false,
		'rewrite'             => ['slug' => 'careers'],
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => null,
		'supports'            => ['title'],
		'menu_icon'			  => 'dashicons-networking',
		'show_in_graphql'	  => true,
		'graphql_single_name' => 'Career',
      	'graphql_plural_name' => 'Careers',
    ]);
}
