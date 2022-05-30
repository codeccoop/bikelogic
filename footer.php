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
    <div id="contact">
        <h1 class="contact__title">Contacte</h2>
            <div class="site-footer__columns">
                <div class="site-footer__column left">
                    <h2 class="contact__section-title">Vols contractar els nostres servèis?</h3>
                        <?= do_shortcode('[contact-form-7 id="21" title="Contact"]'); ?>
                </div>
                <div class="site-footer__column right">
                    <h2 class="contact__section-title">On sóm?</h2>
                    <?php
                    $coordinates = array_map('trim', explode(' ', get_theme_mod('map_coordinates')));
                    $lat = $coordinates[0];
                    $lng = $coordinates[1];
                    echo do_shortcode('[embedded_map lng="' . $lng . '" lat="' . $lat . '" class="contact__map"]');
                    ?>
                    <h3 class="contact__legal-name"><?= get_theme_mod('legal_name') ?></h3>
                    <p class="contact__street-address" style="white-space: pre;"><?= get_theme_mod('street_address') ?></p>
                    <ul class="contact__links">
                        <li class="contact__link">
                            <a href="https://wa.me/<?= bl_format_whatsapp(get_theme_mod('whatsapp')); ?>"><?= get_theme_mod('whatsapp'); ?></a>
                        </li>
                        <li class="contact__link">
                            <a href="mailto:<?= get_theme_mod('email_address'); ?>"><?= get_theme_mod('email_address'); ?></a>
                        </li>
                    </ul>
                </div>
            </div><!-- .site-footer__columns -->
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
