<?php

if (current_theme_supports('sidebars')) {
    $sidebars = get_theme_support('sidebars');

    /* Have we defined any custom sidebars? */
    if (is_array($sidebars[0])) {
        $sidebars = $sidebars[0];
        $sbCount = 0;

        /* Iterate through each sidebar. */
        foreach ($sidebars as $key => $sidebar) {
            ++$sbCount;

            $defaults = [
                'name'          => __(esc_attr("Sidebar-{$sbCount}"), 'slate'),
                'id'            => "sidebar-{$sbCount}",
                'before_widget' => '<section id="%1$s"class="%2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            ];

            /* Parse the defaults with sidebar specific arguments */
            $sidebar = wp_parse_args($sidebar, $defaults);

            register_sidebar($sidebar);
        }
    } else {
        /* Default behavior */
        $sidebar = [
            'name'          => __('Sidebar-1', 'slate'),
            'id'            => 'sidebar-1',
            'before_widget' => '<section id="%1$s"class="%2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '</h3>',
            'after_title'   => '</h3>',
        ];

        register_sidebar($sidebar);
    }
}

/* <> */
