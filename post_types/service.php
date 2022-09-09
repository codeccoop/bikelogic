<?php
//adding our own portfolio item
function bl_post_service_item()
{
    $labels = array(
        'name'               => _x('Serveis', 'post type general name'),
        'singular_name'      => _x('Servei', 'post type singular name'),
        'menu_name'          => 'Serveis'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Aquest post serveix per crear les entrades de la secció serveis',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'show_in_rest'  => true,
        'has_archive'   => false,
        # 'taxonomies' => array('category', 'post_tag'),
    );
    register_post_type('servei', $args);
}

add_action('init', 'bl_post_service_item');
?>
