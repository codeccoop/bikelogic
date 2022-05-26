<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bikelogic
 */

$page_ID = get_the_ID();
?>
<article id="post-<?php $page_ID; ?>" <?php post_class(); ?>>
    <header class="page-header">
        <?php the_title('<h1 class="page-title">', '</h1>'); ?>
        <h3 class="page-subtitle"><?php the_field('page-subtitle'); ?></h3>
        <?php the_post_thumbnail(); ?>
    </header><!-- .entry-header -->
    <div class="page-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->
    <?php
    $parallax = get_field('page-parallax', $page_ID);
    if ($parallax['show']) : ?>
        <div class="page-parallax">
            <div class="page-parallax__background">
                <?php
                $image_ID = $parallax['image'];
                $image_src = wp_get_attachment_image_src($image_ID, 'full', false)[0];
                ?>
                <img src="<?= $image_src ?>" alt="Imatge de fons del parallax" aria-hidden="true">
            </div>
            <div class="page-parallax__overlay">
                <?= $parallax['text']; ?>
            </div>
        </div>
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
