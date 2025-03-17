<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bikelogic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Nunito:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HQQKLDRY34"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-HQQKLDRY34');
    </script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php if (is_front_page() || is_home()) : ?>
        <div id="pageLoader">
            <?php
            $filepath = get_template_directory() . '/assets/images/marca_bl_color_pos.svg';
            if (file_exists($filepath)) {
                $file = fopen($filepath, "r");
                echo fread($file, filesize($filepath));
                fclose($file);
            }
            ?>
        </div>
    <?php endif; ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'bikelogic'); ?></a>

        <header id="masthead" class="site-header">
            <div class="site-branding"><?php
                                        if (has_custom_logo()) :
                                            the_custom_logo();
                                        else : ?>
                    <a href="<?= get_site_url(); ?>" class="custom-logo-link" rel="home" aria-current="page">
                        <img src="<?= bloginfo('template_url'); ?>/assets/images/bikelogic-brand.png" class="custom-logo" alt="Bikelogic">
                    </a>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <div class="main-navigation__columns">
                    <div class="main-navigation__column left">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>
                    </div>
                    <div class="main-navigation__column right">
                        <div class="menu-social-menu-container">
                            <ul id="menu-social-menu" class="menu">
                                <li class="menu-item menu-item-type-custom" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/images/icons/whatsapp.png')">
                                    <a href="https://api.whatsapp.com/send?phone=<?= bl_format_whatsapp(get_theme_mod('whatsapp')); ?>&text=Hola%20Bikelogic!"></a>
                                    <!-- <a href="https://wa.me/<?= bl_format_whatsapp(get_theme_mod('whatsapp')); ?>?text=Hola%20Bikelogic!"></a> -->
                                </li>
                                <li class="menu-item menu-item-type-custom" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/images/icons/email.png')">
                                    <a href="mailto:<?= get_theme_mod('email_address'); ?>"></a>
                                </li>
                            </ul>
                        </div><!-- #menu-social-menu -->
                    </div>
                </div><!-- main-navigation__columns -->
                <div class="whatsapp-button-toggle" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/images/icons/whatsapp-verd.png')">
                    <a href="https://wa.me/<?= get_theme_mod('whatsapp'); ?>"></a>
                </div>
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="burger"></span>
                </button>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->