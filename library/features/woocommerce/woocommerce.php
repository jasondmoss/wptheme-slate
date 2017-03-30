<?php

/**
 * Theme: WooCommerce Integrations.
 *
 * @package    WordPress
 * @subpackage Theme|CulinaryTrails
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Taste of Nova Scotia. All rights reserved.
 * @version    0.1.0
 * @license    http://tasteofnovascotia.com/ [License]
 * @link       https://novascotiaculinarytrails.com/
 */


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', function () {
    echo "\n<section id=\"main\">\n";
}, 10);

remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', function () {
    echo "\n</section>\n";
}, 10);

/* <> */
