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
?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main
            id="main-content"
            class="site-main contact-us-page"
            data-barba="container"
            data-barba-namespace="contact-us"
        >
            <?php
            ob_start();
            ?>
            <div class="flex justify-end md:justify-start" data-hero-reveal data-hero-delay="0.22">
                <div class="contact-form-card w-full max-w-[42.708vw] rounded-[2.083vw] bg-white p-[3.5vw_2.5vw] md:max-w-full md:rounded-3xl md:p-12 sm:p-6">
                    <div class="contact-form-wrapper">
                        <?php
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="559c9b1" title="Contact form 1"]');
                        } else {
                            echo '<p class="text-center text-gray-500">Contact Form 7 plugin needs to be installed and configured.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            $contact_form_card = ob_get_clean();

            ob_start();
            ?>
            <div class="mt-[12vw] md:mt-10 sm:mt-8">
                <div class="mb-[2vw] flex flex-wrap items-center gap-x-3 gap-y-2 font-body text-24 text-white md:mb-6 md:text-lg sm:text-base">
                    <a href="mailto:sales@trac.africa" class="under-multi under-multi-white text-white transition-colors hover:text-white focus-visible:text-white">
                        sales@trac.africa
                    </a>
                    <span aria-hidden="true">|</span>
                    <a href="tel:1090" class="under-multi under-multi-white transition-colors hover:text-white focus-visible:text-white">
                        1090
                    </a>
                </div>

                <div class="flex items-center gap-[1.302vw] md:gap-4 sm:gap-3">
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="flex h-[3.125vw] w-[3.125vw] items-center justify-center rounded-full border border-white transition-colors hover:bg-white/10 md:h-12 md:w-12 sm:h-10 sm:w-10" aria-label="Facebook">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/facebook.svg'); ?>" alt="" aria-hidden="true" class="h-[2.083vw] w-[2.083vw] brightness-0 invert md:h-8 md:w-8 sm:h-6 sm:w-6">
                    </a>
                    <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="flex h-[3.125vw] w-[3.125vw] items-center justify-center rounded-full border border-white transition-colors hover:bg-white/10 md:h-12 md:w-12 sm:h-10 sm:w-10" aria-label="X">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/twitter.svg'); ?>" alt="" aria-hidden="true" class="h-[2.083vw] w-[2.083vw] brightness-0 invert md:h-8 md:w-8 sm:h-6 sm:w-6">
                    </a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="flex h-[3.125vw] w-[3.125vw] items-center justify-center rounded-full border border-white transition-colors hover:bg-white/10 md:h-12 md:w-12 sm:h-10 sm:w-10" aria-label="Instagram">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/instagram.svg'); ?>" alt="" aria-hidden="true" class="h-[2.083vw] w-[2.083vw] brightness-0 invert md:h-8 md:w-8 sm:h-6 sm:w-6">
                    </a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="flex h-[3.125vw] w-[3.125vw] items-center justify-center rounded-full border border-white transition-colors hover:bg-white/10 md:h-12 md:w-12 sm:h-10 sm:w-10" aria-label="LinkedIn">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/linkedin.svg'); ?>" alt="" aria-hidden="true" class="h-[2.083vw] w-[2.083vw] brightness-0 invert md:h-8 md:w-8 sm:h-6 sm:w-6">
                    </a>
                </div>
            </div>
            <?php
            $contact_text_footer = ob_get_clean();

            get_template_part(
                'template-parts/common/hero',
                null,
                [
                    'section_classes' =>
                        'hero relative min-h-screen overflow-hidden !bg-brand-primary',
                    'container_classes' =>
                        'hero-container relative z-[10] w-full px-[5vw]  pb-[5.21vw] md:px-[4vw] md:pt-[120px] sm:px-[8vw] sm:pt-[100px]',
                    'grid_classes' =>
                        'hero-grid flex justify-between gap-[6vw] md:flex-col md:items-start md:gap-10',
                    'text_classes' =>
                        'hero-text flex min-h-[34vw] w-[45%] flex-col md:min-h-0 md:w-full md:max-w-full',
                    'media_classes' =>
                        'hero-media w-[48%] md:w-full',
                    'title_lines' => [
                        get_field('hero_title_line_1') ?: 'Contact Us',
                    ],
                    'subtitle' =>
                        get_field('hero_description') ?:
                        'Tell us what your business needs, and our team will guide you to the right connectivity solution quickly and without complexity',
                    'subtitle_classes' =>
                        'hero-subtitle font-body text-24 font-medium w-[78%] text-white mb-0 md:w-full md:max-w-full md:text-center',
                    'text_footer' => $contact_text_footer,
                    'right_content' => $contact_form_card,
                ],
            );

            // Map Section
            get_template_part('template-parts/contact-us/map');

            // CTA Section
            get_template_part('template-parts/front-page/cta');
            ?>
        </main>

        <?php
    }
}

get_footer();
?>
