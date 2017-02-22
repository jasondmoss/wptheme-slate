<?php

/**
 * Slate: Page
 *
 * @package WordPress
 * @subpackage Slate
 */

include "{$slate->dir->partials}/site-header.php";

the_post();

get_template_part('template/content');

include "{$slate->dir->partials}/sidebar.php";

include "{$slate->dir->partials}/site-footer.php";

/* <> */
