<?php

/**
 * Theme: Features
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


/**
 * Clean SEO title.
 */
add_theme_support('seoTitle');


/**
 * Comments.
 */
add_theme_support('comments');


/**
 * Threaded comments.
 */
add_theme_support('commentsThreaded');


/**
 * Custom menus.
 */
add_theme_support('menus', [
    'navigation-top'  => __('Top Navigation Menu', 'slate'),
    'navigation-foot' => __('Footer Navigation Menu', 'slate')
]);


/**
 * Sidebar locations.
 *
 * @todo Expand this for further customization.
 */
add_theme_support('sidebars', [
    [ /**/ ],
    [ /**/ ],
    [ /**/ ]
]);


/**
 * Custom image sizes.
 */
add_theme_support('images', [
    /**
     * Extra Large.
     */
    '1920x1080' => [
        'width'  => '1920',
        'height' => '1080',
        'crop'   => true
    ]
]);


/**
 * Custom post type(s).
 */
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


/**
 * Custom taxonomy(ies).
 */
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


/**
 * Custom theme settings.
 */
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
