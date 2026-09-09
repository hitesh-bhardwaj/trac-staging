<?php
if (!defined('ABSPATH')) {
    exit();
}

$cs_contact_label = get_field('cs_contact_label');
$cs_contact_title = get_field('cs_contact_title');
$cs_contact_description = get_field('cs_contact_description');
$cs_contact_email = get_field('cs_contact_email');
$contact_form_css =
    get_template_directory_uri() . '/src/css/sections/contact-form.css';
?>

<link rel="stylesheet" href="<?php echo esc_url($contact_form_css); ?>">

<section id="get-in-touch" class="carrier-contact relative overflow-hidden bg-white py-[7vw] md:py-20 sm:py-16" data-section="carrier-contact">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[104rem] mx-auto grid grid-cols-[1fr_1fr] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <div class="pt-[0.5vw] md:pt-0">
                 <div class="flex items-center justify-start gap-3 mb-10 md:mb-6" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body text-brand-secondary text-30 sm:!text-[4vw]"><?php echo trac_esc_html(
                    $cs_contact_label,
                ); ?></span>
            </div>

                <h2 class="font-heading text-66 font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[1.875vw] md:text-5xl md:mb-6 sm:text-4xl" data-heading-anim>
                    <?php echo trac_esc_html($cs_contact_title); ?>
                </h2>

                <p class="font-body text-24 leading-[1.58] text-text-body mb-[0.5vw] md:text-lg md:mb-10 sm:text-base sm:mb-8 max-w-[30vw] md:max-w-full" data-para-anim data-delay="0.2">
                    <?php echo trac_esc_html($cs_contact_description); ?>
                </p>

                <div class="font-body text-24 leading-[1.7] text-text-primary ">
                            <div data-para-anim class="under-multi-parent w-fit leading-[1.2]">
                                <a href="mailto:<?php echo esc_attr(
                                    $cs_contact_email,
                                ); ?>" class="font-body text-24 tracking-[0.03em] text-text-body hover:text-brand-primary transition-colors  under-multi">
                                    <?php echo trac_esc_html($cs_contact_email); ?>
                                </a>
                        </div>
                </div>
            </div>

            <div class="flex justify-end md:justify-start" data-animate="fade-up" data-delay="0.25">
                <div data-animate="fade-up"
                data-delay="0.2" class="contact-form-card w-full max-w-[42.708vw] md:max-w-full bg-white rounded-[2vw] md:rounded-3xl border-[1.5px] border-brand-primary p-[4.167vw_2.604vw] md:p-12 sm:p-6">
                    <div  class="contact-form-wrapper">
                        <?php if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode(
                                '[contact-form-7 id="8986a0d" title="Carrier Services Contact Form"]',
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
