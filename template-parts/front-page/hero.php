<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="hero relative min-h-screen bg-white overflow-hidden" data-section="hero" data-hero-static>
    <div class="hero-container w-full px-[5.21vw] pt-[5vw] pb-[5.21vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[6vw] sm:pt-[100px]">
        <div class="hero-grid flex justify-between gap-[2.604vw] items-start md:grid-cols-1 md:gap-8">
            <div class="hero-text w-[70%] md:max-w-full md:pt-8 sm:pt-4">
                <h1
                    class="hero-title font-heading text-text-primary tracking-[0.05vw] mb-[1.667vw] md:mb-6 sm:mb-4"
                    data-hero-reveal
                >
                    <span class="block hero-title-line">
                        <?php echo esc_html(
                            get_field('hero_title_line_1') ?: "Rwanda's Connectivity",
                        ); ?>
                    </span>
                    <span class="block hero-title-line">
                        <?php echo esc_html(
                            get_field('hero_title_line_2') ?: 'Backbone',
                        ); ?>
                    </span>
                </h1>

                <p
                    class="hero-subtitle-1 font-body font-normal text-text-body w-[70%] mb-[3.125vw] md:max-w-full md:mb-8 sm:mb-6"
                    data-hero-reveal
                    data-hero-delay="0.08"
                >
                    <?php echo esc_html(
                        get_field('hero_subtitle_1') ?:
                            'Built for Speed. Designed for Growth.',
                    ); ?>
                </p>

                <p
                    class="hero-subtitle font-body font-medium text-text-body w-[60%] mb-[3.125vw] md:max-w-full md:mb-8 sm:mb-6"
                    data-hero-reveal
                    data-hero-delay="0.14"
                >
                    <?php echo esc_html(
                        get_field('hero_subtitle_2') ?:
                            "Rooted in Rwanda and expanding across East Africa, TrAC delivers reliable, fibre-first connectivity for homes, businesses, and the communities shaping the region's future.",
                    ); ?>
                </p>

                <div
                    class="hero-cta flex flex-wrap gap-[1.042vw] md:gap-4 sm:flex-col sm:gap-3"
                    data-hero-reveal
                    data-hero-delay="0.22"
                >
                    <a href="<?php echo esc_url(
                        get_field('hero_primary_button_link') ?: '#get-connected',
                    ); ?>" class="btn btn-primary group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            get_field('hero_primary_button_text') ?: 'Get on TrAC',
                        ); ?></span>
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

                    <a href="<?php echo esc_url(
                        get_field('hero_secondary_button_link') ?: '#products',
                    ); ?>" class="btn btn-outline group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            get_field('hero_secondary_button_text') ?: 'Explore Solutions',
                        ); ?></span>
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

            <div
                class="hero-globe relative h-full md:hidden"
                data-hero-reveal
                data-hero-delay="0.10"
            >
                <div class="globe-wrapper absolute -right-[12vw] top-[-9vw] w-[60vw] h-[60vw]">
                    <div class="h-64 bg-gradient-to-t from from-white via-white to-transparent absolute w-full z-[1] bottom-[5vw] right-0 left-0"></div>
                    <div id="globe-container" class="w-full h-full relative"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-globe hidden md:block w-full h-[40vh] relative overflow-hidden mt-4">
        <div class="mobile-globe-inner w-full h-full flex items-center justify-center">
            <svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[80%] h-[80%] max-w-[300px]">
                <circle cx="200" cy="200" r="150" fill="#062056" opacity="0.1"/>
                <circle cx="200" cy="200" r="150" stroke="#10417f" stroke-width="1" fill="none" opacity="0.3"/>
                <ellipse cx="220" cy="200" rx="60" ry="80" fill="#10417f" opacity="0.3"/>
                <circle cx="200" cy="150" r="6" fill="#E85D24"/>
                <circle cx="240" cy="180" r="5" fill="#E85D24"/>
                <circle cx="220" cy="220" r="6" fill="#E85D24"/>
                <circle cx="200" cy="260" r="5" fill="#E85D24"/>
                <circle cx="180" cy="200" r="4" fill="#E85D24"/>
                <path d="M200,150 Q280,120 320,180" stroke="#10417f" stroke-width="1" fill="none" opacity="0.5"/>
                <path d="M220,220 Q300,200 340,160" stroke="#E85D24" stroke-width="1" fill="none" opacity="0.5"/>
                <path d="M200,260 Q120,280 80,220" stroke="#10417f" stroke-width="1" fill="none" opacity="0.5"/>
            </svg>
        </div>
    </div>
</section>