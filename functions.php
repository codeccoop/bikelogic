<?php

/**
 * bikelogic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bikelogic
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bikelogic_setup()
{
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bikelogic, use a find and replace
		* to change 'bikelogic' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('bikelogic', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails', array('post', 'page', 'servei'));

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'bikelogic'),
        )
    );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'bikelogic_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
            'unlink-homepage-logo' => false
        )
    );
}
add_action('after_setup_theme', 'bikelogic_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bikelogic_content_width()
{
    $GLOBALS['content_width'] = apply_filters('bikelogic_content_width', 640);
}
add_action('after_setup_theme', 'bikelogic_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bikelogic_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'bikelogic'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'bikelogic'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'bikelogic_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bikelogic_scripts()
{
    wp_enqueue_style('bikelogic-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('bikelogic-style', 'rtl', 'replace');

    wp_enqueue_script('bikelogic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    wp_enqueue_script('bikelogic-loader', get_template_directory_uri() . '/js/loader.js', array(), _S_VERSION, true);

    wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_register_style('mapbox-gl-css', 'https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css', false);
    // wp_enqueue_style('mapbox-gl-css');
    wp_register_script('mapbox-gl-js', 'https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js', false);
    // wp_enqueue_script('mapbox-gl-js');
    wp_register_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', false);
    // wp_enqueue_script('slick-js');
    wp_register_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false);
      // wp_enqueue_style('slick-css');
    
}
add_action('wp_enqueue_scripts', 'bikelogic_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load custom post types
 */

require get_template_directory() . '/post_types/service.php';
# require get_template_directory() . '/post_types/valors.php';
require get_template_directory() . '/post_types/contact.php';

/**
 * Load shortcodes
 */
require get_template_directory() . '/shortcodes/embedded-map.php';

/*
 * Custom functions
 */

function bl_format_whatsapp($phone_num)
{
    return preg_replace('/-+/', '', preg_replace('/\s+/', '', preg_replace('/\·+/', '', preg_replace('/\++/', '', $phone_num))));
}

function bl_sanitize_image_attachment($input)
{
    error_log(attachment_url_to_postid($input)); //debug
    return attachment_url_to_postid($input);
}

/*POLYLANG*/
/*Allow polylang to include custom strings to the string-translation database*/

add_action('init', function() {
  pll_register_string('bikelogic-contactans', "Contacta'ns");
  pll_register_string('bikelogic-onsom', 'On som?');
  pll_register_string('bikelogic-suport', 'Amb el suport de');
  pll_register_string('bikelogic-onsom', 'On som?');
  pll_register_string('bikelogic-onsom', 'Coneix-nos');
});

