<?php

add_theme_support( 'post-thumbnails' );

if (function_exists('add_image_size')) {
  add_image_size( 'thumb_1', 225, 340, true );
}
// Custom post
require(get_template_directory() . '/functions/custompost/video.php' );

// ACF
require(get_template_directory() . '/functions/acf/video-info.php' );

function example_insert_category() {
  $parent_term = term_exists( 'video' ); // array is returned if taxonomy is given
$parent_term_id = $parent_term['term_id']; // get numeric term id
  wp_insert_term(
      'Filme',
      'Série',
      'Documentário',
      array(
        'description' => 'Defina qual categoria o vídeo se encaixa.',
        'slug'        => 'tipo-video'
      )
  );
}
add_action( 'after_setup_theme', 'example_insert_category' );
