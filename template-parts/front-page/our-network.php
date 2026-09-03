<?php
if (!defined('ABSPATH')) {
    exit();
}

$network_dotted_lines_svg_path =
    get_template_directory() . '/src/imgs/new-network-dotted.svg';

$network_circle_lines_svg_path =
    get_template_directory() . '/src/imgs/circle-network.svg';

$network_circle_lines_svg_path_line =
    get_template_directory() . '/src/imgs/circle-network-dotted-line.svg';
?>

<section
    class="our-network-section is-position-debug relative h-fit bg-brand-tint"
    data-section="our-network"
>
    <div class=" pt-[7vw] md:py-12 sm:py-8">
        <div class="space-y-[3vw] px-[5vw]">
            <div
                data-animate="fade-up"
                class="flex items-center justify-start gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-4"
            >
                <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>

                <span class="label-text font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                    Our Network
                </span>
            </div>

            <h2 class="services-title font-heading flex w-[65%] flex-col text-66 leading-[1.12] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl">
                <span data-heading-anim>
                   Every part of the TrAC network is engineered for reliability and speed.
                </span>
            </h2>

            <div class="w-[53%] space-y-[1vw] text-24">
                <p>
                    Internet enters through multiple international routes. Backbones operate on fully redundant rings. Systems are monitored around the clock
                </p>

                <p>
                    The result is consistent performance you can depend on, whether at home, in business, or across multiple locations.
                </p>
            </div>
        </div>

        <div class="relative mt-[7vw] h-[55vw] w-screen overflow-hidden md:mt-8 md:h-[60vw] sm:mt-6 sm:h-[80vw]">
            <img
                src="<?php echo esc_url(
                    get_template_directory_uri() . '/src/imgs/network-img.png',
                ); ?>"
                alt="TrAC network map"
                class="h-full w-full object-cover"
                loading="lazy"
            >

            <div class="absolute inset-0 left-[53%] top-[42%] z-[50] size-[5vw]">
                <img
                    src="<?php echo esc_url(
                        get_template_directory_uri() . '/src/imgs/building.png',
                    ); ?>"
                    alt="Data center"
                    class="h-full w-full object-contain"
                    loading="lazy"
                >
            </div>

            <div
                data-animate="fade-up"
                class="absolute inset-0 left-[10%] top-[20%] z-[50] h-fit w-[10vw] text-start font-medium uppercase"
            >
                democratic republic of the congo
            </div>

            <div
                data-animate="fade-up"
                class="absolute inset-0 left-[50%] top-[10%] z-[50] h-fit w-[10vw] text-start font-medium uppercase"
            >
                UGANDA
            </div>

            <div class="absolute inset-0 left-[50%] top-[90%] z-[50] h-fit w-[10vw] text-start font-medium uppercase">
                BURUNDI
            </div>

            <div
                data-animate="fade-up"
                class="absolute inset-0 left-[80%] top-[85%] z-[50] flex h-fit w-[20vw] flex-col gap-[1vw] text-start font-medium uppercase"
            >
                <div class="flex items-center gap-[0.5vw]">
                    <div class="h-auto w-[3vw]">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/fiber-cable.png',
                            ); ?>"
                            alt="fiber cable"
                            class="h-full w-full object-contain"
                            loading="lazy"
                        >
                    </div>

                    <p>Fiber Cable</p>
                </div>
            </div>

            <div
                data-animate="fade-up"
                class="absolute inset-0 left-[75%] top-[70%] z-[50] h-fit w-[10vw] text-start font-medium uppercase"
            >
                tanzania
            </div>

            <div
                data-animate="fade-up"
                class="absolute inset-0 left-[37%] top-[47%] z-[50] h-fit w-fit text-start font-medium uppercase"
            >
                RWANDA
            </div>

            <div class="absolute inset-0 flex items-center justify-center">
                <div class="relative h-[44vw] w-[50vw] md:h-[44vw] md:w-[66vw] sm:h-[58vw] sm:w-[88vw]">
                    <img
                        src="<?php echo esc_url(
                            get_template_directory_uri() . '/src/imgs/map.png',
                        ); ?>"
                        alt="Central Africa network overlay"
                        class="absolute inset-0 z-[10] h-full w-full object-contain"
                        loading="lazy"
                    >

                    <div
                        class="our-network-draw-layer absolute inset-0 left-[-5%] top-[2.5%] z-[45] h-full w-[38vw]"
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
                        class="our-network-draw-layer absolute inset-0 left-[63%] top-[-16.5%] z-[40] h-full w-[34vw]"
                        data-network-draw="circle"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_circle_lines_svg_path)) {
                            echo file_get_contents(
                                $network_circle_lines_svg_path,
                            );
                        } ?>
                    </div>

                    <div
                        data-animate="fade"
                        data-delay="0.8"
                        class="our-network-draw-layer absolute inset-0 left-[63%] top-[-16.5%] z-[30] h-full w-[34vw]"
                        data-network-draw="circle-line"
                        aria-hidden="true"
                    >
                        <?php if (
                            file_exists($network_circle_lines_svg_path_line)
                        ) {
                            echo file_get_contents(
                                $network_circle_lines_svg_path_line,
                            );
                        } ?>
                    </div>
                </div>
            </div>

            <!-- STATIC LOCATION LABELS -->
            <div class="pointer-events-none absolute inset-0 z-[90]" aria-hidden="true">
                <span class="absolute left-[33%] top-[32%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Goma
                </span>

                <span class="absolute left-[19%] top-[75%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Bukavu
                </span>

                <span class="absolute left-[27.5%] top-[72.5%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Rusizi
                </span>

                <span class="absolute left-[36%] top-[38.2%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Rubavu
                </span>

                <span class="absolute left-[35%] top-[50.5%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Karongi
                </span>

                <span class="absolute left-[42.2%] top-[45.5%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Muhanga
                </span>

                <span class="absolute left-[45%] top-[60%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Ruhango
                </span>

                <span class="absolute left-[45%] top-[27%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Musanze
                </span>

                <span class="absolute left-[52.1%] top-[28%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Gatuna
                </span>
                <span class="absolute left-[52.1%] top-[52%] whitespace-nowrap uppercase text-24 font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Rawanda
                </span>

                <span class="absolute left-[59.7%] top-[8%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Kagitumba
                </span>

                <span class="absolute left-[73.8%] top-[10%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Kampala
                </span>

                <span class="absolute left-[81%] top-[17%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Nairobi
                </span>

                <span class="absolute left-[84%] top-[37.3%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Mombasa
                </span>

                <span class="absolute left-[75.3%] top-[60%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Dar Es Salaam
                </span>

                <span class="absolute left-[67%] top-[62%] whitespace-nowrap text-[0.9vw] font-medium leading-none text-text-primary max-md:text-[1.8vw] max-sm:text-[3vw]">
                    Rusumo
                </span>

                <span class="absolute left-[22.2%] top-[47%] whitespace-nowrap text-[1.05vw] font-bold leading-none text-text-primary/40 max-md:text-[2vw] max-sm:text-[3.2vw]">
                    DRC
                </span>

                <span class="absolute left-[76.8%] top-[34.5%] whitespace-nowrap text-[1.05vw] font-bold leading-[1.1] text-text-primary/40 max-md:text-[2vw] max-sm:text-[3.2vw]">
                    EAST<br>
                    AFRICA
                </span>
            </div>

            <!-- POINTER CARDS: DOTTED SVG -->
            <div
                class="pointer-card pointer-1 absolute left-[46%] top-[33%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:left-[10%] md:top-[40%] md:w-[25vw] sm:left-[5%] sm:top-[50%] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="488"
                data-node-cy="241"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Muhanga
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div
                class="pointer-card pointer-2 absolute left-[32%] top-[16%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="423"
                data-node-cy="48"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Musanze
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div
                class="pointer-card pointer-3 absolute left-[48%] top-[60%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="476"
                data-node-cy="369"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Ruhango
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div
                class="pointer-card pointer-4 absolute left-[44%] top-[13%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="610"
                data-node-cy="29"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Gatuna
                </h3>
                <p>Uganda PoP</p>
            </div>

            <div
                class="pointer-card pointer-5 absolute left-[60%] top-[45%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="708"
                data-node-cy="257"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Kigali
                </h3>
                <p>Data Center Presence</p>
            </div>

            <div
                class="pointer-card pointer-6 absolute left-[21%] top-[36%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="243"
                data-node-cy="167"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Rubavu
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div
                class="pointer-card pointer-7 absolute left-[13%] top-[61%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="74"
                data-node-cy="539"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                   Rusizi 
                </h3>
                <p>DRC PoP</p>
            </div>

            <div
                class="pointer-card pointer-8 absolute left-[10%] top-[70%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="27"
                data-node-cy="563"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                Bukavu
                </h3>
                <p>Rwanda / DRC Route</p>
            </div>

            <div
                class="pointer-card pointer-9 absolute left-[19%] top-[48%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="223"
                data-node-cy="303"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Karongi
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div
                class="pointer-card pointer-10 absolute left-[18%] top-[21%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="dotted"
                data-node-cx="188"
                data-node-cy="101"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Goma
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <!-- POINTER CARDS: CIRCLE SVG -->
            <div
                class="pointer-card pointer-11 absolute left-[66%] top-[4%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="circle"
                data-node-cx="138"
                data-node-cy="58"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                Kagitumba
                </h3>
                <p>DRC PoP</p>
            </div>

            <div
                class="pointer-card pointer-12 absolute left-[68%] top-[69%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="circle"
                data-node-cx="226"
                data-node-cy="602"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Rusumo
                </h3>
                <p>DRC PoP</p>
            </div>

            <div
                class="pointer-card pointer-13 absolute left-[69%] top-[14%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="circle"
                data-node-cx="353"
                data-node-cy="12"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                   Kampala
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div
                class="pointer-card pointer-14 absolute left-[83%] top-[3%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="circle"
                data-node-cx="533"
                data-node-cy="114"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                Nairobi
                </h3>
                <p>Kenya PoP</p>
            </div>

            <div
                class="pointer-card pointer-15 absolute left-[84%] top-[23%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="circle"
                data-node-cx="605.609"
                data-node-cy="320.61"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                Mombasa
                </h3>
                <p>Kenya PoP</p>
            </div>

            <div
                class="pointer-card pointer-16 absolute left-[84%] top-[56%] z-[100] flex h-fit min-w-[10vw] w-[12vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/60 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]"
                data-node-layer="circle"
                data-node-cx="484.609"
                data-node-cy="552.61"
            >
                <h3 class="font-subheading text-24 text-text-primary md:text-lg sm:text-base">
                    Dar Es Salaam
                </h3>
                <p>Tanzania PoP</p>
            </div>
        </div>
    </div>
</section>
