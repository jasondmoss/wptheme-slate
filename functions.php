<?php

/**
 * Slate
 * Theme specific functionalities.
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://www.jdmlabs.com/license/license-WTFPL-2.txt [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */

defined('ABSPATH') || die('No Direct Access');

/**
 * Check/Confirm minimum PHP version.
 */
if (version_compare(PHP_VERSION, '5.6.30', '<')) {
    die('"Slate" requires at least PHP 5.6.30. Your installed version is '. PHP_VERSION);
}


/**
 * Defines.
 *
 * @var object
 */
$themeDir = __DIR__;
$themeUri = get_template_directory_uri();

global $slate;
$slate = (object) [
    'name'        => get_bloginfo('name'),
    'description' => get_bloginfo('description'),
    'email'       => get_bloginfo('admin_email'),
    'charset'     => get_bloginfo('charset'),
    'lang'        => get_bloginfo('language'),

    /**
     * Directories.
     */
    'dir' => (object) [
        'theme'     => $themeDir,
        'assets'    => "{$themeDir}/assets/min",
        'fonts'     => "{$themeDir}/assets/font",
        'images'    => "{$themeDir}/assets/image",
        'languages' => "{$themeDir}/assets/language",
        'templates' => "{$themeDir}/template",
        'partials'  => "{$themeDir}/template/partial"
    ],

    /**
     * URLs.
     */
    'url' => (object) [
        'wp'     => get_bloginfo('wpurl'),
        'site'   => get_bloginfo('url'),
        'atom'   => get_bloginfo('atom_url'),
        'rss'    => get_bloginfo('rss2_url'),
        'theme'  => $themeUri,
        'assets' => "{$themeUri}/assets/min",
        'fonts'  => "{$themeUri}/assets/font",
        'images' => "{$themeUri}/assets/image"
    ]
];


/**
 * ...
 *
 * --------------------------------------------------------------------------- *
 */

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
    'opt1' => [
        'type' => 'text',
        'name' => 'fb',
        'desc' => 'Facebook link'
    ],

    /**
     *
     */
    'opt2' => [
        'type' => 'dropdown_pages',
        'name' => 'dropdown-pages',
        'desc' => 'Testing dropdown pages'
    ],

    /**
     *
     */
    'opt3' => [
        'type' => 'wp_editor',
        'name' => 'wp-editor',
        'desc' => 'Testing WP Editor'
    ]
]);

/* -- */


/**
 * Load selected theme "features".
 *
 * @return void
 */
add_action('init', function () {
    /**
     * Recursively loads selected feature files.
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    foreach (glob(__DIR__ .'/library/features/*.php') as $feature) {
        if (current_theme_supports(basename($feature, '.php'))) {
            require_once $feature;
        }
    }
});

/* <> */
