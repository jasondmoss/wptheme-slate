<?php

if (current_theme_supports('menus')) {
    $menus = get_theme_support('menus');

    // if some parameters have been added to the menus
    $menus = is_array($menus[0]) ? $menus[0] : [
        'navigation-top' => __('Top Navigation Menu')
    ];

    register_nav_menus($menus);

    add_action('slate_head', 'default_menu');
}


/**
 * Print a default menu
 *
 * @hook slate_head
 */
function default_menu()
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
