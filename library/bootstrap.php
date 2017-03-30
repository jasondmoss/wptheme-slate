<?php

/**
 * Theme: Bootstrap
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


// add_action('admin_enqueue_scripts', 'slateAdminAssets');
add_action('wp_enqueue_scripts', 'slateSiteAssets');


/* -- */


/**
 * Register public (front-facing) assets (styles|scripts).
 *
 * @access public
 * @final
 */
function slateAdminAssets()
{
    global $slate;

    $append = false; /*strToTime('today midnight');*/

    wp_register_style('slate-admin-styles', "{$slate->url->assets}/slate-admin.css", [], $append, 'all');
    wp_register_script('slate-admin-script', "{$slate->url->assets}/slate-admin.js", [], $append, true);
    wp_localize_script('slate-admin-script', 'Slate=Slate||{};Slate.Settings', $slate->localization);

    wp_enqueue_style('slate-admin-styles');
    wp_enqueue_script('slate-admin-script');
}


/**
 * Register public (front-facing) assets (styles|scripts).
 *
 * @access public
 * @final
 */
function slateSiteAssets()
{
    global $slate;

    $append = false; /*strToTime('today midnight');*/

    wp_register_style('slate-public-styles', "{$slate->url->assets}/site.css", [], $append, 'all');
    wp_register_script('slate-public-scripts', "{$slate->url->assets}/site.js", [], $append, true);
    wp_localize_script('slate-public-scripts', 'Slate=Slate||{};Slate.Settings', $slate->localization);

    wp_enqueue_style('slate-public-styles');
    wp_enqueue_script('slate-public-scripts');
}

/* <> */
