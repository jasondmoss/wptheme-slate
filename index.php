<?php

/**
 * Slate: Index
 *
 * @package WordPress
 * @subpackage Slate
 */

include "{$slate->dir->partials}/site-header.php";

if (have_posts()) {
    posts_nav_link();

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
