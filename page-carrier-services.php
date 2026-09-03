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
            $hero_image = get_field('hero_image');
            get_template_part('template-parts/common/hero', null, [
                'title_lines' => [
                    get_field('hero_title_line_1') ?: 'The Backbone Behind',
                    get_field('hero_title_line_2') ?: 'your Networks',
                ],
                'subtitle' =>
                    get_field('hero_subtitle_2') ?:
                    'Secure, high-performance infrastructure for network operators, supporting enterprise and wholesale connectivity across Rwanda and East Africa.',
                'button_text' =>
                    get_field('hero_primary_button_text') ?: 'Get on TrAC',
                'button_link' =>
                    get_field('hero_primary_button_link') ?: '#get-connected',
                'media' => [
                    'src' => is_array($hero_image)
                        ? $hero_image['url']
                        : get_template_directory_uri() .
                            '/src/imgs/carrier-services/carriers-hero-banner.png',
                    'alt' => is_array($hero_image)
                        ? $hero_image['alt']
                        : 'Carrier services infrastructure',
                ],
            ]);
            ?>

            <?php get_template_part(
                'template-parts/carrier-services/overview',
            ); ?>
            <?php get_template_part(
                'template-parts/carrier-services/infrastructure',
            ); ?>
            <?php get_template_part(
                'template-parts/carrier-services/why-choose-trac',
            ); ?>
            <!-- <?php get_template_part(
                'template-parts/carrier-services/offerings',
            ); ?> -->
            <?php get_template_part(
                'template-parts/carrier-services/contact',
            ); ?>

            <?php get_template_part(
                'template-parts/common/faqs',
                null,
                trac_get_faq_section_args([
                    'id_prefix' => 'carrier-services-faq',
                    'fallback_faqs' => [
                        [
                            'question' =>
                                'What Wholesale services does TrAC provide?',
                            'answer' =>
                                'TrAC provides carrier-grade Internet, national and international data transport, and network infrastructure services that enable operators, service providers, and enterprises to expand their reach and capabilities.',
                        ],
                        [
                            'question' =>
                                'Can TrAC support Internet service providers?',
                            'answer' =>
                                'Yes. If you hold an Internet service licence, TrAC provides the infrastructure needed to deliver white-label, business-grade Internet services without building your own network.',
                        ],
                        [
                            'question' =>
                                'Does TrAC provide national and international data transport?',
                            'answer' =>
                                'Yes. Our network supports reliable data transport within Rwanda and across regional and international routes, helping customers connect locations, networks, and services.',
                        ],
                        [
                            'question' =>
                                'Can services be offered under my own brand?',
                            'answer' =>
                                "Yes. Wholesale customers can deliver TrAC's connectivity and hosting services under their own brand, supported by our infrastructure and technical expertise.",
                        ],
                        [
                            'question' =>
                                'Does TrAC offer Cloud Hosting for wholesale customers?',
                            'answer' =>
                                'Yes. Our white-label Cloud services allow providers to expand their offerings without the cost and complexity of building their own Cloud infrastructure.',
                        ],
                        [
                            'question' =>
                                'Does TrAC offer Data Centre Hosting?',
                            'answer' =>
                                'Yes. Wholesale customers can leverage our Tier III Data Centre facilities to host infrastructure, applications, and customer services in a secure and scalable environment.',
                        ],
                        [
                            'question' =>
                                'Is TrAC only for large carriers or established operators?',
                            'answer' =>
                                "No. TrAC's own site already positions the offer for multinational carriers, national ISPs, smaller regional providers, and newer operators. TrAC scales to fit – regardless of where you are in your growth.",
                        ],
                        [
                            'question' =>
                                'Can TrAC help a new ISP get started?',
                            'answer' =>
                                'Yes. If you hold an Internet service licence, TrAC provides the infrastructure and support needed to deliver white-label, business-grade Internet services without the cost and complexity of building your own network.',
                        ],
                        [
                            'question' =>
                                'Can services be sold under our own brand?',
                            'answer' =>
                                "Yes. Wholesale customers can offer TrAC's Internet, hosting, and network services under their own brand. Our infrastructure and support teams operate behind the scenes, enabling you to deliver reliable services without having to build and manage the network yourself.",
                        ],
                    ],
                ]),
            ); ?>
            <?php get_template_part('template-parts/common/cta', null, [
                'title' => 'Ready to Get Connected?',
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
