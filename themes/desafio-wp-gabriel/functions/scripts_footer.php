<?php

add_action('wp_enqueue_scripts', 'play_enqueue_scripts_input');
function play_enqueue_scripts_input(){
  $postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';
  ?>

  <?php



  //CSS

  wp_enqueue_style( 'global', get_template_directory_uri() . "/build/css/global.css", array() );

  $translation_array = array(
     'siteURL' => get_site_url(),
     'siteUrlTemplate' => get_bloginfo('template_url'),
  );


?>

<?php }

add_action('wp_footer', 'play_activate_scripts');

function play_activate_scripts(){

}

