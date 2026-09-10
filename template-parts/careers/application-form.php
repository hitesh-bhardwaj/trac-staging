<?php
if (!defined('ABSPATH')) {
    exit();
}

$application_label = get_field('careers_application_label');
$application_title = get_field('careers_application_title');
$contact_form_css =
    get_template_directory_uri() . '/src/css/sections/contact-form.css';
?>

<link rel="stylesheet" href="<?php echo esc_url($contact_form_css); ?>">

<section class="application-form-section relative bg-brand-tint md:py-20 sm:py-16" data-section="application-form" id="job-application">
    <div class="w-full px-[5vw] md:px-[7vw] py-[7vw]">
        <div class="max-w-[104rem] mx-auto grid grid-cols-[1fr_1fr] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <!-- Left Column: Content -->
            <div class="md:pt-0">
                <!-- Section Label -->
                <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body  text-brand-secondary text-30 sm:text-[4vw]"><?php echo trac_esc_html(
                    $application_label,
                ); ?></span>
            </div>

                <!-- Heading -->
                <h2 class="font-heading text-66 font-normal leading-[1.3] tracking-[0.01em] text-text-primary mb-[1.8vw] md:mb-6" data-heading-anim>
                    <?php echo trac_esc_html($application_title); ?>
                </h2>

                
            </div>
            <!-- Right Column: Form Card -->
            <div class="flex justify-end md:justify-start" data-animate="fade-up" data-delay="0.25">
                <div class="application-form-card w-full max-w-[42.7vw] md:max-w-full bg-white rounded-[2vw] md:rounded-3xl border-[1.5px] border-brand-primary p-[4.1vw_2.6vw] md:p-12 sm:p-6">
                    <div class="application-form-wrapper contact-form-wrapper">
                        <?php // Contact Form 7 for job applications

if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode(
                                '[contact-form-7 id="2fd89c6" title="Job Application Form"]',
                            );
                        } else {
                            echo '<p class="text-center text-gray-500">Contact Form 7 plugin needs to be installed and configured.</p>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
