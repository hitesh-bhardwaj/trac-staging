<?php
if (!defined("ABSPATH")) {
    exit();
}

$network_line_svg_path =
    get_template_directory() . "/src/imgs/line-network.svg";
$network_dotted_lines_svg_path =
    get_template_directory() . "/src/imgs/dotted-network-path.svg";
$network_dotted_lines_svg_path_line =
    get_template_directory() . "/src/imgs/dotted-network-path-line.svg";
$network_circle_lines_svg_path =
    get_template_directory() . "/src/imgs/circle-network.svg";
$network_circle_lines_svg_path_line =
    get_template_directory() . "/src/imgs/circle-network-dotted-line.svg";
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
            class="relative mt-[7vw] h-[55vw] w-screen overflow-hidden md:mt-8 md:h-[60vw] sm:mt-6 sm:h-[80vw]"
        >
            <img
                src="<?php echo esc_url(
                    get_template_directory_uri() . "/src/imgs/network-img.png"
                ); ?>"
                alt="TrAC network map"
                class="h-full w-full object-cover"
                loading="lazy"
            >

            <div class="absolute inset-0 left-[52%] top-[45%] z-50 size-[5vw]">
                <img
                    src="<?php echo esc_url(
                        get_template_directory_uri() .
                            "/src/imgs/data-center.png"
                    ); ?>"
                    alt="Data center"
                    class="h-full w-full object-cover"
                    loading="lazy"
                >
            </div>

            <div class="absolute inset-0 left-[10%] top-[20%] z-50 h-fit w-[10vw] text-start font-medium uppercase">
                democratic republic of the congo
            </div>

            <div class="absolute inset-0 left-[50%] top-[10%] z-50 h-fit w-[10vw] text-start font-medium uppercase">
                UGANDA
            </div>

            <div class="absolute inset-0 left-[50%] top-[90%] z-50 h-fit w-[10vw] text-start font-medium uppercase">
                BURUNDI
            </div>

            <div class="absolute inset-0 left-[80%] top-[85%] z-50 flex h-fit w-[20vw] flex-col gap-[1vw] text-start font-medium uppercase">
                <div class="flex items-center gap-[0.5vw]">
                    <div class="h-auto w-[3vw]">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    "/src/imgs/fiber-cable.png"
                            ); ?>"
                            alt="fiber cable"
                            class="h-full w-full object-contain"
                            loading="lazy"
                        >
                    </div>
                    <p>Fiber Cable</p>
                </div>

                <div class="flex items-center gap-[0.5vw]">
                    <div class="h-[1px] w-[3vw] bg-black"></div>
                    <p>Wireless Internet</p>
                </div>
            </div>

            <div class="absolute inset-0 left-[75%] top-[70%] z-50 h-fit w-[10vw] text-start font-medium uppercase">
                tanzania
            </div>

            <div class="absolute inset-0 left-[37%] top-[47%] z-50 h-fit w-fit text-start font-medium uppercase">
                RWANDA
            </div>

            <div class="absolute inset-0 flex items-center justify-center">
                <div
                    class="relative h-[44vw] w-[50vw] md:h-[44vw] md:w-[66vw] sm:h-[58vw] sm:w-[88vw]"
                >
                    <img
                        src="<?php echo esc_url(
                            get_template_directory_uri() .
                                "/src/imgs/network-map-center.png"
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
                      
                        class="absolute inset-0 left-[1%] top-[10.5%] z-40 h-full w-[42vw] our-network-draw-layer"
                        data-network-draw="dotted"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_dotted_lines_svg_path)) {
                            echo file_get_contents(
                                $network_dotted_lines_svg_path
                            );
                        } ?>
                    </div>
                    <div
                        data-animate="fade"
                       data-delay="0.8"
                        class="absolute inset-0 left-[1%] top-[10.5%] z-30 h-full w-[42vw] our-network-draw-layer"
                        data-network-draw="dotted"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_dotted_lines_svg_path_line)) {
                            echo file_get_contents(
                                $network_dotted_lines_svg_path_line
                            );
                        } ?>
                    </div>

                    <div
                       
                        class="absolute inset-0 left-[63%] top-[-12.7%] z-40 h-full w-[30vw] our-network-draw-layer"
                        data-network-draw="circle"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_circle_lines_svg_path)) {
                            echo file_get_contents(
                                $network_circle_lines_svg_path
                            );
                        } ?>
                    </div>
                    <div
                       data-animate="fade"
                       data-delay="0.8"
                        class="absolute inset-0 left-[63%] top-[-12.7%] z-30 h-full w-[30vw] our-network-draw-layer"
                        data-network-draw="circle"
                        aria-hidden="true"
                    >
                        <?php if (file_exists($network_circle_lines_svg_path_line )) {
                            echo file_get_contents(
                                $network_circle_lines_svg_path_line 
                            );
                        } ?>
                    </div>
                </div>
            </div>

            <!-- POINTER CARDS -->
            <div class="pointer-card pointer-1 absolute left-[58%] top-[38%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:left-[10%] md:top-[40%] md:w-[25vw] sm:left-[5%] sm:top-[50%] sm:w-[40vw]">
                 <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Kigali
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div class="pointer-card pointer-2 absolute left-[53%] top-[5%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                   Kagitumba
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div class="pointer-card pointer-3 absolute left-[67%] top-[52%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                 <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Rusumo
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div class="pointer-card pointer-4 absolute left-[74%] top-[0%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
               <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Kampala
                </h3>
                <p>Uganda PoP</p>
            </div>

            <div class="pointer-card pointer-5 absolute left-[83%] top-[10%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                 <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                   Nairobi
                </h3>
                <p>Kenya PoP</p>
            </div>

            <div class="pointer-card pointer-6 absolute left-[82%] top-[10%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                   Nairobi
                </h3>
                <p>Kenya PoP</p>
            </div>

            <div class="pointer-card pointer-7 absolute left-[86%] top-[28%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
               <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Mombasa
                </h3>
                <p>Kenya PoP</p>
            </div>

            <div class="pointer-card pointer-8 absolute left-[87%] top-[29%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Mombasa
                </h3>
                <p>Kenya PoP</p>
            </div>

            <div class="pointer-card pointer-9 absolute left-[83%] top-[56%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Dar Es Salaam
                </h3>
                <p>Tanzania PoP</p>
            </div>

            <div class="pointer-card pointer-10 absolute left-[23%] top-[33%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                   Rubavu
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div class="pointer-card pointer-11 absolute left-[33%] top-[21%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                 <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Musanze
                </h3>
                <p>Rwanda PoP</p>
            </div>

            <div class="pointer-card pointer-12 absolute left-[45%] top-[23%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Gatuna
                </h3>
                <p>Rwanda PoP</p>
            </div>
            <div class="pointer-card pointer-13 absolute left-[37%] top-[45%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Ruhango
                </h3>
                <p>Rwanda PoP</p>
            </div>
            <div class="pointer-card pointer-14 absolute left-[35%] top-[59%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Point 14
                </h3>
                <p>Rwanda PoP</p>
            </div>
            <div class="pointer-card pointer-15 absolute left-[47%] top-[70%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Point 15
                </h3>
                <p>Rwanda PoP</p>
            </div>
            <div class="pointer-card pointer-16 absolute left-[29%] top-[66%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Point 16
                </h3>
                <p>Rwanda PoP</p>
            </div>
            <div class="pointer-card pointer-17 absolute left-[15%] top-[66%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                   Rusizi
                </h3>
                <p>Rwanda PoP</p>
            </div>
            <div class="pointer-card pointer-18 absolute left-[22%] top-[45%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Karongi
                </h3>
                <p>Rwanda PoP</p>
            </div>
            <div class="pointer-card pointer-19 absolute left-[22%] top-[45%] z-50 flex h-fit min-w-[10vw] w-fit max-w-[15vw] flex-col rounded-[1.2vw] border border-black/10 bg-white/20 p-[1vw] text-start opacity-0 invisible pointer-events-none backdrop-blur-md md:w-[25vw] sm:w-[40vw]">
                <h3 class="font-heading text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Karongi
                </h3>
                <p>Rwanda PoP</p>
            </div>
        </div>
    </div>
</section>