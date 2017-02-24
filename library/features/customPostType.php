<?php

/**
 * Feature: Custom Post Type
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


$cpt = get_theme_support('customPostType');
if (is_array($cpt[0])) {
    $cpt = $cpt[0];
    $defaults = [
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => [
            'slug'       => 'slate_post',
            'with_front' => false
        ],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 15,
        'can_export'         => true,
        'show_in_nav_menus'  => true,
        'taxonomies'         => [
            /**/
        ],
        'supports'           => [
            'author', 'comments', 'editor', 'excerpt', 'thumbnail', 'title'
        ]
    ];

    /**
     * Iterate through all of the post definitions and register the post
     * types.
     */
    foreach ($cpt as $key => $post) {
        $labels = [
            'name'               => _x(esc_attr("{$post['plural']}"), 'post type general name'),
            'singular_name'      => _x(esc_attr("{$post['singular']}"), 'post type singular name'),
            'all_items'          => __(esc_attr("All {$post['plural']}")),
            'add_new'            => _x(esc_attr("Add new {$post['singular']}"), 'slate'),
            'add_new_item'       => __(esc_attr("Add new {$post['singular']}")),
            'edit_item'          => __(esc_attr("Edit {$post['singular']}")),
            'new_item'           => __(esc_attr("New {$post['singular']}")),
            'view_item'          => __(esc_attr("View {$post['singular']}")),
            'search_items'       => __(esc_attr("Search {$post['plural']}")),
            'not_found'          => __(esc_attr("{$post['singular']} not found")),
            'not_found_in_trash' => __(esc_attr("{$post['singular']} not found in trash")),
            'parent_item_colon'  => '',
            'menu_name'          => $post['plural']
        ];

        $args = wp_parse_args($post, $defaults);
        $args['labels'] = $labels;

        // Register the post type.
        register_post_type($key, $args);
    }
}

/* <> */
