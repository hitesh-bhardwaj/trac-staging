<?php
if (!defined("ABSPATH")) {
    exit();
}

$page_title = get_the_title() ?: __("About Us", "trac");
$page_excerpt = has_excerpt()
    ? get_the_excerpt()
    : __(
        "We build connectivity experiences that help organizations move faster, operate with confidence, and reach more people.",
        "trac"
    );
?>

<section class="about-hero relative overflow-hidden" data-section="about-hero" data-hero-static>
    <div class="w-screen h-screen flex items-center flex-col gap-[2vw] pt-[12vw]">
        <h1 class="hero-title font-heading text-text-primary tracking-[0.05vw] mb-[1.667vw] md:mb-6 sm:mb-4 relative z-[10]" data-hero-reveal data-heading-anim data-base-delay="0.05">
            <span class="block hero-title-line">About Us</span>
        </h1>

        <p class="hero-subtitle font-body font-medium text-text-body w-[50%] mb-[3.125vw] md:max-w-full md:mb-8 sm:mb-6 text-center relative z-[10]" data-hero-reveal data-hero-delay="0.08" data-para-anim>
            Rooted in Rwanda and expanding across East Africa, TrAC delivers reliable, fibre-first connectivity for homes, businesses, and the communities shaping the region's future.
        </p>

        <div class="hero-cta flex flex-wrap gap-[1.042vw] md:gap-4 sm:flex-col sm:gap-3 relative z-[10]" data-hero-reveal data-hero-delay="0.16">
            <a href="#get-connected" class="btn btn-primary group magnetic">
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

            <a href="#products" class="btn btn-outline group magnetic">
                <span class="btn-line"></span>
                <span class="btn-text">Explore Solutions</span>
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
        <div>

        <canvas data-hero-reveal data-hero-delay="0.20" class="network-canvas-el absolute inset-0 h-full w-full"></canvas>
    </div>
</section>
