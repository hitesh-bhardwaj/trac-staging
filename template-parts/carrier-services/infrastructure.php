<?php
if (!defined('ABSPATH')) {
    exit();
}
?>

<section class="communities-overview relative bg-[#EEF3FC] px-[5.208vw] pt-[4.2vw] pb-[8.333vw] md:px-[4vw] md:pt-16 md:pb-24 sm:px-[6vw] sm:pt-12 sm:pb-16" data-section="infrastructure">
    <div class="communities-overview__header mx-auto text-center max-w-[90vw]">
        <div
            class="communities-overview__eyebrow mx-auto mb-14 inline-flex items-center gap-[0.85vw] md:mb-6 md:gap-3 sm:mb-4 sm:gap-3"
            data-animate="fade-up"
        >
             <span class="w-6 h-1 bg-brand-primary"></span>
            <span class="font-body text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                Infrastructure
            </span>
        </div>

        <h2
            class="mx-auto mb-[2vw] max-w-[72vw] font-normal  font-heading text-[3.5vw] leading-[1.2] tracking-[-0.03em] text-text-primary md:mb-6 md:max-w-[90%] md:text-[48px] sm:mb-5 sm:max-w-full sm:text-[34px]"
            data-heading-anim
        >
            A Network Designed for Scale and Reliability
        </h2>

        <div
            class="mx-auto max-w-[66vw] space-y-[1.4vw] font-body text-body-lg leading-[1.5] text-text-body md:max-w-[88%] md:space-y-5 md:text-[22px] sm:max-w-full sm:space-y-4 sm:text-[17px]"
        >
            <p data-para-anim>
                Our fibre-first infrastructure enables reliable national and cross-border connectivity, while our private network capabilities support secure, controlled communication between sites and systems.
            </p>
            <p data-para-anim data-para-delay="0.08">
                This is complemented by carrier-grade data centre and cloud environments, allowing operators to host, manage, and expand their services without building infrastructure from the ground up.
            </p>
        </div>
    </div>

    <div class="mx-auto mt-[5.8vw] max-w-[84vw] md:mt-12 md:max-w-full sm:mt-10">
        <div class="grid grid-cols-2 gap-[2vw] md:gap-5 sm:grid-cols-1 sm:gap-4">
            <figure
                class="overflow-hidden rounded-[2.1vw] bg-white md:rounded-[28px] sm:rounded-[22px]"
                data-animate="fade-up"
                data-delay="0.25"
            >
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/imgs/carrier-services/infrastructure-img-1.png'); ?>"
                    alt="Fibre installation team working on infrastructure"
                    class="block h-[32.2vw] w-full object-cover md:h-[420px] sm:h-[280px]"
                    loading="lazy"
                >
            </figure>

            <figure
                class="overflow-hidden rounded-[2.1vw] bg-white md:rounded-[28px] sm:rounded-[22px]"
                data-animate="fade-up"
                data-delay="0.3"
            >
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/imgs/carrier-services/infrastructure-img-2.png'); ?>"
                    alt="Data centre environment supporting network operations"
                    class="block h-[32.2vw] w-full object-cover md:h-[420px] sm:h-[280px]"
                    loading="lazy"
                >
            </figure>
        </div>
    </div>
</section>