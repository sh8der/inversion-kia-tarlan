<?php

require_once __DIR__ . '/reg-mce-plugin.php';
require_once __DIR__ . '/add-new-styles.php';
require_once __DIR__ . '/ux_builder/override_divider_builder_element.php';
require_once __DIR__ . '/ux_builder/override_follow_builder_element.php';
require_once __DIR__ . '/ux_builder/override_divider_shortcode.php';
require_once __DIR__ . '/ux_builder/override_follow_shortcode.php';

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script('sh8der-custom-j', get_stylesheet_directory_uri() . '/sh8der/custom.js?v8', array('jquery', 'flatsome-js'));
  wp_enqueue_style('sh8der-custom-s', get_stylesheet_directory_uri() . '/sh8der/custom.css?v22', array('flatsome-main'));
});
