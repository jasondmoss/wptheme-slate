<?php

/**
 * Feature: Menus
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


add_action('slate_head', 'defaultMenu');


/* -- */


$menus = get_theme_support('menus');
$menus = is_array($menus[0]) ? $menus[0] : [
    'navigation-top' => __('Top Navigation Menu')
];

register_nav_menus($menus);


/**
 * Print a default menu
 *
 * @hook slate_head
 */
function defaultMenu()
{
    if (has_nav_menu('navigation-top')) {
        wp_nav_menu([
            'theme_location' => 'navigation-top',
            'container'      => false,
            'items_wrap'     => '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>',
        ]);
    }
}

/* <> */
