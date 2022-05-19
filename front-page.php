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
$page_ID = get_option('page_on_front');
?>

<main class="front-page">
    <section id="cover" class="front-page__section">
        <?php 
            $image_id = get_field('portada', $page_ID);
            $image_data = null;
            if ($image_id) {
                $image_data=wp_get_attachment_image_src($image_id, 'full', false);
            }

            if ($image_data) : ?>
                <img class="front-page__cover-image" src="<?php echo $image_data[0];?>" alt="Imatge de la portada">
            <?php else : ?>
                <img class="front-page__cover-image" src="<?php bloginfo('template_url');?>/assets/images/home-image.jpg" alt="Portada de la pàgina de bikelogic">
            <?php endif ?>
    </section>
    <section id="services" class="front-page__section" style="background-image: url('<?php bloginfo('template_url');?>/assets/images/iso_bl_color_pos.png');">
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
                            <div class="front-page__service">
                                <a href="<?php echo $post_url ?>"><div class="front-page__service-content">
                                    <div class="service-info left">
                                        <?php if (has_post_thumbnail($post_id)) : 
                                         the_post_thumbnail('post-thumbnails', array('class' => 'thumbnail'));
                                         else : ?>
                                            <img class="thumbnail" src="<?php bloginfo('template_url');?>/assets/images/<?php echo get_the_title();?>.png" alt="Icona del servei <?php echo get_the_title()?>">
                                        <?php endif ?>
                                    </div>
                                    
                                    <div class="service-info right">
                                        <h3><?php echo get_the_title();?></h3>
                                        <p><?php echo get_the_excerpt();?></p>
                                        <button class="service-button">Més informació></button>
                                    </div> 
                                    
                                </div></a>
                            </div>
                        <?php endwhile; ?>
                </div>
        
            <?php endif; ?>

    </section>
    <section id="project" class="front-page__section parallax-window">
        <div class="front-page__parallax-background">
            <?php 
                $image_id = get_field('parallax', $page_ID);
                if ( $image_id ) : 
                    $image_data=wp_get_attachment_image_src($image_id, 'full', false);?>
                    <img class="front-page__project-image" src="<?php echo $image_data[0];?>" alt="Imatge del projecte">
                <?php else : ?>
                    <img class="front-page__project-image" src="<?php bloginfo('template_url');?>/assets/images/parallax-image.jpg" alt="Imatge del projecte per defecte">
                <?php endif ?>
        </div>
        <div class="front-page__parallax-overlay">
            <?php if (get_field('projecte', $page_ID)) : ?>
                    <h2><?php the_field('projecte', $page_ID); ?></h2>
            <?php else : ?>
                    <h2>Això no està funcionant</h2>
            <?php endif; ?> 
        </div>
    </section>
    <section id="team" class="front-page__section">
        <h1>Equip</h1>

    </section>
</main>
<?php get_footer(); ?>
