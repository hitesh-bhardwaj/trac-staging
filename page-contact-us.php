<?php
/**
 * Template Name: Contact Us
 * Description: Page template for Contact Us
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();
?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main
            id="main-content"
            class="site-main contact-us-page"
            data-barba="container"
            data-barba-namespace="contact-us"
        >
            <?php
            get_template_part(
                'template-parts/connecting-communities/hero',
                null,
                [
                    'hero_title' => 'Contact Us',
                    'hero_subtitle' =>
                        '',
                    'hero_description' => 'Tell us what your business needs, and our team will guide you to the right connectivity solution quickly and without complexity',
                    'hero_image_url' =>
                        get_template_directory_uri() .
                        '/src/imgs/contact-us-hero.jpg',
                    'hero_image_alt' =>
                        'TrAC team connecting over a shared digital experience',
                ],
            );

            // Contact Form Section
            get_template_part('template-parts/contact-us/contact-form');

            // Map Section
            get_template_part('template-parts/contact-us/map');

            // CTA Section
            get_template_part('template-parts/front-page/cta');
            ?>
        </main>

        <?php
    }
}

get_footer();
?>
