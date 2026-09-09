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
            get_template_part('template-parts/common/hero', null, [
                'title_lines' => trac_split_lines(get_field('hero_title')),
                'subtitle' => get_field('hero_subtitle_2'),
                'button_text' => get_field('hero_primary_button_text'),
                'button_link' => get_field('hero_primary_button_link'),
                'media' => [
                    'src' => is_array($hero_image) ? $hero_image['url'] : '',
                    'alt' => is_array($hero_image) ? $hero_image['alt'] : '',
                ],
            ]);
            ?>
            <?php get_template_part(
                'template-parts/sme-internet/product-overview',
            ); ?>
            <?php get_template_part('template-parts/sme-internet/plans'); ?>
            <?php get_template_part(
                'template-parts/sme-internet/solutions-overview',
            ); ?>
            <?php get_template_part(
                'template-parts/common/faqs',
                null,
                trac_get_faq_section_args([
                    'id_prefix' => 'sme-internet-faq',
                ]),
            ); ?>
            <?php get_template_part('template-parts/common/cta', null, [
                'pattern_top_class' => 'top-[-15%]',
            ]); ?>
        </main>

        <?php
    }
}

get_footer();
