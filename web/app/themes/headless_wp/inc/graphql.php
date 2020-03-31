<?php

/**
 * Register custom GraphQL handlers
 */
add_action('graphql_register_types', function () {
    register_graphql_field('Page', 'pageTemplate', [
        'type' => 'String',
        'description' => 'WordPress Page Template',
        'resolve' => function ($page) {
            $base = basename(get_page_template_slug($page->pageId)); // Get base string
            return empty($base) ? '' : substr(substr($base, 5), 0, -4); // Trim first 5, and last 4 characters
        },
    ]);

    register_graphql_field('MenuItem', 'slug', [
        'type' => 'String',
        'description' => 'WordPress Headless Slug',
        'resolve' => function ($menuItem) {
            return parse_url($menuItem->url)['path'];
        },
    ]);
});