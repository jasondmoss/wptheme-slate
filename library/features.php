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
 * Recursively scans feature directories, then loads each 'supported' feature
 * file.
 *
 * @param string $path
 *
 * @uses \DirectoryIterator
 * @see http://php.net/manual/en/directoryiterator.construct.php
 */
$path = __DIR__ .'/features/';
add_action('init', function () use ($path) {
    foreach (new DirectoryIterator($path) as $feature) {
        if ($feature->isDir() && !$feature->isDot() && current_theme_supports($feature->getFilename())) {
            require_once "{$path}{$feature}/{$feature}.php";
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
     * Project.
     */
    'pt_project' => [
        'singular'           => 'Project',
        'plural'             => 'Projects',
        'publicly_queryable' => true,
        'rewrite'            => [
            'slug'       => 'project',
            'with_front' => true
        ]
    ]
]);


/**
 * Custom taxonomy(ies).
 */
add_theme_support('customTaxonomy', [
    /**
     * Client.
     */
    'tx_client' => [
        'singular' => 'Client',
        'plural'   => 'Clients',
        'rewrite'  => [
            'slug'       => 'client',
            'with_front' => false
        ],
        'posts' => [
            'pt_project'
        ],
    ],

    /**
     * Industry.
     */
    'tx_industry' => [
        'singular' => 'Industry',
        'plural'   => 'Industries',
        'rewrite'  => [
            'slug'       => 'industry',
            'with_front' => false
        ],
        'posts' => [
            'pt_project'
        ],
    ]
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
