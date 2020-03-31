<?php

require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/admin.php';
require get_template_directory() . '/inc/graphql.php';

/**
 * Create custom nav menus
 */
add_action('after_setup_theme', function () {
    register_nav_menu('header_menu', 'Header Menu');
    register_nav_menu('footer_menu', 'Footer Menu');
});

/**
 * Complete remove comments from site
 */
add_action('admin_init', function () {
    $post_types = get_post_types();

    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type,'comments');
            remove_post_type_support($post_type,'trackbacks');
        }
    }
});
add_action('admin_menu', function () {
    remove_menu_page( 'edit-comments.php' );
});
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
});

/**
 * Enqueue admin styles
 */
add_action('admin_enqueue_scripts', function () {
	wp_enqueue_style('admin-style', get_stylesheet_directory_uri() . '/admin.css', [], null);
});

/**
 * Custom rewrite for news posts
 */
add_action('generate_rewrite_rules', function ($wp_rewrite) {
    $new_rules = [
        'news/(.+?)/?$' => 'index.php?post_type=post&name=' . $wp_rewrite->preg_index(1),
    ];

    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}); 

add_filter('post_link', function ($post_link, $id = 0){
    $post = get_post($id);

    if (is_object($post) && $post->post_type == 'post') {
        return home_url('/news/'. $post->post_name.'/');
    }

    return $post_link;
}, 1, 3);