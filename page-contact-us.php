<?php
/**
 * Template Name: Contact Us
 * Description: Page template for Contact Us
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();

$contact_form_css =
    get_template_directory_uri() . '/src/css/sections/contact-form.css';
?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main
            id="main-content"
            class="site-main contact-us-page"
            data-barba="container"
            data-barba-namespace="contact-us"
        >
            <link rel="stylesheet" href="<?php echo esc_url(
                $contact_form_css,
            ); ?>">

            <?php
            $contact_email = get_field('contact_email');
            $contact_phone = get_field('contact_phone');
            $contact_social = [
                'facebook' => get_field('contact_social_facebook'),
                'twitter' => get_field('contact_social_twitter'),
                'instagram' => get_field('contact_social_instagram'),
                'linkedin' => get_field('contact_social_linkedin'),
            ];
            $contact_social_icons = [
                'facebook' => [
                    'icon' => get_field('contact_social_facebook_icon'),
                    'label' => 'Facebook',
                ],
                'twitter' => [
                    'icon' => get_field('contact_social_twitter_icon'),
                    'label' => 'X',
                ],
                'instagram' => [
                    'icon' => get_field('contact_social_instagram_icon'),
                    'label' => 'Instagram',
                ],
                'linkedin' => [
                    'icon' => get_field('contact_social_linkedin_icon'),
                    'label' => 'LinkedIn',
                ],
            ];
            ?>
            <?php ob_start(); ?>
            <div class="contact-hero-form flex justify-end md:justify-start lg:order-3 lg:mb-[22px] lg:mt-[18px]" data-hero-reveal data-hero-delay="0.22">
                <div class="contact-form-card w-full max-w-[42.7vw] rounded-[2vw] bg-white p-[3.5vw_2.5vw] md:max-w-full md:rounded-3xl md:p-12 sm:p-6">
                    <div class="contact-form-wrapper">
                        <?php if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode(
                                '[contact-form-7 id="559c9b1" title="Contact form"]',
                            );
                        } else {
                            echo '<p class="text-center text-gray-500">Contact Form 7 plugin needs to be installed and configured.</p>';
                        } ?>
                    </div>
                </div>
            </div>
            <?php
            $contact_form_card = ob_get_clean();

            ob_start();
            ?>
            <div class="contact-hero-details mt-[12vw] md:mt-10 sm:mt-8 lg:order-4 lg:mt-0 lg:w-full lg:pb-[22px] lg:pt-1">
                <div class="mb-[2vw] flex flex-wrap items-center gap-x-3 gap-y-2 font-body text-24 text-white md:mb-6 ">
                    <?php if ($contact_email): ?>
                        <a href="mailto:<?php echo esc_attr(
                            $contact_email,
                        ); ?>" class="under-multi under-multi-white text-white transition-colors hover:text-white focus-visible:text-white">
                            <?php echo trac_esc_html($contact_email); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($contact_email && $contact_phone): ?>
                        <span aria-hidden="true">|</span>
                    <?php endif; ?>
                    <?php if ($contact_phone): ?>
                        <a href="tel:<?php echo esc_attr(
                            preg_replace('/[^0-9+]/', '', $contact_phone),
                        ); ?>" class="under-multi under-multi-white transition-colors hover:text-white focus-visible:text-white">
                            <?php echo trac_esc_html($contact_phone); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="flex items-center gap-[1.3vw] md:gap-4 lg:gap-[18px] sm:gap-3">
                    <?php foreach ($contact_social as $key => $url): ?>
                        <?php if ($url): ?>
                            <a href="<?php echo esc_url(
                                $url,
                            ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-orange flex h-[3.1vw] w-[3.1vw] items-center justify-center rounded-full border border-white transition-colors  lg:h-14 lg:w-14 md:h-12 md:w-12 sm:h-10 sm:w-10 group" aria-label="<?php echo esc_attr(
                                $contact_social_icons[$key]['label'],
                            ); ?>">
                                <img src="<?php echo esc_url(
                                    $contact_social_icons[$key]['icon'],
                                ); ?>" alt="social icon" aria-hidden="true" class="h-[2vw] w-[2vw] brightness-0 invert lg:h-8 lg:w-8 sm:h-6 sm:w-6">
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            $contact_text_footer = ob_get_clean();

            get_template_part('template-parts/common/hero', null, [
                'section_classes' =>
                    'hero relative min-h-screen overflow-hidden !bg-brand-primary',
                'container_classes' =>
                    'hero-container relative z-[10] w-full px-[5vw] pb-[5.2vw]  md:px-[7vw] md:pt-[14vw]',
                'grid_classes' =>
                    'contact-hero-grid hero-grid flex justify-between gap-[6vw] lg:flex-col lg:items-start lg:gap-7',
                'text_classes' =>
                    'contact-hero-text hero-text flex min-h-[34vw] w-[45%] flex-col lg:contents lg:min-h-0 lg:w-full lg:max-w-full',
                'media_classes' => 'contact-hero-media hero-media w-[48%] lg:order-3 lg:w-full',
                'text_footer_wrapper_classes' => 'lg:order-4 lg:w-full',
                'title_lines' => [get_field('hero_title_line_1')],
                'title_classes' =>
                    'hero-title text-[4vw] font-heading text-white tracking-[0vw] mb-6 md:mb-6 sm:mb-4 lg:order-1 lg:w-full',
                'subtitle' => get_field('hero_description'),
                'subtitle_classes' =>
                    'hero-subtitle font-body text-24 font-medium w-[78%] text-white mb-0 lg:order-2 lg:w-full lg:max-w-full',
                'text_footer' => $contact_text_footer,
                'right_content' => $contact_form_card,
            ]);

            // Map Section
            get_template_part('template-parts/contact-us/map');

            // CTA Section
            get_template_part('template-parts/common/cta');
            ?>
        </main>

        <?php
    }
}

get_footer();


?>
