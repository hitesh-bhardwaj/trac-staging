<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="why-trac-section relative bg-[#eef3fc] h-[600vh] " data-section="why-trac" data-horizontal-scroll>
    <div class="why-trac-wrapper  sticky top-0">
        <div class="why-trac-track flex  ">
            <!-- Straight progress line (SVG so we can draw it on scroll) -->
            <svg class="why-progress-line w-[270vw] mt-[-0.2%] absolute top-[50%] left-[96%] h-[2px]" viewBox="0 0 1000 2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg" data-why-progress-line aria-hidden="true" focusable="false">
                <!-- Base is transparent; JS draws an overlay stroke on scroll -->
                <line x1="0" y1="1" x2="1000" y2="1" stroke="transparent" stroke-width="1.5" />
            </svg>
            <div class="why-trac-slide why-trac-slide-title w-screen h-screen flex-shrink-0 flex items-center justify-center relative">
                <div class="why-circles absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[37.188vw] h-[36.771vw] md:w-[80vw] md:h-[80vw]">
                    <img src="<?php echo esc_url(
                        get_template_directory_uri() .
                            '/src/imgs/circle-bg-why-trac.svg',
                    ); ?>" alt="" class="absolute inset-[10.5%] opacity-50 w-[79%] h-[79%]" loading="lazy">
                    <img src="<?php echo esc_url(
                        get_template_directory_uri() .
                            '/src/imgs/circle-bg-why-trac.svg',
                    ); ?>" alt="" class="absolute inset-[5%] opacity-50 w-[90%] h-[90%]" loading="lazy">
                    <img src="<?php echo esc_url(
                        get_template_directory_uri() .
                            '/src/imgs/circle-bg-why-trac.svg',
                    ); ?>" alt="" class="absolute inset-0 opacity-50 w-full h-full" loading="lazy">
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
                   <svg class="w-full h-full object-contain" width="903" height="147" viewBox="0 0 903 147" fill="none" xmlns="http://www.w3.org/2000/svg" data-why-connect aria-hidden="true" focusable="false">
<g clip-path="url(#clip0_4_16)">
<path d="M11 53C11 53 78 66.5 147 68C216 69.5 274 50 274 50C274 50 306.5 37.0001 336 46.5001C356 52.9407 381.5 70.5 405.5 86.5C461.5 125 536 140 536 140" stroke="transparent"/>
<path d="M11 53C11 53 167 117 270 117C328 117 405.5 86.5 405.5 86.5C405.5 86.5 443.5 71.48 484 51.5C524 31.7667 559 11 559 11" stroke="transparent"/>
<path d="M7.5 60C11.6421 60 15 56.6421 15 52.5C15 48.3579 11.6421 45 7.5 45C3.35786 45 0 48.3579 0 52.5C0 56.6421 3.35786 60 7.5 60Z" fill="#10417F"/>
<path d="M404.5 93C408.642 93 412 89.6421 412 85.5C412 81.3579 408.642 78 404.5 78C400.358 78 397 81.3579 397 85.5C397 89.6421 400.358 93 404.5 93Z" fill="#10417F"/>
<path d="M898 94C898 94 794.546 23.9086 725.523 30.5C651.27 37.5908 548 140 548 140" stroke="#111111"/>
<path d="M898 93.9999C898 93.9999 805.297 58.4999 730.252 97.9999C673.18 128.04 667.505 42.9999 566.288 6.99994" stroke="#111111"/>
<path d="M542.5 147C546.642 147 550 143.642 550 139.5C550 135.358 546.642 132 542.5 132C538.358 132 535 135.358 535 139.5C535 143.642 538.358 147 542.5 147Z" fill="#10417F"/>
<path d="M565.5 15C569.642 15 573 11.6421 573 7.5C573 3.35786 569.642 0 565.5 0C561.358 0 558 3.35786 558 7.5C558 11.6421 561.358 15 565.5 15Z" fill="#10417F"/>
<path d="M648.5 67C652.642 67 656 63.6421 656 59.5C656 55.3579 652.642 52 648.5 52C644.358 52 641 55.3579 641 59.5C641 63.6421 644.358 67 648.5 67Z" fill="#10417F"/>
<path d="M895.5 99C899.642 99 903 95.6421 903 91.5C903 87.3579 899.642 84 895.5 84C891.358 84 888 87.3579 888 91.5C888 95.6421 891.358 99 895.5 99Z" fill="#10417F"/>
</g>
<defs>
<clipPath id="clip0_4_16">
<rect width="903" height="147" fill="white"/>
</clipPath>
</defs>
</svg>
</div>

            </div>

            <div class="why-trac-slide why-trac-slide-cards relative z-[2] w-[50vw] h-screen flex-shrink-0 flex items-center justify-center gap-[2.604vw] px-[5.21vw] md:flex-col md:gap-8 md:px-[4vw]">
                <div class="why-card flex flex-col gap-[0.729vw] w-[23.438vw] md:w-full md:max-w-md">
                    <div class="why-card-image bg-transparent h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
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
                    <div class="why-card-image bg-transparent h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
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
                    <div class="why-card-image bg-transparent h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
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
                    <div class="why-card-image bg-transparent h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
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
                    <div class="why-card-image bg-transparent h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
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
                    <div class="why-card-image bg-transparent h-[28.646vw] rounded-[1.25vw] overflow-hidden md:h-64 md:rounded-2xl">
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
