<?php

/**
 * Slate: Header
 *
 * Contains dummy HTML to show the default structure of WordPress header file
 *
 * Remember to always include the wp_head() call before the ending </head> tag
 *
 * Make sure that you include the <!DOCTYPE html> in the same line as ?> closing tag
 * otherwise ajax might not work properly
 *
 * @package WordPress
 * @subpackage Slate
 */

?><!doctype html>
<html class="no-js" <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css'); ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/theme/favicon.ico" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

</head><body <?php body_class('no-js'); ?>>

<?php do_action('slate_head'); ?>

<div class="search"><?php include "{$slate->dir->partials}/searchform.php"; ?></div>
