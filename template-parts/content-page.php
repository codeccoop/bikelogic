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
</article><!-- #post-<?php the_ID(); ?> -->
