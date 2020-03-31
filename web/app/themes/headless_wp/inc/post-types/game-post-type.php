<?php
/**
 * Register the game post type.
 */
add_action('init', 'registerGamePostType');

function registerGamePostType() {
	$labels = [
		'name'               => __('Games'),
		'singular_name'      => __('Game'),
		'menu_name'          => __('Games'),
		'name_admin_bar'     => __('Game'),
		'add_new'            => __('Add New'),
		'add_new_item'       => __('Add New Game'),
		'new_item'           => __('New Game'),
		'edit_item'          => __('Edit Game'),
		'view_item'          => __('View Game'),
		'all_items'          => __('All Games'),
		'search_items'       => __('Search Games'),
		'parent_item_colon'  => __('Parent Games:'),
		'not_found'          => __('No Games found.'),
		'not_found_in_trash' => __('No Games found in Trash.')
    ];

	register_post_type('game', [
        'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => false,
		'rewrite'             => ['slug' => 'games'],
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => null,
		'supports'            => ['title'],
		'menu_icon'			  => 'dashicons-networking',
		'show_in_graphql'	  => true,
		'graphql_single_name' => 'Game',
      	'graphql_plural_name' => 'Games',
    ]);
}
