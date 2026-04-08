<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="why-trac-section relative bg-[#eef3fc] h-[600vh] " data-section="why-trac" data-horizontal-scroll>
    <div class="why-trac-wrapper  sticky top-0">
        <div class="why-trac-track flex  ">
            <div class="w-[270vw]  absolute top-[50%] left-[96%] bg-black h-[1px]"></div>
            <div class="why-trac-slide why-trac-slide-title w-screen h-screen flex-shrink-0 flex items-center justify-center relative">
                <div class="why-circles absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[37.188vw] h-[36.771vw] md:w-[80vw] md:h-[80vw]">
                    <img src="<?php echo esc_url(
                        get_template_directory_uri() .
                            '/src/imgs/circle-bg-why-trac.svg',
                    ); ?>" alt="" class="absolute inset-[10.5%] w-[79%] h-[79%]" loading="lazy">
                    <img src="<?php echo esc_url(
                        get_template_directory_uri() .
                            '/src/imgs/circle-bg-why-trac.svg',
                    ); ?>" alt="" class="absolute inset-[5%] w-[90%] h-[90%]" loading="lazy">
                    <img src="<?php echo esc_url(
                        get_template_directory_uri() .
                            '/src/imgs/circle-bg-why-trac.svg',
                    ); ?>" alt="" class="absolute inset-0 w-full h-full" loading="lazy">
                </div>
               

                <div class="why-title-content relative z-10 text-center pt-[2vw]">
                    <div class="why-label flex items-center justify-center gap-[0.729vw] mb-[5.604vw] md:gap-3 md:mb-8">
                        <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1"></span>
                        <span class="label-text font-body text-[1.25vw] text-[#111] md:text-xl">Why Choose TrAC</span>
                    </div>
                    <h2 class="why-main-title font-heading text-[3.438vw] leading-[1.18] tracking-[0.01em] text-[#1d1d1d] md:text-4xl sm:text-3xl">
                        <span class="block">Why Businesses</span>
                        <span class="block">Choose TrAC</span>
                    </h2>
                </div>

                <div class="why-lines absolute top-[48%] left-[50%] -translate-y-1/2 w-[46vw] h-[10vw] md:hidden">
                    <img src="<?php echo esc_url(
                        get_template_directory_uri() .
                            '/src/imgs/why-trac-connection.svg',
                    ); ?>" alt="" class="w-full h-full object-contain" loading="lazy">
                </div>
            </div>

            <div class="why-trac-slide why-trac-slide-cards relative z-[2] w-[50vw] h-screen flex-shrink-0 flex items-center justify-center gap-[2.604vw] px-[5.21vw] md:flex-col md:gap-8 md:px-[4vw]">
                <div class="why-card flex flex-col gap-[0.729vw] w-[23.438vw] md:w-full md:max-w-md">
                    <div class="why-card-image bg-[#1d1d1d] h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/why-1.jpg',
                        ); ?>" alt="Zero Contention" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="why-card-content">
                        <h3 class="why-card-title font-body text-[1.667vw] text-[#1d1d1d] mb-[1.875vw] md:text-2xl md:mb-4">Zero Contention</h3>
                        <p class="why-card-desc font-body text-[1.25vw] leading-[1.417] text-[#1d1d1d] md:text-lg">Your bandwidth is never shared with other customers. You always receive the full speed you're paying for.</p>
                    </div>
                </div>
            </div>
            <div class="why-trac-slide why-trac-slide-cards relative z-[2] w-[50vw] h-screen flex-shrink-0 flex items-center justify-center gap-[2.604vw] px-[5.21vw] md:flex-col md:gap-8 md:px-[4vw]">
                <div class="why-card flex flex-col gap-[0.729vw] w-[23.438vw] md:w-full md:max-w-md">
                    <div class="why-card-image bg-[#1d1d1d] h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/why-2.jpg',
                        ); ?>" alt="24/7 NOC Support" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="why-card-content">
                        <h3 class="why-card-title font-body text-[1.667vw] text-[#1d1d1d] mb-[1.875vw] md:text-2xl md:mb-4">24/7 NOC Support</h3>
                        <p class="why-card-desc font-body text-[1.25vw] leading-[1.417] text-[#1d1d1d] md:text-lg">Our Network Operations Centre monitors your connection around the clock from the heart of Africa.</p>
                    </div>
                </div>
