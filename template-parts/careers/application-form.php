<?php
if (!defined('ABSPATH')) {
    exit();
}
?>

<section class="application-form-section relative overflow-hidden bg-white pb-[7vw] md:py-20 sm:py-16" data-section="application-form" id="job-application">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[104rem] mx-auto grid grid-cols-[1fr_1fr] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <!-- Left Column: Content -->
            <div class="md:pt-0">
                <!-- Section Label -->
                <div class="flex items-center gap-[0.729vw] mb-[2vw] md:gap-3 md:mb-8" data-animate="fade-up">
                    <span class="w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1"></span>
                    <span class="font-body text-[1.25vw] text-[#111] md:text-xl">Don't See Your Position?</span>
                </div>

                <!-- Heading -->
                <h2 class="font-heading text-[3.646vw] font-normal leading-[1.12] tracking-[0.01em] text-[#111] mb-[1.875vw] md:text-5xl md:mb-6 sm:text-4xl" data-animate="fade-up" data-delay="0.1">
                    Application Form.
                </h2>

                <!-- Description -->
                <div class="font-body text-[1.25vw] leading-[1.65] text-[#1e1e1e] mb-[3vw] md:text-lg md:mb-10 sm:text-base sm:mb-8 max-w-[31.5vw] md:max-w-full" data-animate="fade-up" data-delay="0.2">
                    <p class="mb-6">Send us your details and CV and we'll be in touch when the right opportunity comes up.</p>

                    <p class="mb-6">All applications are reviewed by our team. We aim to respond within 5-7 working days.</p>

                    <p class="mb-2">For questions, reach us at:</p>
                    <div class="flex flex-col gap-[0.3vw] md:gap-1">
                        <div class="under-multi-parent w-fit">
                            <a href="mailto:careers@trac.africa" class="font-body text-[1.25vw] tracking-[0.03em] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">
                                careers@trac.africa
                            </a>
                        </div>
                        <div class="under-multi-parent w-fit">
                            <a href="tel:+250733000190" class="font-body text-[1.25vw] tracking-[0.03em] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">
                                +250 733 000 190
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Card -->
            <div class="flex justify-end md:justify-start" data-animate="fade-up" data-delay="0.25">
                <div class="application-form-card w-full max-w-[42.708vw] md:max-w-full bg-white rounded-[2.083vw] md:rounded-3xl border-[1.5px] border-brand-primary p-[4.167vw_2.604vw] md:p-12 sm:p-6">
                    <div class="application-form-wrapper contact-form-wrapper">
                        <?php
                        // Contact Form 7 for job applications
                        // You'll need to create this form in WordPress admin
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="bce66aa" title="Contact us form"]');
                        } else {
                            echo '<p class="text-center text-gray-500">Contact Form 7 plugin needs to be installed and configured.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
