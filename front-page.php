<?php
/**
 * Fornt-page Bikelogic
 *
 * This is the template for the front-page for the Bikelogic project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bikelogic
 */

get_header();
?>

<main class="front-page">
    <section id="cover" class="front-page__section">
        <?php 
            $image_id = get_field('portada');
            if ( $image_id ) : 
                $image_data=wp_get_attachment_image_src($image_id, 'full', false);?>
                <img class="front-page__cover-image" src="<?php echo $image_data[0];?>" alt="Imatge de la portada">
            <?php else : ?>
                <img src="<?php bloginfo('template_url');?>/assets/images/bannercodec.png" alt="Portada de la pàgina de bikelogic">
            <?php endif ?>
    </section>
    <section id="services" class="front-page__section">
        <?php
            $args = array(
               'post_type' => 'servei',
               'posts_per_page' => -1    
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :?>
                <div class="front-page__services-container">
                    <?php 
                        while($query->have_posts()):
                            $query->the_post();
                            $post_id=get_the_ID();
                            $post_url=get_post_permalink($post_id);?>
                            <a href="<?php echo $post_url ?>"><div class="front-page__service">
                                <h1><?php echo get_the_title();?></h1>
                                <p><?php echo get_the_excerpt();?></p>
                            </div></a>
                        <?php endwhile; ?>
                </div>
        
            <?php endif; ?>

    </section>
</main>
