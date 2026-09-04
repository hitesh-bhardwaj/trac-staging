<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section id="get-in-touch" class="enterprise-contact relative overflow-hidden bg-white pt-[10vw] pb-[5vw] md:py-20 sm:py-16" data-section="enterprise-contact">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw] flex items-start justify-between ">
        <div class=" max-w-[104rem] mx-auto grid grid-cols-[1fr_1fr] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <div class="pt-[0.5vw] md:pt-0">
                <div class="flex items-center gap-[0.729vw] mb-[2vw] md:gap-3 md:mb-8" data-animate="fade-up">
                    <span class="w-[1.5vw] h-[0.2vw] bg-brand-secondary md:w-6 md:h-1"></span>
                    <span class="font-body text-30 text-brand-secondary md:text-xl">Get in Touch</span>
                </div>

                <h2 class="font-heading text-66 font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[1.875vw] md:text-5xl md:mb-6 sm:text-4xl" >
                    <span data-heading-anim class="block">Ready to Strengthen Your  </span>
                     <span data-heading-anim class="block"> Network Infrastructure?</span>
                </h2>

                <p class="font-body text-24 leading-[1.58] text-text-body mb-[3.5vw] md:text-lg md:mb-10 sm:text-base sm:mb-8 max-w-[30vw] md:max-w-full" data-para-anim data-delay="0.2">
                    If your organisation requires secure, scalable, and resilient connectivity, TrAC is ready to support your next phase of growth.
                </p>

                <div class="font-body text-24 leading-[1.7] text-text-primary md:text-base sm:text-sm">
                    <p data-para-anim class="mb-3 md:mb-2">Or contact our enterprise team at:</p>
                    <div data-animate="fade-up" class="under-multi-parent w-fit leading-[1.2]">
                        <a href="mailto:sales@trac.africa" class="under-multi font-body text-24 tracking-[0.03em] text-text-body transition-colors hover:text-brand-primary focus-visible:text-brand-primary md:text-base sm:text-sm ">
                            sales@trac.africa
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
