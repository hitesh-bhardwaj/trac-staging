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
                'title_lines' => [
                    get_field('hero_title_line_1') ?:
                    'Reliable Internet that Keeps your Business',
                    get_field('hero_title_line_2') ?: 'Running',
                ],
                'subtitle' =>
                    get_field('hero_subtitle_2') ?:
                    'Stable, business-grade fibre designed for daily operations, cloud systems, POS tools, and team collaboration with local support you can trust.',
                'button_text' =>
                    get_field('hero_primary_button_text') ?: 'Get on TrAC',
                'button_link' =>
                    get_field('hero_primary_button_link') ?: '#get-connected',
                'media' => [
                    'src' => is_array($hero_image)
                        ? $hero_image['url']
                        : get_template_directory_uri() .
                            '/src/imgs/sme-internet/sme-hero-banner.png',
                    'alt' => is_array($hero_image)
                        ? $hero_image['alt']
                        : 'Team collaborating over reliable business internet',
                ],
            ]);
            ?>
            <!-- <?php get_template_part(
                'template-parts/sme-internet/problem-statement',
            ); ?> -->
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
                    'fallback_faqs' => [
                        [
                            'question' =>
                                'What is the difference between home and SME internet?',
                            'answer' =>
                                'While both deliver reliable connectivity, SME services are designed for business continuity, supporting office operations, multiple users, and future growth with more structured support and scalability.',
                        ],
                        [
                            'question' =>
                                'Which Internet package is right for my business?',
                            'answer' =>
                                'TrAC offers SME connectivity solutions designed for businesses of different sizes and requirements. Our team can help you select the package that best matches your usage, team size, and operational needs.',
                        ],
                        [
                            'question' =>
                                'Can I upgrade my service as my business grows?',
                            'answer' =>
                                'Yes. Our solutions are designed to grow alongside your business, making it easy to increase capacity as your requirements evolve.',
                        ],
                        [
                            'question' =>
                                'Can TrAC support businesses that rely on cloud applications and video meetings?',
                            'answer' =>
                                'Yes. Our SME solutions are designed to support modern business tools, including cloud platforms, video conferencing, digital payments, and collaborative applications.',
                        ],
                        [
                            'question' =>
                                'Can TrAC help with office Wi-Fi, not just the internet line?',
                            'answer' =>
                                'Yes. TrAC can design and implement internal Wi-Fi solutions tailored to your workplace based on a site survey and your coverage needs.',
                        ],
                        [
                            'question' =>
                                'Does TrAC offer Cloud services for SMEs?',
                            'answer' =>
                                'Yes. Our Cloud services give growing businesses a secure and scalable environment for hosting applications, storing data, and supporting digital operations without investing in additional infrastructure.',
                        ],
                        [
                            'question' =>
                                'Does TrAC offer Data Centre services?',
                            'answer' =>
                                'Yes. Businesses can host critical systems and data within our secure Tier III Data Centre environment, helping improve reliability and business continuity.',
                        ],
                        [
                            'question' =>
                                'Can TrAC connect multiple office locations?',
                            'answer' =>
                                'Yes. Our private network solutions allow businesses to securely connect multiple locations and share information across sites.',
                        ],
                    ],
                ]),
            ); ?>
            <?php get_template_part('template-parts/common/cta', null, [
                'title' => 'Ready to Get on TrAC?',
                'subtitle' =>
                    "Fast, reliable home internet is just a few steps away.\nGet on TrAC today.",
                'button_text' => 'Get Connected',
                'button_link' => '#get-connected',
                'pattern_top_class' => 'top-[-15%]',
            ]); ?>
        </main>

        <?php
    }
}

get_footer();
