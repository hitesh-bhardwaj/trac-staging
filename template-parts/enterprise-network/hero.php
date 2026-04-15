<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="hero relative min-h-screen bg-white overflow-hidden" data-section="hero" data-hero-static>
    <div class="hero-container w-full px-[5.21vw] pt-[10vw] pb-[5.21vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[6vw] sm:pt-[100px]">
        <div class="flex items-center justify-center min-h-[calc(100vh-10vw)] md:min-h-[calc(100vh-120px)]">
            <div class="hero-text w-full max-w-[80rem] text-center">
                <h1
                    class="hero-title font-heading text-text-primary tracking-[0.05vw] mb-[1.667vw] md:mb-6 sm:mb-4"
                    data-hero-reveal
                    data-heading-anim
                    data-base-delay="0.05"
                >
                    <span class="block hero-title-line">
                        <?php echo esc_html(
                            get_field('hero_title_line_1') ?: 'Enterprise Connectivity Engineered for '
                        ); ?>
                    </span>
                    <span class="block hero-title-line">
                        <?php echo esc_html(
                            get_field('hero_title_line_2') ?: 'Performance and Continuity.'
                        ); ?>
                    </span>
                </h1>

                <p
                    class="hero-subtitle font-body font-medium text-text-body mx-auto max-w-[45rem] mb-[3.125vw] md:mb-8 sm:mb-6"
                    data-hero-reveal
                    data-hero-delay="0.08"
                    data-para-anim
                >
                    <?php echo esc_html(
                        get_field('hero_subtitle_2') ?:
                            'Secure, fibre-first infrastructure designed to support complex operations, multi-site environments, and mission-critical systems across Rwanda and East Africa.'
                    ); ?>
                </p>

                <div
                    class="hero-cta flex flex-wrap justify-center gap-[1.042vw] md:gap-4 sm:flex-col sm:gap-3"
                    data-hero-reveal
                    data-hero-delay="0.16"
                >
                    <a href="<?php echo esc_url(
                        get_field('hero_primary_button_link') ?: '#get-connected',
                    ); ?>" class="btn btn-primary group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            get_field('hero_primary_button_text') ?: 'Request Service',
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

                <div class="enterprise-hero-images w-full mx-auto md:mt-10 sm:mt-8 flex items-end justify-center h-full gap-[1.25vw]">
                    <div
                        class="rounded-[1.2vw] overflow-hidden h-[18vw] w-[20vw]"
                        data-hero-reveal
                        data-hero-delay="0.24"
                    >
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() . '/src/imgs/enterprise-network/hero-image-1.png',
                            ); ?>"
                            alt="Fibre connectivity"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    </div>

                    <div
                        class="rounded-[1.2vw] overflow-hidden h-[15vw] w-[20vw]"
                        data-hero-reveal
                        data-hero-delay="0.32"
                    >
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() . '/src/imgs/enterprise-network/hero-image-2.png',
                            ); ?>"
                            alt="Operations and support"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    </div>

                    <div
                        class="rounded-[1.2vw] overflow-hidden h-[18vw] w-[20vw]"
                        data-hero-reveal
                        data-hero-delay="0.40"
                    >
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() . '/src/imgs/enterprise-network/hero-image-3.png',
                            ); ?>"
                            alt="Network infrastructure"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
