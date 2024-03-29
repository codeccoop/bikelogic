<?php

/**
 * bikelogic Theme Customizer
 *
 * @package bikelogic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bikelogic_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'bikelogic_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'bikelogic_customize_partial_blogdescription',
            )
        );
    }

    /* Identity Customizer */
    $wp_customize->add_setting('front_page_logo', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'bl_sanitize_image_attachment',
        'default' => '',
    ));
    $wp_customize->add_setting('carrousel_1_ca', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'bl_sanitize_image_attachment',
        'default' => ''
    ));
    $wp_customize->add_setting('carrousel_1_es', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'bl_sanitize_image_attachment',
        'default' => ''
    ));
    $wp_customize->add_setting('carrousel_2_ca', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'bl_sanitize_image_attachment',
        'default' => ''
    ));
    $wp_customize->add_setting('carrousel_2_es', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'bl_sanitize_image_attachment',
        'default' => ''
    ));
    $wp_customize->add_setting('carrousel_3_ca', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'bl_sanitize_image_attachment',
        'default' => ''
    ));
    $wp_customize->add_setting('carrousel_3_es', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'bl_sanitize_image_attachment',
        'default' => ''
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'my_front_page_logo',
            array(
                'label' => 'Logo de la portada',
                'settings' => 'front_page_logo',
                'section' => 'title_tagline',
                'priority' => 50
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'my_front_page_carrousel_1',
            array(
                'label' => 'Imatge del carrousel 1 (ca)',
                'settings' => 'carrousel_1_ca',
                'section' => 'title_tagline',
                'priority' => 55,
                'description' => 'Imatge que apareixerà a la portada'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'my_front_page_carrousel_1_es',
            array(
                'label' => 'Imatge del carrousel 1 (es)',
                'settings' => 'carrousel_1_es',
                'section' => 'title_tagline',
                'priority' => 55,
                'description' => 'Imatge que apareixerà a la portada'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'my_front_page_carrousel_2',
            array(
                'label' => 'Imatge de carrousel 2 (ca)',
                'settings' => 'carrousel_2_ca',
                'section' => 'title_tagline',
                'priority' => 57,
                'description' => 'Si afegeixes aquesta imatge, apareixerà a continuació de la
                imatge principal, creant un carrousel'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'my_front_page_carrousel_2_es',
            array(
                'label' => 'Imatge de carrousel 2 (es)',
                'settings' => 'carrousel_2_es',
                'section' => 'title_tagline',
                'priority' => 57,
                'description' => 'Si afegeixes aquesta imatge, apareixerà a continuació de la
                imatge principal, creant un carrousel'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'my_front_page_carrousel_3',
            array(
                'label' => 'Imatge de carrousel 3 (ca)',
                'settings' => 'carrousel_3_ca',
                'section' => 'title_tagline',
                'priority' => 57,
                'description' => 'Si afegeixes aquesta imatge, apareixerà a continuació de la
                segona principal dins del carrousel'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'my_front_page_carrousel_3_es',
            array(
                'label' => 'Imatge de carrousel 3 (es)',
                'settings' => 'carrousel_3_es',
                'section' => 'title_tagline',
                'priority' => 57,
                'description' => 'Si afegeixes aquesta imatge, apareixerà a continuació de la
                segona imatge dins del carrousel'
            )
        )
    );

    /* Contact Customizer */
    $wp_customize->add_setting('legal_name', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_user',
        'default' => 'Bikelogic, SCCL'
    ));
    $wp_customize->add_setting('street_address', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field',
        'default' => "Carrer de les bicicletes, 38 baixos\nSant Cugat del Vallés\nBarcelona"
    ));
    $wp_customize->add_setting('map_coordinates', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_user',
        'default' => '41.399647, 2.149845'
    ));
    $wp_customize->add_setting('whatsapp', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_user',
        'default' => '600600600'
    ));
    $wp_customize->add_setting('email_address', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_email',
        'default' => ''
    ));
    $wp_customize->add_setting('facebook_url', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_url',
        'default' => 'https://www.facebook.com/Bikelogic-100231266056926'
    ));
    $wp_customize->add_setting('instagram_url', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_url',
        'default' => 'https://www.instagram.com/accounts/edit/'
    ));
    $wp_customize->add_setting('linkedin_url', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_url',
        'default' => 'https://www.linkedin.com/feed/'
    ));

    $wp_customize->add_control('legal_name', array(
        'type' => 'text',
        'priority' => 5,
        'label' => 'Nom legal',
        'description' => 'Nóm legal de la cooperativa',
        'section' => 'contact'
    ));
    $wp_customize->add_control('street_address', array(
        'type' => 'textarea',
        'priority' => 10,
        'label' => 'Adreça',
        'description' => 'Adreça física de la cooperaitva',
        'section' => 'contact',
    ));
    $wp_customize->add_control('map_coordinates', array(
        'type' => 'text',
        'priority' => 15,
        'label' => 'Coordenades',
        'description' => 'Coordenades de l\'adreça extretes de Google Maps<br/><br/><b>Guia</b>: Des de Google Maps, fer un click prollongat uns segons sobre la localització que volem coneixer. En acabar, ens mostrarà una finestra flotant a la part inferior de la pantalla on podrem consultar les coordenades. Les podem copiar directament, o fent click, ens obrirà un panell on podem consultar la informació relativa a les coordenades.<br/><br/>Format</b>: 41.399647, 2.149845',
        'section' => 'contact'
    ));
    $wp_customize->add_control('whatsapp', array(
        'type' => 'text',
        'priority' => 20,
        'label' => 'WhatsApp',
        'description' => 'Número de contacte vie WhatsApp.<br/><br/><b>Descripció</b>: Començar amb +34 (en cas de ser número espanyol) seguit dels nou digits del número de telefon.<br/><br/><b>Format</b>: +34 600 000 000',
        'section' => 'contact'
    ));
    $wp_customize->add_control('email_address', array(
        'type' => 'email',
        'priority' => 30,
        'label' => 'Correu electrònic',
        'description' => 'Correu electrònic de la cooperativa',
        'section' => 'contact'
    ));
    $wp_customize->add_control('facebook_url', array(
        'type' => 'text',
        'priority' => 40,
        'label' => 'Facebook',
        'description' => 'Enllaç al perfil de Facebook de Bikelogic',
        'section' => 'contact'
    ));
    $wp_customize->add_control('instagram_url', array(
        'type' => 'text',
        'priority' => 50,
        'label' => 'Instagram',
        'description' => 'Enllaç al perfil d\'Instagram de Bikelogic',
        'section' => 'contact'
    ));
    $wp_customize->add_control('linkedin_url', array(
        'type' => 'text',
        'priority' => 60,
        'label' => 'Linkedin',
        'description' => 'Enllaç al perfil de Linkedin de Bikelogic',
        'section' => 'contact'
    ));

    $wp_customize->add_section('contact', array(
        'title' => 'Contacte',
        'description' => 'Informació de contacte',
        'priority' => 20
    ));

    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('widgets');
    // $wp_customize->remove_section('static_front_page');
}
add_action('customize_register', 'bikelogic_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bikelogic_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bikelogic_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bikelogic_customize_preview_js()
{
    wp_enqueue_script('bikelogic-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'bikelogic_customize_preview_js');
