<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bikelogic
 */

?>

<footer id="colophon" class="site-footer">
    <a class="top-anchored" name="contact-anchor"></a>
    <div id="contact">
        <!-- <h1 class="contact__title">Contacte</h2> -->
        <div class="site-footer__columns">
            <?php if (is_front_page()) : ?>
                <div class="site-footer__column left">
                    <h2 class="contact__section-title"><?php pll_e("Contacta'ns"); ?></h3>
                        <?= do_shortcode('[contact-form-7 id="21" title="Contact form 1" html_class="site-footer__contact-form"]'); ?>
                </div>
            <?php endif; ?>
            <div class="site-footer__column <?= is_front_page() ? 'right' : 'full'; ?>">
                <?php if (is_front_page()) : ?>
                    <h2 class="contact__section-title"><?php pll_e("On som?"); ?></h2>
                <?php
                endif;
                $coordinates = array_map('trim', explode(' ', get_theme_mod('map_coordinates')));
                $lat = $coordinates[0];
                $lng = $coordinates[1];
                echo do_shortcode('[embedded_map lng="' . $lng . '" lat="' . $lat . '" class="contact__map"]');
                ?>
                <div class=contact__info">
                    <h3 class="contact__legal-name"><?= get_theme_mod('legal_name') ?></h3>
                    <p class="contact__street-address" style="white-space: pre;"><?= get_theme_mod('street_address') ?></p>
                    <ul class="contact__links">
                        <li class="contact__link">
                            <a href="https://api.whatsapp.com/send?phone=<?= bl_format_whatsapp(get_theme_mod('whatsapp')); ?>&text=Hola%20Bikelogic!"><?php get_theme_mod('whatsapp'); ?></a>
                            <!-- <a href="https://wa.me/<?= bl_format_whatsapp(get_theme_mod('whatsapp')); ?>?text=Hola%20Bikelogic!"><?= get_theme_mod('whatsapp'); ?></a> -->
                        </li>
                        <li class="contact__link">
                            <a href="mailto:<?= get_theme_mod('email_address'); ?>"><?= get_theme_mod('email_address'); ?></a>
                        </li>
                    </ul>
                    <ul class="socialmedia__links">
                        <li class="socialmedia__link">
                            <a href="<?= get_theme_mod('instagram_url'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/instagram.png" alt="instagram"></a>
                        </li>
                        <!-- <li class="socialmedia__link">
                            <a href="" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/twitter.png" alt="twitter"></a>
                        </li> -->
                        <li class="socialmedia__link">
                            <a href="<?= get_theme_mod('facebook_url'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/facebook.png" alt="facebook"></a>
                        </li>
                        <li class="socialmedia__link">
                            <a href="<?= get_theme_mod('linkedin_url'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/linkedin.png" alt="linkedin"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .site-footer__columns -->
        <div class="site-footer__brand">
            <img src="<?= get_template_directory_uri() . '/assets/images/bikelogic-brand.png'; ?>" />
        </div>
        <div class="site-footer__logos">
            <div class="site-footer__collaborations">
                <h3><?php pll_e('Amb el suport de'); ?></h3>
                <div class="collaborations__logos">
                    <a href="https://www.mercantic.com/en/" target="_blank"><img src="<?= get_template_directory_uri() . '/assets/images/mercantic.png'; ?>" alt="Logo mercantic" /></a>
                    <a href="https://www.codeccoop.org/#home" target="_blank"><img src="<?= get_template_directory_uri() . '/assets/images/logo-codec.webp' ?>" alt="Logo Còdec" /></a>
                </div>
            </div>
            <div class="site-footer__collaborations">
                <h3>Partners</h3>
                <div class="collaborations__logos">
                    <a href="https://www.fleximodal.fr/" target="_blank"><img src="<?= get_template_directory_uri() . '/assets/images/fleximodal-logo.png'; ?>" alt="Logo mercantic" /></a>
                    <a href="https://triobike.com/en/" target="_blank"><img src="<?= get_template_directory_uri() . '/assets/images/triobike.png'; ?>" alt="Logo Barcelona Activa" /></a>

                </div>
            </div>
        </div>
        <div class="site-info">
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'bikelogic')); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf(esc_html__('Pàgina web feta amb %s', 'bikelogic'), 'WordPress');
                ?>
            </a>
            <span class="sep"> | </span>
            <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf(esc_html__('Tema: %1$s by %2$s.', 'bikelogic'), 'bikelogic', '<a href="http://codeccoop.org">còdec</a>');
            ?>
        </div><!-- .site-info -->
    </div><!-- #contact -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri() . '/assets/js/utils/viewport.js'; ?>"></script>
</body>

</html>