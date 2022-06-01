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
    <header class="contact-header">
        <div class="contact-header__column">
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

    <div class="contact-content">
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

</article><!-- #post-<?php the_ID(); ?> -->
