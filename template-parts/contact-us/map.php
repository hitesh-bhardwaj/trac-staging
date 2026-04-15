<?php
if (!defined('ABSPATH')) {
    exit();
}
?>

<section class="map-section relative overflow-hidden bg-white py-[7vw] md:py-20 sm:py-16" data-section="map">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[104rem] mx-auto">
            <!-- Section Label -->
            <div class="flex items-center gap-[0.729vw] mb-[2vw] justify-center md:gap-3 md:mb-8" data-animate="fade-up">
                <span class="w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1"></span>
                <span class="font-body text-[1.25vw] text-[#111] md:text-xl">Map</span>
            </div>

            <!-- Heading -->
            <h2 class="font-heading text-[3.646vw] font-normal leading-[1.12] tracking-[0.01em] text-[#111] text-center mb-[4vw] md:text-5xl md:mb-12 sm:text-4xl sm:mb-10" data-heading-anim>
                Our Head office
            </h2>

            <!-- Map Container -->
            <div class="map-container relative w-full h-[35vw] md:h-[500px] sm:h-[400px] mb-[3vw] md:mb-12 sm:mb-8">
                <!-- Dotted World Map SVG -->
                <div class="map-svg-wrapper absolute inset-0 flex items-center justify-center" data-map-svg>
                    <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/contact/map-contact.svg" alt="World Map" class="w-full h-full object-contain">
                </div>

                <!-- White Overlay for Reveal Effect -->
                <div class="map-overlay absolute inset-0 bg-white pointer-events-none" data-map-overlay></div>

                <!-- Location Markers -->
                <!-- Rwanda Location -->
                <div class="location-marker absolute opacity-0" style="left: 53%; top: 70%;" data-location="rwanda">
                    <!-- Pulsing Circle -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-[1.8vw] h-[1.8vw] md:w-12 md:h-12 sm:w-10 sm:h-10 rounded-full border border-brand-primary animate-ping opacity-75"></div>
                    </div>
                    <!-- Static Circle -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-[1vw] h-[1vw] md:w-6 md:h-6 sm:w-5 sm:h-5 rounded-full bg-brand-primary shadow-lg"></div>
                    </div>
                </div>

                <!-- British Virgin Island Location -->
                <div class="location-marker absolute opacity-0" style="left: 37%; top: 50%;" data-location="bvi">
                    <!-- Pulsing Circle -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-[1.8vw] h-[1.8vw] md:w-12 md:h-12 sm:w-10 sm:h-10 rounded-full border border-brand-primary animate-ping opacity-75"></div>
                    </div>
                    <!-- Static Circle -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-[1vw] h-[1vw] md:w-6 md:h-6 sm:w-5 sm:h-5 rounded-full bg-brand-primary shadow-lg"></div>
                    </div>
                </div>

                <!-- Address Cards -->
                <!-- Rwanda Address -->
                <div class="address-card absolute bg-[#EEF3FC] rounded-2xl shadow-md p-[1.5vw] md:p-6 sm:p-4 opacity-0" style="left: 55%; top: 70%;" data-address="rwanda" data-animate="fade-up">
                    <h3 class="font-heading text-[1.25vw] font-medium text-[#111] mb-[0.5vw] md:text-lg md:mb-2 sm:text-base">Rwanda</h3>
                    <p class="font-body text-[1.042vw] leading-[1.6] text-[#1e1e1e] md:text-base sm:text-sm">
                        KG 15 Ave, #11, Gacuriro<br>
                        Kigali, Rwanda
                    </p>
                </div>

                <!-- BVI Address -->
                <div class="address-card absolute bg-[#EEF3FC] rounded-2xl shadow-md p-[1.5vw] md:p-6 sm:p-4 opacity-0" style="left: 37%; top: 20%;" data-address="bvi" data-animate="fade-up">
                    <h3 class="font-heading text-[1.25vw] font-medium text-[#111] mb-[0.5vw] md:text-lg md:mb-2 sm:text-base">British Virgin Island</h3>
                    <p class="font-body text-[1.042vw] leading-[1.6] text-[#1e1e1e] md:text-base sm:text-sm">
                        80 Main St, Road Town<br>
                        Tortola VG 11100 BVI
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
