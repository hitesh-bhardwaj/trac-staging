<?php
if (!defined('ABSPATH')) {
    exit();
}

$map_label = get_field('contact_map_label');
$map_title = get_field('contact_map_title');
$map_image = get_field('contact_map_image');
$office_1_name = get_field('contact_office_1_name');
$office_1_address = get_field('contact_office_1_address');
?>

<section class="map-section relative overflow-hidden bg-white py-[7vw] md:py-20 sm:py-16" data-section="map">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[104rem] mx-auto">
            <!-- Section Label -->
           <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body  text-brand-secondary text-30 sm:!text-[4vw]"><?php echo trac_esc_html(
                    $map_label,
                ); ?></span>
            </div>


            <!-- Heading -->
            <h2 class="font-heading w-fit text-66 font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[4vw] md:mb-12 sm:mb-0" data-heading-anim>
                <?php echo trac_esc_html($map_title); ?>
            </h2>

            <!-- Map Container -->
            <div class="map-container relative w-full h-[35vw] md:h-[500px] sm:h-[300px] mb-[3vw] md:mb-12 ">
                <!-- Dotted World Map SVG -->
                <div class="map-svg-wrapper absolute inset-0 flex items-center justify-center" data-map-svg>
                    <img src="<?php echo esc_url(
                        $map_image,
                    ); ?>" alt="World Map" class="w-full h-full object-contain">
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
               
                <div class="pointer-events-none absolute left-0 top-0 z-[5] origin-left rotate-[140deg] sm:rotate-[110deg]" data-map-connector="rwanda" aria-hidden="true">
                    <span class="block h-[2px] w-[305px] origin-left scale-x-0 rounded-full bg-brand-secondary will-change-transform sm:w-[125px] sm:h-[1px]" data-map-line></span>
                </div>

                <!-- Address Cards -->
                <div class="address-card w-[19vw] absolute bg-brand-tertiary rounded-2xl shadow-md space-y-[1vw] p-[2vw] py-[1vw] md:p-6 sm:p-4 opacity-0 left-[30%] top-[80%] sm:w-full sm:left-0"  data-address="rwanda" data-connector-anchor="top-right">
                    <h3 class="font-body text-24 font-medium text-white md:text-lg md:mb-2 sm:mb-[1vw] sm:text-[4vw]"><?php echo trac_esc_html(
                        $office_1_name,
                    ); ?></h3>
                    <p class="font-body text-24 leading-[1.25] text-white md:text-base sm:text-[4vw]">
                        <?php echo nl2br(trac_esc_html($office_1_address)); ?>
                    </p>
                </div>


            </div>

            
        </div>
    </div>
</section>
