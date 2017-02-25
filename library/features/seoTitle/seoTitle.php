<?php

/**
 * Feature: SEO Title
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


add_filter('wp_title', 'slateWpTitle', 10, 2);


/* -- */


/**
* Creates a nicely formatted and more specific title element text for output in
* head of document, based on current view.
*
* @param string $title Default title text for current view.
* @param string $sep   Optional title separator.
*
* @return string
*/
function slateWpTitle($title, $sep)
{
    global $slate, $page, $paged;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= $slate->name;

    // Add the site description for the home/front page.
    if ($slate->description && (is_home() || is_front_page())) {
        $title = "$title $sep $slate->description";
    }

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "{$title} {$sep} ". sprintf(__('Page %s', 'slate'), max($paged, $page));
    }

    return $title;
}

/* <> */
