<?php

define( 'somadev_VERSION', '0.0.1' );
add_theme_support( 'post-thumbnails' );

if (function_exists('add_image_size')) {
  //add_image_size( 'thumb_slider_desktop', 1920, 880, true );
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Functions
require(get_template_directory() . '/functions/scripts-footer.php');
require(get_template_directory() . '/functions/login-style.php' );

// Widgets
require(get_template_directory() . '/functions/widgets.php' );

// Custom Post

// ACF
require(get_template_directory() . '/functions/acf/scripts-header.php' );
require(get_template_directory() . '/functions/acf/scripts-footer.php' );
require(get_template_directory() . '/functions/acf/config-page.php' );

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}