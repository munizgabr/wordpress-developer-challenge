<?php

function soma_enqueue_scripts_input(){
  $postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

  $js = array(
    'js_global' => [
      'plugins',
      'main',
      'menu'
    ],
  );

  //JS
  foreach ($js['js_global'] as $item) {
    wp_enqueue_script( $item, get_template_directory_uri() . "/js/" . "$item.js", array(), somadev_VERSION, true );
  }

  //CSS
  wp_enqueue_style( 'font-icons-css', get_template_directory_uri() . "/css/font-icons.css", array(), somadev_VERSION );
  wp_enqueue_style( 'plugins-css', get_template_directory_uri() . "/css/plugins.css", array(), somadev_VERSION );
  wp_enqueue_style( 'style-css', get_template_directory_uri() . "/css/style.css", array(), somadev_VERSION );
  wp_enqueue_style( 'responsive-css', get_template_directory_uri() . "/css/responsive.css", array(), somadev_VERSION );
  wp_enqueue_style( 'global-css', get_template_directory_uri() . "/build/css/global.css", array(), somadev_VERSION );

  $translation_array = array(
    'siteURL' => get_site_url(),
    'siteUrlTemplate' => get_bloginfo('template_url'),
  );
  wp_localize_script( 'jquery-3.2.1.min', 'somaData', $translation_array );

}

function soma_activate_scripts(){ ?>

    <script type="text/javascript">
      $(document).ready(function(){
        if(jQuery(window).width() < 1000){
                var phone = jQuery(".button-whatsapp-flutuante").attr("data-phone");
            jQuery('.button-whatsapp-flutuante').attr('href','https://api.whatsapp.com/send?phone='+phone+'');
            }
        });
    </script>

<?php }

add_action('wp_enqueue_scripts', 'soma_enqueue_scripts_input');
add_action('wp_footer', 'soma_activate_scripts');