<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="cta-section relative bg-[#eef3fc] overflow-hidden" data-section="cta">
    <div class="cta-bg-pattern absolute inset-0 w-full h-full top-[-12%]">
        <img src="<?php echo esc_url(
            get_template_directory_uri() . '/src/imgs/cta.svg',
        ); ?>" alt="" class="w-full h-full  object-bottom" loading="lazy">
    </div>

    <div class="cta-container relative z-10 w-full px-[5.21vw] py-[10.417vw] md:px-[4vw] md:py-32 sm:px-[6vw] sm:py-24 ">
        <div class="cta-content text-center max-w-[51vw] mx-auto mt-[5vw] md:max-w-full space-y-[15vw]">
            <div>
            <h2 class="cta-title font-heading text-[3.438vw] leading-[1.12] tracking-[0.01em] text-[#111] mb-[1.563vw] md:text-4xl md:mb-4 sm:text-3xl sm:mb-3" data-animate="fade-up">
                Ready to Get on TrAC?
            </h2>

            <p class="cta-subtitle font-body text-[1.25vw] leading-[1.5] text-[#1e1e1e] mb-[4.167vw] md:text-lg md:mb-10 sm:text-base sm:mb-8" data-animate="fade-up" data-delay="0.1">
                Stop paying for internet you're not getting. Join businesses across Africa that trust TrAC.
            </p>
            <div>

            <div class="cta-button-wrapper mt-[12vw]" data-animate="fade-up" data-delay="0.2">
                <a href="#get-connected" class="btn btn-primary group magnetic inline-flex">
                    <span class="btn-line"></span>
                    <span class="btn-text">Get Connected</span>
                    <span class="btn-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                            <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                            <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                            <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                            <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                            <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
