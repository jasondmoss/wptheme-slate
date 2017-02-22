<?php

/**
 * Slate: Archive page
 *
 * Archive page lists all posts belonging to monthly / weekly / daily archives
 * it's a good idea to have a drawback method in case no posts were found
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
