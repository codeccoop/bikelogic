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
if (!wp_script_is('slick-js')) {
    wp_enqueue_script('slick-js');
}

if (!wp_script_is('slick-css')) {
    wp_enqueue_style('slick-css');
}
get_header();
$page_ID = get_option('page_on_front');
?>

<main class="front-page">
    <section id="cover" class="front-page__section">
        <a class="top-anchor"></a>
        <?php
        $image_id = get_theme_mod('jumbotron');
        $image_carroussel1 = get_theme_mod('carroussel1');
        $image_carroussel2 = get_theme_mod('carroussel2');
        $carroussel1_data = null;
        $carroussel2_data = null;
        $image_data = null;
        if ($image_id || $image_id && $image_carroussel1 || $image_id && $image_carroussel1 || $image_id && $image_carroussel1 && $image_carroussel2) {?>
            <div class="carroussel-container">
                <?php if ($image_id){
                    $image_data = wp_get_attachment_image_src($image_id, 'full', false);
                }
                if ($image_data){ ?>
                    <div><img class="front-page__cover-image" src="<?php echo $image_data[0]; ?>" alt="Imatge del carroussel"></div>
                <?php }
                if ($image_carroussel1){
                $carroussel1_data = wp_get_attachment_image_src($image_carroussel1, 'full', false);
                }
                if ($carroussel1_data){ ?>
                    <div><img class="carroussel-image" src="<?php echo $carroussel1_data[0]; ?>" alt="Imatge del carroussel"></div>
                <?php }
                if($image_carroussel2){
                    $carroussel2_data = wp_get_attachment_image_src($image_carroussel2, 'full', false);
                }
                if($carroussel2_data){ ?>
                    <div><img class="carroussel-image" src="<?php echo $carroussel2_data[0]; ?>" alt="Imatge del carroussel"></div>
                <?php }?>    
            
            </div>
        <?php }
        else { ?>
            <img class="front-page__cover-image" src="<?= get_bloginfo('template_url'); ?>/assets/images/home-image.jpg" alt="Portada de la pàgina de bikelogic">
        <?php }
        $site_description = get_bloginfo('description', 'display');
        $site_name = get_bloginfo('name');
        if (display_header_text() && (is_home() || is_front_page())) : ?>
            <h1 class="front-page__site-title">
                <?php
                $brand_image_id = get_theme_mod('front_page_logo');
                if ($brand_image_id) {
                    $brand_image_url = wp_get_attachment_image_src($brand_image_id, 'full', false)[0];
                } else {
                    $brand_image_url = get_bloginfo('template_url') . '/assets/images/bikelogic-brand--white.png';
                }
                ?>
                <img src="<?= $brand_image_url; ?>" />
                <?= $site_description; ?>
            </h1>
        <?php endif; ?>
    </section>
    <!-- <section id="services" class="front-page__section" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/images/iso_bl_color_pos.png');"> -->
    <a name="services-anchor" class="top-anchored"></a>
    <section id="services" class="front-page__section">
        <a class="top-anchor"></a>
        <?php
        $args = array(
            'post_type' => 'servei',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'asc'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) : ?>
            <div class="front-page__services-container">
                <?php
                while ($query->have_posts()) :
                    $query->the_post();
                    $post_id = get_the_ID();
                    $post_url = get_post_permalink($post_id); ?>
                    <div class="front-page__service">
                        <a href="<?php echo $post_url ?>">
                            <div class="front-page__service-content">
                                <div class="service-info left">
                                    <?php if (has_post_thumbnail($post_id)) :
                                        the_post_thumbnail('post-thumbnails', array('class' => 'thumbnail'));
                                    else : ?>
                                        <img class="thumbnail" src="<?php bloginfo('template_url'); ?>/assets/images/<?php echo get_the_title(); ?>.png" alt="Icona del servei <?php echo get_the_title() ?>">
                                    <?php endif ?>
                                </div>
                                <div class="service-info right">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                    <button class="service-button">Més informació></button>
                                </div>

                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>

    </section>
    <a class="top-anchored" name="intersection-anchor"></a>
    <section id="intersection" class="front-page__section">
        <div class="intersection__container">
            <div class="intersection__text">
                <?php the_field('seccio_intermitja', $page_ID); ?>
            </div>
            <img class="intersection__image" src="<?php bloginfo('template_url'); ?>/assets/images/bikelogic-brand--white.png">
        </div>

    </section>
    <a class="top-anchored" name="project-anchor"></a>
    <section id="project" class="front-page__section parallax-window">
        <div class="front-page__parallax-background">
            <?php
            $image_id = get_field('parallax', $page_ID);
            if ($image_id) :
                $image_data = wp_get_attachment_image_src($image_id, 'full', false); ?>
                <img class="front-page__project-image" src="<?= $image_data[0]; ?>" alt="Imatge del projecte">
            <?php else : ?>
                <img class="front-page__project-image" src="<?php bloginfo('template_url'); ?>/assets/images/parallax-image.jpg" alt="Imatge del projecte per defecte">
            <?php endif ?>
        </div>
        <div class="front-page__parallax-overlay">
            <?php if (get_field('projecte', $page_ID)) : ?>
                <div class="parallax-overlay__text"><?php the_field('projecte', $page_ID); ?></div>
            <?php endif;
            $missioivalors = get_field('missio_i_valors', $page_ID);
            $objectiu_1 = $missioivalors['objectiu_1'];
            $objectiu_2 = $missioivalors['objectiu_2'];
            $objectiu_3 = $missioivalors['objectiu_3'];
            ?>
            <div class="parallax-overlay__items">
                <figure class="parallax-overlay__item">
                    <img src="<?= wp_get_attachment_image_src($objectiu_1['image'], 'medium', false)[0]; ?>">
                    <figcaption><?= $objectiu_1['description'] ?></figcaption>
                </figure>
                <figure class="parallax-overlay__item valor2">
                    <img src="<?= wp_get_attachment_image_src($objectiu_2['image'], 'medium', false)[0]; ?>">
                    <figcaption><?php echo $objectiu_2['description'] ?></figcaption>
                </figure>
                <figure class="parallax-overlay__item valor3">
                    <img src="<?= wp_get_attachment_image_src($objectiu_3['image'], 'medium', false)[0]; ?>">
                    <figcaption><?php echo $objectiu_3['description'] ?></figcaption>
                </figure>
            </div>
            <button><a href="<?= get_page_link(get_page_by_title('El projecte')->ID); ?>">Coneix-nos</a></button>
        </div>
    </section>
</main>
<?php get_footer(); ?>
