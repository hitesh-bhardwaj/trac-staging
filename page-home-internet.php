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
            $hero_image = get_field('hero_image');
            get_template_part('template-parts/common/hero', null, [
                'title_lines' => [
                    get_field('hero_title_line_1') ?:
                    'Reliable, Unlimited Home Internet',
                ],
                'subtitle' =>
                    get_field('hero_subtitle_2') ?:
                    'Fast, stable fibre internet build for streaming, learning, working from home to help you stay connected to your work, your family, and your community.',
                'button_text' =>
                    get_field('hero_primary_button_text') ?: 'Get Connected',
                'button_link' =>
                    get_field('hero_primary_button_link') ?: home_url('/contact-us'),
                'media' => [
                    'src' => is_array($hero_image)
                        ? $hero_image['url']
                        : get_template_directory_uri() .
                            '/src/imgs/home-internet/home-internet-hero-banner.png',
                    'alt' => is_array($hero_image)
                        ? $hero_image['alt']
                        : 'Home internet',
                ],
            ]);
            ?>

            <?php get_template_part(
                'template-parts/home-internet/why-trac-overview',
            ); ?>
            <?php get_template_part('template-parts/home-internet/plans'); ?>
            <?php get_template_part(
                'template-parts/common/faqs',
                null,
                trac_get_faq_section_args([
                    'id_prefix' => 'home-internet-faq',
                    'fallback_faqs' => [
                        [
                            'question' =>
                                'What kind of home internet does TrAC offer?',
                            'answer' =>
                                'TrAC offers both fibre and wireless home Internet, ensuring you receive the best connection available in your area. Fibre delivers high-speed performance where available, while wireless provides reliable connectivity where fibre has not yet reached. Whichever option you choose, you can count on a stable connection designed for streaming, working, learning, and staying connected every day. Check our plans and contact us to see what is available in your area.',
                        ],
                        [
                            'question' =>
                                'How do I know if TrAC is available at my address?',
                            'answer' =>
                                'Simply contact our team or submit an enquiry online. We will confirm serviceability, the best access method for your location, and the next steps for installation.',
                        ],
                        [
                            'question' =>
                                'Why should I switch from mobile data to home internet?',
                            'answer' =>
                                'If you regularly stream, work online, or have multiple devices connected, home internet gives you a faster, more stable connection than mobile data, so you can stay connected without interruptions or unexpected usage limits.',
                        ],
                        [
                            'question' => 'Will weather affect my connection?',
                            'answer' =>
                                'TrAC designs home connections for stable day-to-day performance. Our technology is weather-resistant, so rain will not affect the stability or speed of your connection.',
                        ],
                        [
                            'question' => 'How long does installation take?',
                            'answer' =>
                                'Once serviceability is confirmed and payment is completed, installation is typically scheduled within 48 hours at a time that suits you.',
                        ],
                        [
                            'question' => 'How do I pay or renew my service?',
                            'answer' =>
                                'TrAC sends a renewal reminder before the expiry date, including the due date. Please ensure payment is made on time to avoid any service disruptions. Payments should always include the right customer or invoice reference so they can be matched quickly.',
                        ],
                        [
                            'question' => 'Can I change my package later?',
                            'answer' =>
                                "Yes. If your needs change, TrAC can help you switch to a package that better fits your household's service use.",
                        ],
                        [
                            'question' =>
                                'What should I do if my connection is not working?',
                            'answer' =>
                                "First, check that your router or ONU is powered on and that the indicator lights appear normal. If the device is not powering on, try plugging it into a different socket.<br><br>Please avoid restarting the device before contacting support, as this may remove information that helps us identify the cause of the issue.<br><br>If you're still experiencing problems, get in touch with our support team and we'll assist you with the next steps.",
                        ],
                    ],
                ]),
            ); ?>
            <?php get_template_part('template-parts/common/cta', null, [
                'title' => 'Ready to Get Connected?',
                'subtitle' =>
                    "Fast, reliable home internet is just a few steps away.\nGet on TrAC today.",
                'button_text' => 'Get Connected',
                'button_link' => home_url('/contact-us'),
                'pattern_top_class' => 'top-[-15%]',
            ]); ?>
        </main>

        <?php
    }
}

get_footer();