</div>
            <div class="why-trac-slide why-trac-slide-cards relative z-[2] w-[50vw] h-screen flex-shrink-0 flex items-center justify-center gap-[2.604vw] px-[5.21vw] md:flex-col md:gap-8 md:px-[4vw]">
                <div class="why-card flex flex-col gap-[0.729vw] w-[23.438vw] md:w-full md:max-w-md">
                    <div class="why-card-image bg-[#1d1d1d] h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/why-3.jpg',
                        ); ?>" alt="Fully Redundant" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="why-card-content">
                        <h3 class="why-card-title font-body text-[1.667vw] text-[#1d1d1d] mb-[1.875vw] md:text-2xl md:mb-4">Fully Redundant</h3>
                        <p class="why-card-desc font-body text-[1.25vw] leading-[1.417] text-[#1d1d1d] md:text-lg">Internet from 3 different providers across 3 geographies. A single fibre cut will never take you offline.</p>
                    </div>
                </div>

</div>
           

            <div class="why-trac-slide why-trac-slide-cards relative z-[2] w-[50vw] h-screen flex-shrink-0 flex items-center justify-center gap-[2.604vw] px-[5.21vw] md:flex-col md:gap-8 md:px-[4vw]">
                

                <div class="why-card flex flex-col gap-[0.729vw] w-[23.438vw] md:w-full md:max-w-md">
                    <div class="why-card-image bg-[#1d1d1d] h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/why-4.jpg',
                        ); ?>" alt="Business-Grade for All" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="why-card-content">
                        <h3 class="why-card-title font-body text-[1.667vw] text-[#1d1d1d] mb-[1.875vw] md:text-2xl md:mb-4">Business-Grade for All</h3>
                        <p class="why-card-desc font-body text-[1.25vw] leading-[1.417] text-[#1d1d1d] md:text-lg">Even home plans are built on business-grade infrastructure. No second-class service - ever.</p>
                    </div>
                </div>
            </div>
             <div class="why-trac-slide why-trac-slide-cards relative z-[2] w-[50vw] h-screen flex-shrink-0 flex items-center justify-center gap-[2.604vw] px-[5.21vw] md:flex-col md:gap-8 md:px-[4vw]">
                 <div class="why-card flex flex-col gap-[0.729vw] w-[23.438vw] md:w-full md:max-w-md">
                    <div class="why-card-image bg-[#1d1d1d] h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/why-5.jpg',
                        ); ?>" alt="Managed Equipment" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="why-card-content">
                        <h3 class="why-card-title font-body text-[1.667vw] text-[#1d1d1d] mb-[1.875vw] md:text-2xl md:mb-4">Managed Equipment</h3>
                        <p class="why-card-desc font-body text-[1.25vw] leading-[1.417] text-[#1d1d1d] md:text-lg">We own, manage, and continuously update all hardware at your site. Zero maintenance for you.</p>
                    </div>
                </div>
</div>


            <div class="why-trac-slide why-trac-slide-cards relative z-[2] w-[50vw] h-screen flex-shrink-0 flex items-center justify-center gap-[2.604vw] px-[5.21vw] md:flex-col md:gap-8 md:px-[4vw]">
               

                <div class="why-card flex flex-col gap-[0.729vw] w-[23.438vw] md:w-full md:max-w-md">
                    <div class="why-card-image bg-[#1d1d1d] h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/why-6.jpg',
                        ); ?>" alt="Pan-African Reach" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="why-card-content">
                        <h3 class="why-card-title font-body text-[1.667vw] text-[#1d1d1d] mb-[1.875vw] md:text-2xl md:mb-4">Pan-African Reach</h3>
                        <p class="why-card-desc font-body text-[1.25vw] leading-[1.417] text-[#1d1d1d] md:text-lg">Our trans-African network spans multiple countries with local expertise and global connectivity.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
