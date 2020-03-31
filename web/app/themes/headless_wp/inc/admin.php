<?php
/**
 * Options pages.
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' 	=> 'Tilting Point Settings',
        'menu_title' 	=> 'Tilting Point',
        'menu_slug' 	=> 'tp',
        'capability' 	=> 'edit_posts',
        'redirect' 	    => false,
        'position'      => 25.2049,
        'show_in_graphql' => true,
    ]);
}