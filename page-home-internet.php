<?php
/**
 * Template Name: Home Internet
 * Description: Home Internet product page (hero + shared sections), using existing global animations.
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

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="home-internet">
            <?php
            get_template_part(
                'template-parts/enterprise-network/hero',
                null,
                [
                    'container_class' =>
                        'hero-container px-[5.21vw] py-[12vw] w-screen h-fit flex items-center flex-col gap-[2vw] relative z-[10] max-md:px-[4vw] max-md:pt-[120px] max-sm:px-[6vw] max-sm:pt-[100px]',
                    'title_lines' => [
                        get_field('hero_title_line_1') ?:
                            'Reliable, Unlimited Home Internet.',
                    ],
                    'subtitle' =>
                        get_field('hero_subtitle_2') ?:
                        'Fast, stable fibre internet with clear pricing and local support you can rely on.',
                    'button_text' =>
                        get_field('hero_primary_button_text') ?:
                        'Get Connected',
                    'button_link' =>
                        get_field('hero_primary_button_link') ?:
                        '#get-connected',
                    'images_wrapper_class' =>
                        'enterprise-hero-images w-full mx-auto mt-[2vw] max-md:mt-10 max-sm:mt-8 flex items-end justify-center h-full gap-[1.25vw]',
                    'images' => [
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/home-internet/hero-image-1.png',
                            'alt' => 'Home internet speed',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/home-internet/hero-image-2.png',
                            'alt' => 'Work and streaming',
                            'wrap_class' =>
                                'rounded-[1.2vw] overflow-hidden h-[15vw] w-[20vw]',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/home-internet/hero-image-3.png',
                            'alt' => 'Reliable coverage',
                        ],
                    ],
                ],
            );
            ?>

            <?php get_template_part('template-parts/home-internet/why-trac'); ?>
            <?php get_template_part('template-parts/home-internet/packages'); ?>
            <?php get_template_part('template-parts/home-internet/installation'); ?>

            <?php // Reuse existing sections until Home Internet-specific sections are designed. ?>
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
