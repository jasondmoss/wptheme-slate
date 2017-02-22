<?php

/**
 * Slate: Home
 *
 * Overwritten by Front Page if specific settings are set.
 * See: http://codex.wordpress.org/Creating_a_Static_Front_Page
 *
 * @package WordPress
 * @subpackage Slate
 */

include "{$slate->dir->partials}/site-header.php";

if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('template/content', 'loop');
    }
} else {
    /**/
}

include "{$slate->dir->partials}/sidebar.php";

include "{$slate->dir->partials}/site-footer.php";

/* <> */
