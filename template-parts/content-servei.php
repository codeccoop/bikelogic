<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bikelogic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="service-header">
        <div class="service-header__column left">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="service-header__column right">
            <?php
            the_title('<h1 class="entry-title" style="color:red;">', '</h1>');
            ?>
        </div>

    </header><!-- .entry-header -->

    <div class="service-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'bikelogic'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        ); ?>

    </div><!-- .entry-content -->
    <?php
    $parallax = get_field('parallax')<
    if ($parallax['boto_parallax']) { ?>
        <div class="service-parallax">
            <div class="service-parallax__background">
                <?php $image_id = $parallax['imatge_parallax'];
                $image_src = wp_get_attachment_image_src($image_id, 'full', false)[0];
                ?>
                <img src="<?= $image_src ?>" alt="Imatge de fons del parallax" aria-hidden="true">
            </div>
            <div class="service-parallax__overlay">
                <?php echo $parallax['text_parallax']; ?>
            </div>
        </div>
    <?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
