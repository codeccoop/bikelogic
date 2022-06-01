<?php
//adding our own portfolio item
function bl_post_contact_item() {
    $labels = array(
        'name'               => _x( 'formularis contacte', 'post type general name' ),
        'singular_name'      => _x( 'formulari contacte', 'post type singular name' ),
        'menu_name'          => 'Formularis Contacte'
      );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Aquest post serveix per crear els formularis de contacte de les pàgines de navegació interna',
        'public'        => true,
        'menu_position' => 6,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'  => true,
        'has_archive'   => false,
      );
    register_post_type( 'formulari-contacte', $args );
}

add_action( 'init', 'bl_post_contact_item' );
?>