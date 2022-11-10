<?php

add_action('init', 'video_register_init');

function video_register_init() {
    $labels = array(
        'name' => _x( 'Vídeos', 'post type general name', 'somadev' ),
        'singular_name' => _x( 'Vídeo', 'post type singular name', 'somadev' ),
        'add_new' => _x( 'Adicionar novo', 'video entry', 'somadev' ),
        'add_new_item' => __('Adicionar novo video', 'somadev' ),
        'edit_item' => __( 'Editar video', 'somadev' ),
        'new_item' => __( 'Novo video', 'somadev' ),
        'view_item' => __( 'Visualizar video', 'somadev' ),
        'search_items' => __( 'Procurar videos', 'somadev' ),
        'not_found' =>  __( 'Nenhum video encontrado', 'somadev' ),
        'not_found_in_trash' => __( 'Nenhum video foi encontrado na lixeira', 'somadev' ),
        'parent_item_colon' => ''
    );

    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => 'dashicons-playlist-video',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'thumbnail', 'editor', 'custom-fields' )
    );

    register_post_type( 'video', $args );
    flush_rewrite_rules();
}

register_taxonomy("tipo",
    array("video"),
        array("hierarchical"    => true,
            "label"           => "Categoria do vídeo",
            "singular_label"  => "Categoria do vídeo",
            "rewrite"         => true
        )
);
// global $post, $theme_videos_metaboxes;
// $theme_videos_metaboxes = array(
//     "accessories" => array (
//       "name"      => "title",
//       "default"   => "",
//       "label"     => __('Título do vídeo', ''),
//       "type"      => "input",
//       "desc"      => __('', ''),
//       "class"     => ''
//   ),
//     "pais" => array (
//         "name"      => "duration",
//         "default"   => "",
//         "label"     => __('Duração', ''),
//         "type"      => "input",
//         "desc"      => __('', ''),
//         "class"     => ''
//     ),
//     "cidade_retirada" => array (
//         "name"      => "excerpt",
//         "default"   => "",
//         "label"     => __('Resumo', ''),
//         "type"      => "input",
//         "desc"      => __('', ''),
//         "class"     => ''
//     ),
// );

//add_action("admin_init", "admin_init_video");

add_action('save_post', 'save_details_video');


function save_details_video(){
  global $post;


  if(isset($_POST["video_pagelink"]))
    update_post_meta($post->ID, "video_pagelink", $_POST["video_pagelink"]);
}

add_filter("manage_edit-video_columns", "video_edit_columns");
add_action("manage_posts_custom_column",  "video_custom_columns");

function video_edit_columns($columns){
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __('Titulo do video', 'somadev'),
        "video_desc" => __('Resumo video', 'somadev'),
        "img-video" => __('Foto', 'somadev'),
    );
    return $columns;
}
function video_custom_columns($column){
    global $post;
    switch ($column)
    {
        case "video_desc":
        the_excerpt();
        break;
        case "img-video":
        the_post_thumbnail(array(133, 133));
        break;
    }
}


