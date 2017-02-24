<?php

/**
 * Slate theme-specific functionalities.
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
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
    ],

    /**
     * JavaScript variables.
     *
     * @see https://codex.wordpress.org/Function_Reference/wp_localize_script
     */
    'localization' => [
        /**/
    ]
];


/**
 * Library functions.
 *
 * Recursively loads all function files.
 *
 * @see http://php.net/manual/en/function.glob.php
 */
foreach (glob(__DIR__ .'/library/*.php') as $libraryFile) {
    require_once $libraryFile;
}

/* <> */
