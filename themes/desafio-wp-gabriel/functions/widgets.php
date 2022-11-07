<?php

add_action( 'widgets_init', 'somadev_widgets_init' );

function somadev_widgets_init() {

    register_sidebar ( array (
        'name' => __( 'Sidebar', 'somadev' ),
        'id' => 'sidebar',
        'description' => __( 'Exibição de elementos na sidebar do Blog', 'somadev' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

}