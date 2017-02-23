<?php

/**
 * Theme features.
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


/**
 * Recursively loads selected feature files.
 *
 * @see http://php.net/manual/en/function.glob.php
 */
add_action('init', function () {
    foreach (glob(__DIR__ .'/features/*.php') as $feature) {
        if (current_theme_supports(basename($feature, '.php'))) {
            require_once $feature;
        }
    }
});


/* -- */


add_theme_support('seoTitle');
add_theme_support('comments');
add_theme_support('commentsThreaded');

// add two navigation menus
add_theme_support('menus', [
    'navigation-top'  => __('Top Navigation Menu', 'slate'),
    'navigation-foot' => __('Footer Navigation Menu', 'slate')
]);

// add 3 default sidebars
add_theme_support('sidebars', [ [], [], [] ]);

add_theme_support('images', [
    '400x500' => [
        'width'  => '400',
        'height' => '500',
        'crop'   => true
    ]
]);

add_theme_support('customPostType', [
    /**
     * Team post.
     */
    'slate-team' => [
        'singular'           => 'Team Member',
        'plural'             => 'Team Members',
        'publicly_queryable' => true,
        'rewrite'            => [
            'slug'       => 'team',
            'with_front' => true
        ]
    ]
]);

add_theme_support('customTaxonomy', [
    /**
     * Taxonomy like category.
     */
    'slate-team-tag' => [
        'singular' => 'Member Category',
        'plural'   => 'Member Categories',
        'rewrite'  => [
            'slug'       => 'category',
            'with_front' => false
        ],
        'posts' => [
            'slate-team'
        ],
    ],
]);

add_theme_support('settings', [
    /**
     *
     */
    'url1' => [
        'type' => 'text',
        'name' => 'facebook',
        'desc' => 'Facebook URL'
    ],

    /**
     *
     */
    'url2' => [
        'type' => 'text',
        'name' => 'twitter',
        'desc' => 'Twitter URL'
    ],

    /**
     *
     */
    'url3' => [
        'type' => 'text',
        'name' => 'gplus',
        'desc' => 'Google+ URL'
    ]
]);

/* <> */
