<?php
if (!defined('ABSPATH')) {
    exit();
}

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="enterprise-network">
            <?php
            get_template_part(
                'template-parts/enterprise-network/hero',
                null,
                [
                    'section_class' =>
                        'hero relative min-h-screen bg-white overflow-hidden',
                    'container_class' =>
                        'hero-container w-full px-[5.21vw] pt-[10vw] pb-[5.21vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[6vw] sm:pt-[100px]',
                    'center_wrap_class' =>
                        'flex items-center justify-center min-h-[calc(100vh-10vw)] md:min-h-[calc(100vh-120px)]',
                    'title_lines' => [
                        get_field('hero_title_line_1') ?:
                            'Enterprise Connectivity Engineered for ',
                        get_field('hero_title_line_2') ?:
                            'Performance and Continuity.',
                    ],
                    'subtitle' =>
                        get_field('hero_subtitle_2') ?:
                        'Secure, fibre-first infrastructure designed to support complex operations, multi-site environments, and mission-critical systems across Rwanda and East Africa.',
                    'button_text' =>
                        get_field('hero_primary_button_text') ?:
                        'Request Service',
                    'button_link' =>
                        get_field('hero_primary_button_link') ?:
                        '#get-connected',
                    // No top margin in original enterprise hero; keep it.
                    'images_wrapper_class' =>
                        'enterprise-hero-images w-full mx-auto md:mt-10 sm:mt-8 flex items-end justify-center h-full gap-[1.25vw]',
                    'images' => [
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/enterprise-network/hero-image-1.png',
                            'alt' => 'Fibre connectivity',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/enterprise-network/hero-image-2.png',
                            'alt' => 'Operations and support',
                            'wrap_class' =>
                                'rounded-[1.2vw] overflow-hidden h-[15vw] w-[20vw]',
                        ],
                        [
                            'src' =>
                                get_template_directory_uri() .
                                '/src/imgs/enterprise-network/hero-image-3.png',
                            'alt' => 'Network infrastructure',
                        ],
                    ],
                ],
            );
            ?>
            <?php get_template_part('template-parts/enterprise-network/services'); ?>
            <?php get_template_part('template-parts/enterprise-network/why-choose'); ?>
            <?php get_template_part('template-parts/enterprise-network/contact'); ?>
            <?php get_template_part('template-parts/front-page/faqs'); ?>
            <?php
            get_template_part(
                'template-parts/front-page/cta',
                null,
                [
                    'title' =>
                        'Ready to Strengthen Your Network Infrastructure?',
                    'subtitle' =>
                        "If your organisation requires secure, scalable, and resilient connectivity, TrAC is ready to support your next phase of growth.",
                    'button_text' => 'Get Connected',
                    'button_link' => '#get-connected',
                    'pattern_top_class' => 'top-[-15%]',
                    // Move CTA button slightly upward for this page.
                    'button_wrapper_class' => 'mt-[5vw] md:mt-16 sm:mt-12',
                ],
            );
            ?>


        </main>

        <?php
    }
}

get_footer();
