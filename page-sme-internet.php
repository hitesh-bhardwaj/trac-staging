<?php
/**
 * Template Name: SME Internet
 * Description: SME Internet product page (hero + FAQs + CTA), using existing global animations.
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

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="sme-internet">
            <?php
            get_template_part(
                'template-parts/enterprise-network/hero',
                null,
                [
                    'container_class' =>
                        'hero-container px-[5.21vw] pt-[12vw] pb-[7vw] w-screen h-fit flex items-center flex-col gap-[2vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[6vw] sm:pt-[100px]',
                    'title_lines' => [
                        get_field('hero_title_line_1') ?:
                            'Reliable Business Internet That Keeps ',
                        get_field('hero_title_line_2') ?: 'You Moving',
                    ],
                    'subtitle' =>
                        get_field('hero_subtitle_2') ?:
                        'Stable, business-grade connectivity designed to keep your operations running—whether it’s payments, video calls, or cloud systems.',
                    'button_text' =>
                        get_field('hero_primary_button_text') ?:
                        'Get on TrAC',
                    'button_link' =>
                        get_field('hero_primary_button_link') ?:
                        '#get-connected',
                    'images_wrapper_class' =>
                        'enterprise-hero-images w-full mx-auto mt-[1vw] md:mt-10 sm:mt-8 flex items-end justify-center h-full gap-[1.25vw]',
                    'images' => [
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/sme-internet/hero-image-1.png',
                            'alt' => 'SME internet speed',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/sme-internet/hero-image-2.png',
                            'alt' => 'Work and collaboration',
                            'wrap_class' =>
                                'rounded-[1.2vw] overflow-hidden h-[15vw] w-[20vw]',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/sme-internet/hero-image-3.png',
                            'alt' => 'Reliable coverage',
                        ],
                    ],
                ],
            );
            ?>
            <?php get_template_part('template-parts/sme-internet/problem-statement'); ?>
            <?php get_template_part('template-parts/sme-internet/product-overview'); ?>
            <?php get_template_part('template-parts/sme-internet/plans'); ?>
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
