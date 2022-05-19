<?php
//adding our own portfolio item
function bl_post_valor_item() {
    $labels = array(
        'name'               => _x( 'Valors', 'post type general name' ),
        'singular_name'      => _x( 'Valor', 'post type singular name' ),
        'menu_name'          => 'Missió i valors'
      );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Aquest post serveix per crear les entrades de la secció valors',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'   => false,
      );
    register_post_type( 'valor', $args );
}

add_action( 'init', 'bl_post_valor_item' );
?>