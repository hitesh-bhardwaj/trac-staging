<?php
if (!defined('ABSPATH')) {
    exit();
}
?>

<section class="contact-form-section relative overflow-hidden bg-[#eef3fc] py-[7vw] md:py-20 sm:py-16" data-section="contact-form">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[104rem] mx-auto grid grid-cols-[1fr_1fr] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <!-- Left Column: Content -->
            <div class="">
                <!-- Section Label -->
                <div class="flex items-center gap-[0.729vw] mb-[2vw] md:gap-3 md:mb-8" data-animate="fade-up">
                    <span class="w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1"></span>
                    <span class="font-body text-[1.25vw] text-[#111] md:text-xl">Get in Touch</span>
                </div>

                <!-- Heading -->
                <h2 class="font-heading text-[3.646vw] font-normal leading-[1.12] tracking-[0.01em] text-[#111] mb-[1.875vw] md:text-5xl md:mb-6 sm:text-4xl" >
                    <span data-heading-anim class="block">Let's Get You</span>
                   <span data-heading-anim class="block"> Connected </span>
                </h2>

                <!-- Description -->
                <div class="font-body text-[1.25vw] leading-[1.65] text-[#1e1e1e] mb-[2vw] md:text-lg md:mb-8 sm:text-base sm:mb-6 max-w-[31.5vw] md:max-w-full">
                    <p data-para-anim class="mb-4">Tell us about your organisation and connectivity needs. Our enterprise team will be in touch to discuss a tailored solution.</p>

                    <p data-para-anim class="mb-2">Or reach us directly:</p>
                    <div class="flex flex-col gap-[0.3vw] md:gap-1">
                        <div data-para-anim class="under-multi-parent w-fit">
                            <a href="mailto:info@trac.africa" class="font-body text-[1.25vw] tracking-[0.03em] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">
                                info@trac.africa
                            </a>
                        </div>
                        <div data-para-anim class="under-multi-parent w-fit">
                            <a href="tel:+250733000190" class="font-body text-[1.25vw] tracking-[0.03em] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">
                                +250 733 000 190
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mt-[4vw] md:mt-12 sm:mt-8" data-animate="fade-up" data-delay="0.3">
                    <p  class="font-body text-[1.25vw] text-[#1e1e1e] mb-[1.5vw] md:text-lg md:mb-4 sm:text-base sm:mb-3">Social Links :</p>

                    <div class="contact-social flex items-center gap-[1.302vw] md:gap-4 sm:gap-3">
                        <!-- Facebook -->
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="Facebook">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/facebook.svg" alt="Facebook" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                        </a>

                        <!-- X (Twitter) -->
                        <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="X">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/twitter.svg" alt="X" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="Instagram">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/instagram.svg" alt="Instagram" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="LinkedIn">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/linkedin.svg" alt="LinkedIn" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Card -->
            <div class="flex justify-end md:justify-start" data-animate="fade-up" data-delay="0.25">
                <div class="contact-form-card w-full max-w-[42.708vw] md:max-w-full bg-white rounded-[2.083vw] md:rounded-3xl border-[1.5px] border-brand-primary p-[4.167vw_2.604vw] md:p-12 sm:p-6">
                    <?php
                    // Contact Form 7 shortcode - replace XXX with your actual form ID
                    // Example: echo do_shortcode('[contact-form-7 id="123" title="Contact form"]');
                    ?>
                    <div class="contact-form-wrapper">
                        <?php
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="7912219" title="Contact form 1"]');
                        } else {
                            // Fallback placeholder if CF7 is not installed
                            echo '<p class="text-center text-gray-500">Contact Form 7 plugin needs to be installed and configured.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
