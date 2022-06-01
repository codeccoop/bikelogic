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
            $post_id = get_the_ID(); ?>
            <h1><?php echo get_the_title($post_id); ?></h1>
            <?php if (get_field('page-subtitle', $post_id)) : ?>
                <h2><?php the_field('page-subtitle', $post_id); ?></h2>
            <?php else : ?>
                <h2><?php echo get_the_excerpt($post_id); ?></h2>
            <?php endif ?>

        </div>

    </header><!-- .entry-header -->

    <div class="service-content">
        <?php
        the_content(
            #		the_content(
            #			sprintf(
            #				wp_kses(
            #					/* translators: %s: Name of current post. Only visible to screen readers */
            #					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bikelogic' ),
            #					array(
            #						'span' => array(
            #							'class' => array(),
            #						),
            #					)
            #				),
            #				wp_kses_post( get_the_title() )
            #			)
        ); ?>

    </div><!-- .entry-content -->
    <?php
    $parallax = get_field('page-parallax');
    if ($parallax != null && $parallax['show']) { ?>
        <div class="service-parallax">
            <div class="service-parallax__background">
                <?php $image_id = $parallax['image'];
                $image_src = wp_get_attachment_image_src($image_id, 'full', false)[0];
                ?>
                <img src="<?= $image_src ?>" alt="Imatge de fons del parallax">
            </div>
            <div class="service-parallax__overlay">
                <?php echo $parallax['text']; ?>
            </div>
        </div>
    <?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php
get_footer();
