<?php
if (!defined('ABSPATH')) {
    exit();
}
?>

<section class="application-form-section relative overflow-hidden bg-[#EEF3FC] md:py-20 sm:py-16" data-section="application-form" id="job-application">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw] py-[7vw]">
        <div class="max-w-[104rem] mx-auto grid grid-cols-[1fr_1fr] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <!-- Left Column: Content -->
            <div class="md:pt-0">
                <!-- Section Label -->
                <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-[#E86224]"></span>
                <span class="font-body  text-[#E86224] text-30">Don't See Your Position?</span>
            </div>

                <!-- Heading -->
                <h2 class="font-heading text-[3.646vw] font-normal leading-[1.12] tracking-[0.01em] text-[#111] mb-[1.875vw] md:text-5xl md:mb-6 sm:text-4xl" data-heading-anim>
                    Application Form.
                </h2>

                
            </div>
            <!-- Right Column: Form Card -->
            <div class="flex justify-end md:justify-start" data-animate="fade-up" data-delay="0.25">
                <div class="application-form-card w-full max-w-[42.708vw] md:max-w-full bg-white rounded-[2.083vw] md:rounded-3xl border-[1.5px] border-brand-primary p-[4.167vw_2.604vw] md:p-12 sm:p-6">
                    <div class="application-form-wrapper contact-form-wrapper">
                        <?php
                        // Contact Form 7 for job applications
                        // You'll need to create this form in WordPress admin
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="7912219" title="Job Application Form"]');
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
