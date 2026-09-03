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
	            $hero_image = get_field('hero_image');
	            $title_lines = [
	                get_field('hero_title_line_1')
	                    ?: 'Enterprise Connectivity Engineered for',
	                get_field('hero_title_line_2') ?: 'Performance and Continuity',
	            ];
	            $subtitle =
	                get_field('hero_subtitle_2') ?:
	                'Secure, fibre-first infrastructure designed to support complex operations, multi-site environments, and mission-critical systems across Rwanda and East Africa.';
	            $button_text =
	                get_field('hero_primary_button_text') ?:
	                'Request a Consultation';
	            $button_link =
	                get_field('hero_primary_button_link') ?: '#get-connected';

	            get_template_part(
	                'template-parts/common/hero',
	                null,
	                [
	                    'grid_classes' =>
	                        'hero-grid flex items-start justify-between gap-[5vw] md:flex-col md:gap-8 ',
	                    'title_lines' => $title_lines,
	                    'subtitle' => $subtitle,
	                    'primary' => [
	                        'text' => $button_text,
	                        'link' => $button_link,
	                    ],
	                    'media' => [
	                        'src' => is_array($hero_image)
	                            ? $hero_image['url']
	                            : get_template_directory_uri() .
	                                '/src/imgs/enterprise-network/enterprise-network-hero.png',
	                        'alt' => is_array($hero_image)
	                            ? $hero_image['alt']
	                            : 'Enterprise connectivity',
	                    ],
	                ],
	            );
	            ?>
            <?php get_template_part('template-parts/enterprise-network/services'); ?>
            <?php get_template_part('template-parts/enterprise-network/why-choose'); ?>
            <?php get_template_part('template-parts/enterprise-network/contact'); ?>
            <?php
            get_template_part(
                'template-parts/common/faqs',
                null,
                trac_get_faq_section_args(['id_prefix' => 'enterprise-network-faq']),
            );
            ?>
            <?php
            get_template_part(
                'template-parts/front-page/cta',
                null,
                [
                    'title' =>
                        'Ready to Get on TrAC?',
                    'subtitle' =>
                        "",
                    'button_text' => 'Get Connected',
                    'button_link' => '#get-connected',
                    'pattern_top_class' => 'top-[-15%]',
                    // Move CTA button slightly upward for this page.
                    'button_wrapper_class' => '',
                ],
            );
            ?>


        </main>

        <?php
    }
}

get_footer();
