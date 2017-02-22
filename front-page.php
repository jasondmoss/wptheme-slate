<?php

/**
 * Slate: Front Page
 *
 * Can be used for Front Page display
 * see: http://codex.wordpress.org/Creating_a_Static_Front_Page
 *
 * @package WordPress
 * @subpackage Slate
 */

include "{$slate->dir->partials}/site-header.php";

if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('template/content');
    }
} else {
    /**/
}

include "{$slate->dir->partials}/sidebar.php";

include "{$slate->dir->partials}/site-footer.php";

/* <> */
