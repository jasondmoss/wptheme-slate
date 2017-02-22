<?php

/**
 * Slate: 404 page
 *
 * Contains some dummy HTML with sample content
 * http://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Slate
 */

include "{$slate->dir->partials}/site-header.php";

// include "{$slate->dir->partials}/searchform.php";

?>

<div class="not-found">
  <p> Perhaps checking one of these categories could help you?</p>
  <ul><?php

    wp_list_categories([
        'orderby'    => 'count',
        'order'      => 'DESC',
        'show_count' => 1,
        'title_li'   => '',
        'number'     => 10
    ]);

    ?></ul>
</div>

<?php

include "{$slate->dir->partials}/site-footer.php";

/* <> */
