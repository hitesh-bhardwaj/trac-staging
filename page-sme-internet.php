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
            $hero_image = get_field('hero_image');
            get_template_part(
                'template-parts/common/hero',
                null,
                [
                    'title_lines' => [
                        get_field('hero_title_line_1') ?:
                            'Reliable Internet that Keeps your Business',
                        get_field('hero_title_line_2') ?: 'Running',
                    ],
                    'subtitle' =>
                        get_field('hero_subtitle_2') ?:
                        'Stable, business-grade fibre designed for daily operations, cloud systems, POS tools, and team collaboration with local support you can trust.',
                    'button_text' =>
                        get_field('hero_primary_button_text') ?:
                        'Get on TrAC',
                    'button_link' =>
                        get_field('hero_primary_button_link') ?:
                        '#get-connected',
                    'media' => [
                        'src' => is_array($hero_image)
                            ? $hero_image['url']
                            : get_template_directory_uri() .
                                '/src/imgs/sme-internet/sme-hero-banner.png',
                        'alt' => is_array($hero_image)
                            ? $hero_image['alt']
                            : 'Team collaborating over reliable business internet',
                    ],
                ],
            );
            ?>
            <!-- <?php get_template_part('template-parts/sme-internet/problem-statement'); ?> -->
            <?php get_template_part('template-parts/sme-internet/product-overview'); ?>
            <?php get_template_part('template-parts/sme-internet/plans'); ?>
            <?php get_template_part('template-parts/sme-internet/solutions-overview'); ?>
            <?php
            get_template_part(
                'template-parts/common/faqs',
                null,
                trac_get_faq_section_args(['id_prefix' => 'sme-internet-faq']),
            );
            ?>
            <?php
            get_template_part(
                'template-parts/front-page/cta',
                null,
                [
                    'title' => 'Ready to Get on TrAC?',
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
