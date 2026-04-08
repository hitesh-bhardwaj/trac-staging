<?php
if (!defined('ABSPATH')) {
    exit();
}

$network_line_svg_path =
    get_template_directory() . '/src/imgs/line-network.svg';
$network_dotted_lines_svg_path =
    get_template_directory() . '/src/imgs/dotted-network-path.svg';
$network_circle_lines_svg_path =
    get_template_directory() . '/src/imgs/circle-network.svg';
?>

<section
    class="our-network-section relative h-fit bg-[#EEF3FC]"
    data-section="our-network"
>
    <div class="pt-[7vw] text-center md:py-12 sm:py-8">
        <div
            class="mb-[1.563vw] flex items-center justify-center gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-4"
        >
            <span
                class="label-line h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6 sm:w-5"
            ></span>
            <span
                class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg"
            >
                Our Network
            </span>
        </div>

        <h2
            class="services-title font-heading flex flex-col text-[3.438vw] leading-[1.12] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl"
        >
            <span>Built for Resilience.</span>
            <span>Designed for Africa.</span>
        </h2>

        <div
            class="relative mt-[7vw] h-[120vh] w-screen overflow-hidden md:mt-8 md:h-[60vw] sm:mt-6 sm:h-[80vw]"
        >
            <img
                src="<?php echo esc_url(
                    get_template_directory_uri() . '/src/imgs/network-img.png',
                ); ?>"
                alt="TrAC network map"
                class="h-full w-full object-cover"
                loading="lazy"
            >
            <div class="size-[5vw] absolute z-50 inset-0 top-[45%] left-[52%] ">
                <img
                src="<?php echo esc_url(
                    get_template_directory_uri() . '/src/imgs/data-center.png',
                ); ?>"
                alt="TrAC network map"
                class="h-full w-full object-cover"
                loading="lazy"
            >
            </div>
            <div class="absolute h-fit inset-0 top-[20%] left-[10%] z-50 w-[10vw] text-start font-medium uppercase">
                democratic republic of the congo
</div>
            <div class="absolute h-fit inset-0 top-[10%] left-[50%] z-50 w-[10vw] text-start font-medium uppercase">
                UGANDA
</div>
            <div class="absolute h-fit inset-0 top-[90%] left-[50%] z-50 w-[10vw] text-start font-medium uppercase">
                BURUNDI
</div>
            <div class="absolute h-fit inset-0 top-[85%] left-[80%] z-50 w-[20vw] text-start font-medium uppercase flex flex-col gap-[1vw]">
                <div class="flex gap-[0.5vw] items-center"><div class="w-[3vw] h-auto">  <img
                src="<?php echo esc_url(
                    get_template_directory_uri() . '/src/imgs/fiber-cable.png',
                ); ?>"
                alt="fiber cable"
                class="h-full w-full object-contain"
                loading="lazy"
            ></div> <p>Fiber Cable</p></div>
                <div class="flex gap-[0.5vw] items-center"><div class="w-[3vw] h-[1px] bg-black"> </div> <p>Wireless Internet</p></div>
                
</div>
            <div class="absolute h-fit inset-0 top-[70%] left-[75%] z-50 w-[10vw] text-start font-medium uppercase">
                tanzania
</div>
            <div class="absolute h-fit inset-0 top-[52%] left-[53%] z-50 w-fit text-start font-medium uppercase">
                RWANDA
</div>

            <div
                class="pointer-events-none absolute inset-0 flex items-center justify-center"
            >
                <div
                    class="relative h-[44vw] w-[50vw] md:h-[44vw] md:w-[66vw] sm:h-[58vw] sm:w-[88vw]"
                >
                    <img
                        src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/network-map-center.png',
                        ); ?>"
                        alt="Central Africa network overlay"
                        class="absolute inset-0 z-10 h-full w-full object-contain"
                        loading="lazy"
                    >

                    <div
                        class="absolute inset-0 left-[1.5%] top-[10%] z-20 h-full w-[42vw] our-network-draw-layer"
                        data-network-draw="line"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_line_svg_path)) {
                            echo file_get_contents($network_line_svg_path);
                        } ?>
                    </div>

                    <div
                        data-animate="fade-up"
                        data-delay="3"
                        class="absolute inset-0 left-[1%] top-[10.5%] z-30 h-full w-[42vw] our-network-draw-layer"
                        data-network-draw="dotted"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_dotted_lines_svg_path)) {
                            echo file_get_contents(
                                $network_dotted_lines_svg_path,
                            );
                        } ?>
                    </div>

                    <div
                    data-animate="fade-up"
                    data-delay="3"
                        class="absolute inset-0 left-[63%] top-[-12.7%] z-30 h-full w-[30vw] our-network-draw-layer"
                        data-network-draw="circle"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_circle_lines_svg_path)) {
                            echo file_get_contents(
                                $network_circle_lines_svg_path,
                            );
                        } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
