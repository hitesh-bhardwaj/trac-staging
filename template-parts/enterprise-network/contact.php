<?php
if (!defined('ABSPATH')) {
    exit();
}

$enterprise_contact_label = get_field('enterprise_contact_label');
$enterprise_contact_title_lines = trac_split_lines(
    get_field('enterprise_contact_title'),
);
$enterprise_contact_description = get_field('enterprise_contact_description');
$enterprise_contact_prompt_text = get_field('enterprise_contact_prompt_text');
$enterprise_contact_email = get_field('enterprise_contact_email');
$contact_form_css =
    get_template_directory_uri() . '/src/css/sections/contact-form.css';
?>

<link rel="stylesheet" href="<?php echo esc_url($contact_form_css); ?>">

<section id="get-in-touch" class="enterprise-contact relative overflow-hidden bg-white pt-[10vw] pb-[5vw] md:py-20 sm:py-16" data-section="enterprise-contact">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw] flex items-start justify-between ">
        <div class=" max-w-[104rem] mx-auto grid grid-cols-[1fr_1fr] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <div class="pt-[0.5vw] md:pt-0">
                <div class="flex items-center gap-[0.729vw] mb-[2vw] md:gap-3 md:mb-8" data-animate="fade-up">
                    <span class="w-[1.5vw] h-[0.2vw] bg-brand-secondary md:w-6 md:h-1"></span>
                    <span class="font-body text-30 text-brand-secondary md:text-xl"><?php echo trac_esc_html(
                        $enterprise_contact_label,
                    ); ?></span>
                </div>

                <h2 class="font-heading text-66 font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[1.875vw] md:text-5xl md:mb-6 sm:text-4xl" >
                    <?php foreach ($enterprise_contact_title_lines as $line): ?>
                        <span data-heading-anim class="block"><?php echo trac_esc_html(
                            $line,
                        ); ?></span>
                    <?php endforeach; ?>
                </h2>

                <p class="font-body text-24 leading-[1.58] text-text-body mb-[3.5vw] md:text-lg md:mb-10 sm:text-base sm:mb-8 max-w-[30vw] md:max-w-full" data-para-anim data-delay="0.2">
                    <?php echo trac_esc_html($enterprise_contact_description); ?>
                </p>

                <div class="font-body text-24 leading-[1.7] text-text-primary ">
                    <p data-para-anim class="mb-3 md:mb-2"><?php echo trac_esc_html(
                        $enterprise_contact_prompt_text,
                    ); ?></p>
                    <div data-animate="fade-up" class="under-multi-parent w-fit leading-[1.2]">
                        <a href="mailto:<?php echo esc_attr(
                            $enterprise_contact_email,
                        ); ?>" class="under-multi font-body text-24 tracking-[0.03em] text-text-body transition-colors hover:text-brand-primary focus-visible:text-brand-primary  ">
                            <?php echo trac_esc_html($enterprise_contact_email); ?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex justify-end md:justify-start" data-animate="fade-up" data-delay="0.25">
                <div class="contact-form-card w-full max-w-[42.708vw] md:max-w-full bg-white rounded-[2vw] md:rounded-3xl border-[1.5px] border-brand-primary p-[4.167vw_2.604vw] md:p-12 sm:p-6">
                    <div class="contact-form-wrapper">
                        <?php if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode(
                                '[contact-form-7 id="d7d2441" title="Enterprise Network Contact Form"]',
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
