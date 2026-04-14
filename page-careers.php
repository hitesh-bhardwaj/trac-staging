<?php
/**
 * Template Name: Careers
 * Description: Page template for Careers
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
            class="site-main careers-page"
            data-barba="container"
            data-barba-namespace="careers"
        >
            <?php
            // Hero Section
            get_template_part(
                'template-parts/connecting-communities/hero',
                null,
                [
                    'hero_title' => 'Build What Connects Africa',
                    'hero_subtitle' => '',
                    'hero_description' => 'At TrAC, we build the infrastructure that keeps people, businesses, and communities moving.',
                    'hero_image_url' =>
                        get_template_directory_uri() .
                        '/src/imgs/careers-hero.png',
                    'hero_image_alt' =>
                        'TrAC team member in modern office workspace',
                ],
            );

            // Why Work With Us Section
            get_template_part('template-parts/careers/why-work');

            // Open Positions Section
            get_template_part('template-parts/careers/open-positions');

            // Job Application Form Section
            get_template_part('template-parts/careers/application-form');

            // CTA Section
            get_template_part('template-parts/front-page/cta');
            ?>
        </main>

        <?php
    }
}

get_footer();
?>
