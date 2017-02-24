<?php

/**
 * Template: Theme Options
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
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
