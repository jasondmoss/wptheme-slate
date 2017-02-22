<?php

/**
 * Template Name: Options Page
 *
 * @package WordPress
 * @subpackage Slate
 */

include "{$slate->dir->partials}/site-header.php";

/* Get our options. */
$slateOptions = get_option('slateOptions');

/* Conditionally check if values are set. */
$slateText = isset($slateOptions['slateText']) ? $slateOptions['slateText'] : '';
$slateWpEditor = isset($slateOptions['slateWpEditor']) ? $slateOptions['slateWpEditor'] : '';
$slateDropdownPages = isset($slateOptions['slateDropdownPages']) ? $slateOptions['slateDropdownPages'] : '';

echo esc_attr($slateText);

?><br><?php

echo esc_html(apply_filters('the_content', $slateWpEditor));

?><br><?php

echo esc_html($slateDropdownPages);

include "{$slate->dir->partials}/sidebar.php";

include "{$slate->dir->partials}/site-footer.php";

/* <> */
