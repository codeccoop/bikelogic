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
            <h1>Formulari de contacte</h1>
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
