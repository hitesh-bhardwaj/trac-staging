<?php
/**
 * Template Name: Carrier Services
 * Description: Carrier Services product page.
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="carrier-services">
            <?php
            get_template_part(
                'template-parts/enterprise-network/hero',
                null,
                [
                    'container_class' =>
                        'hero-container px-[5.21vw] py-[12vw] w-screen h-fit flex items-center flex-col gap-[2vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[6vw] sm:pt-[100px]',
                    'title_lines' => [
                        get_field('hero_title_line_1') ?:
                            'Wholesale Connectivity & ',
                        get_field('hero_title_line_2') ?:
                            'Infrastructure for ISPs and Carriers',
                    ],
                    'subtitle' =>
                        get_field('hero_subtitle_2') ?:
                        'Flexible, scalable infrastructure designed for network operators at every stage, from new ISPs to established carriers expanding capacity across Rwanda and East Africa.',
                    'button_text' =>
                        get_field('hero_primary_button_text') ?:
                        'Get on TrAC',
                    'button_link' =>
                        get_field('hero_primary_button_link') ?:
                        '#get-connected',
                    'images_wrapper_class' =>
                        'enterprise-hero-images w-full mx-auto mt-0 md:mt-10 sm:mt-8 flex items-end justify-center h-full gap-[1.25vw]',
                    'images' => [
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/carrier-services/hero-img-1.png',
                            'alt' => 'Carrier services infrastructure',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/carrier-services/hero-img-2.png',
                            'alt' => 'Operations and capacity',
                            'wrap_class' =>
                                'rounded-[1.2vw] overflow-hidden h-[15vw] w-[20vw]',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/carrier-services/hero-img-3.png',
                            'alt' => 'Network reach',
                        ],
                    ],
                ],
            );
            ?>

            <?php get_template_part('template-parts/carrier-services/overview'); ?>
            <?php get_template_part('template-parts/carrier-services/infrastructure'); ?>
            <?php get_template_part('template-parts/carrier-services/offerings'); ?>
            <?php get_template_part('template-parts/carrier-services/why-choose-trac'); ?>
            <?php get_template_part('template-parts/carrier-services/contact'); ?>

            <?php get_template_part('template-parts/front-page/faqs'); ?>
            <?php
            get_template_part(
                'template-parts/front-page/cta',
                null,
                [
                    'title' => 'Ready to Get Connected?',
                    'subtitle' =>
                        "Fast, reliable home internet is just a few steps away.\nGet on TrAC today.",
                    'button_text' => 'Get Connected',
                    'button_link' => '#get-connected',
                    'pattern_top_class' => 'top-[-15%]',
                ],
            );
            ?>
        </main>

        <?php
    }
}

get_footer();
