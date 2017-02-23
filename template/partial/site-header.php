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

global $slate;

?><!doctype html>
<html class="no-js" lang="<?php echo $slate->lang; ?>" prefix="
    xhv: http://www.w3.org/1999/xhtml/vocab#
    xsd: http://www.w3.org/2001/XMLSchema#
    rdfs: http://www.w3.org/2000/01/rdf-schema#
    dc: http://purl.org/dc/terms/
    vcard: http://www.w3.org/2006/vcard/ns#
    v: http://rdf.data-vocabulary.org/#"><head>
<meta charset="<?php echo $slate->charset; ?>">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo "{$slate->url->images}"; ?>/favicon.ico">

<?php wp_head(); ?>

</head><body <?php body_class('no-js'); ?>>

<?php do_action('slate_head'); ?>

<div class="search"><?php include "{$slate->dir->partials}/searchform.php"; ?></div>
