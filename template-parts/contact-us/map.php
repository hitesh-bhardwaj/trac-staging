<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="map-section relative overflow-hidden bg-white py-[7vw] md:py-20 sm:py-16" data-section="map">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[104rem] mx-auto">
            <!-- Section Label -->
           <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body  text-brand-secondary text-30">Map</span>
            </div>


            <!-- Heading -->
            <h2 class="font-heading w-fit text-66 font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[4vw] md:text-5xl md:mb-12 sm:text-4xl sm:mb-10" data-heading-anim>
                Our Head Office
            </h2>

            <!-- Map Container -->
            <div class="map-container relative w-full h-[35vw] md:h-[500px] sm:h-[200px] mb-[3vw] md:mb-12 sm:mb-8">
                <!-- Dotted World Map SVG -->
                <div class="map-svg-wrapper absolute inset-0 flex items-center justify-center" data-map-svg>
                    <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/contact/map-contact.svg" alt="World Map" class="w-full h-full object-contain">
                </div>

                <!-- White Overlay for Reveal Effect -->
                <div class="map-overlay absolute inset-0 bg-white pointer-events-none" data-map-overlay></div>

                <!-- Location Markers -->
                <!-- Rwanda Location -->
                <div class="location-marker absolute opacity-0" style="left: 59.5%; top: 42%;" data-location="rwanda">
                    <!-- Pulsing Circle -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-[1.6vw] h-[1.6vw] md:w-12 md:h-12 sm:w-8 sm:h-8 rounded-full border border-brand-secondary animate-ping opacity-75"></div>
                    </div>
                    <!-- Static Circle -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-[0.8vw] h-[0.8vw] md:w-6 md:h-6 sm:w-4 sm:h-4 rounded-full bg-brand-secondary shadow-lg"></div>
                    </div>
                </div>

               

                <!-- Connector Lines (positioned/rotated via JS to link marker -> card) -->
               
                <div class="pointer-events-none absolute left-0 top-0 z-[5] origin-left rotate-[140deg] sm:hidden" data-map-connector="rwanda" aria-hidden="true">
                    <span class="block h-[2px] w-[305px] origin-left scale-x-0 rounded-full bg-brand-secondary will-change-transform" data-map-line></span>
                </div>

                <!-- Address Cards -->
                <!-- Rwanda Address -->
                <div class="address-card w-[19vw] absolute bg-brand-tertiary rounded-2xl shadow-md space-y-[1vw] p-[2vw] py-[1vw] md:p-6 sm:p-4 opacity-0 sm:hidden" style="left: 30%; top: 80%;" data-address="rwanda" data-connector-anchor="top-right">
                    <h3 class="font-body text-24 font-medium text-white md:text-lg md:mb-2 sm:mb-[1vw] sm:text-[4vw]">Kigali, Rwanda</h3>
                    <p class="font-body text-24 leading-[1.25] text-white md:text-base sm:text-[4vw]">
                        Urban Golf Peak,<br>5th floor, 4 KG 548 St
                    </p>
                </div>

             
            </div>

            <!-- Mobile Address List (below map, no background) -->
            <div class="hidden sm:block mt-8">
                <div class="address-card opacity-0">
                    <h3 class="font-heading leading-[1.1] font-medium text-text-primary mb-3 text-[4.5vw] sm:mb-[1vw]">
                        Rwanda
                    </h3>
                    <p class="font-body text-[4vw] leading-[1.5] text-text-body">
                        KG 15 Ave, #11, Gacuriro<br>
                        Kigali, Rwanda
                    </p>
                </div>

                <div class="address-card opacity-0 mt-16">
                    <h3 class="font-heading  leading-[1.1] font-medium text-text-primary mb-3 text-[4.5vw] sm:mb-[1vw]">
                        British Virgin Island
                    </h3>
                    <p class="font-body text-[4vw] leading-[1.5] text-text-body">
                        80 Main St, Road Town<br>
                        Tortola VG 11100 BVI
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
