<?php

if (current_theme_supports('seoTitle')) {
    /**
    * Creates a nicely formatted and more specific title element text
    * for output in head of document, based on current view.
    *
    * @param string $title Default title text for current view.
    * @param string $sep Optional separator.
    *
    * @return string Filtered title.
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

    add_filter('wp_title', 'slateWpTitle', 10, 2);
}

/* <> */
