<?php
if (!defined("ABSPATH")) {
    exit();
}

$who_we_are_copy = [
    __(
        "Being on TrAC means being on the most resilient trans-African network available. Every aspect of the TrAC network is designed with protection in mind. Internet enters our network from three different providers across three different geographies.",
        "trac"
    ),
    __(
        "We operate in 14 countries across Africa, with a total population of 635 million. With low levels of digital and financial inclusion, the opportunity for growth and our ability to transform lives remains substantial.",
        "trac"
    ),
];

$who_we_are_slides = [
    [
        "title" => __("Seamless Connectivity. No Boundaries.", "trac"),
        "image" =>
            get_template_directory_uri() . "/src/imgs/about/slider-img.png",
        "alt" => __("Seamless connectivity across communities", "trac"),
    ],
    [
        "title" => __("Protected Infrastructure. Regional Reach.", "trac"),
        "image" => get_template_directory_uri() . "/src/imgs/service-1.png",
        "alt" => __("Regional digital infrastructure", "trac"),
    ],
    [
        "title" => __("Built For Access. Ready For Growth.", "trac"),
        "image" => get_template_directory_uri() . "/src/imgs/service-2.png",
        "alt" => __("Fiber network expansion", "trac"),
    ],
    [
        "title" => __("Local Presence. Continental Ambition.", "trac"),
        "image" => get_template_directory_uri() . "/src/imgs/service-3.png",
        "alt" => __("Network presence across Africa", "trac"),
    ],
];

$who_we_are_stats = [
    [
        "value" => "3",
        "suffix_top" => "RD",
        "label" => __("LARGEST TELECOM\nIN AFRICA", "trac"),
    ],
    [
        "value" => "60",
        "suffix_bottom" => "m",
        "label" => __("KILOMETERS OF\nFIBERS", "trac"),
    ],
    [
        "value" => "600",
        "label" => __("MILLION USERS", "trac"),
    ],
];
?>

<section class="who-we-are-section relative overflow-hidden bg-white pb-[7%] pt-[5%]" data-section="who-we-are">
    <div class="who-we-are-container w-full flex flex-col items-center space-y-[7vw] px-[5.21vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="who-we-are-intro  w-full flex justify-between items-start">
            <div class="who-we-are-label flex items-center gap-[0.833vw] md:gap-3" data-animate="fade-up">
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6 sm:w-5"></span>
                <span class="font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">
                    <?php esc_html_e("Who We Are", "trac"); ?>
                </span>
            </div>

            <div class="who-we-are-copy space-y-[2.5vw] md:space-y-6" >
                <?php foreach ($who_we_are_copy as $paragraph): ?>
                    <p data-para-anim data-delay="0.08" class="max-w-[48vw] font-body text-[1.406vw] leading-[1.45] text-text-body md:max-w-full md:text-[22px] md:leading-[1.5] sm:text-[17px]">
                        <?php echo esc_html($paragraph); ?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="who-we-are-slider-wrap w-full" data-animate="fade-up" data-delay="0.2">
            <div class="who-we-are-slider relative">
                <div class="who-we-are-track relative h-[32.292vw] overflow-hidden rounded-[1.875vw] md:h-[440px] md:rounded-[28px] sm:h-[300px] sm:rounded-[24px]">
                    <?php foreach ($who_we_are_slides as $index => $slide): ?>
                        <article
                            class="who-we-are-slide absolute inset-0"
                            data-slide-index="<?php echo esc_attr($index); ?>"
                            aria-hidden="<?php echo $index === 0
                                ? "false"
                                : "true"; ?>"
                        >
                            <img
                                src="<?php echo esc_url($slide["image"]); ?>"
                                alt="<?php echo esc_attr($slide["alt"]); ?>"
                                class="h-full w-full object-cover"
                                loading="<?php echo $index === 0
                                    ? "eager"
                                    : "lazy"; ?>"
                            >
                            <div class="who-we-are-slide-overlay absolute inset-0 bg-gradient-to-r from-[#0b1630]/55 via-[#0b1630]/15 to-transparent"></div>
                            <div class="who-we-are-slide-content absolute left-[4.167vw] top-[3.125vw] w-[40%] md:left-8 md:top-8 md:max-w-[320px] sm:left-6 sm:top-6 sm:max-w-[220px]">
                                <h2 class="font-heading font-normal text-[3.021vw] leading-[1.1] tracking-[-0.02em] text-white md:text-[46px] sm:text-[34px]">
                                    <?php echo esc_html($slide["title"]); ?>
                                </h2>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="who-we-are-pagination mt-[1.25vw] flex items-center justify-center gap-[0.521vw] md:mt-5 md:gap-2 sm:mt-4">
                    <?php foreach ($who_we_are_slides as $index => $slide): ?>
                        <button
                            class="who-we-are-dot<?php echo $index === 0
                                ? " is-active"
                                : ""; ?>"
                            type="button"
                            aria-label="<?php echo esc_attr(
                                sprintf(
                                    __("Go to slide %d", "trac"),
                                    $index + 1
                                )
                            ); ?>"
                            aria-pressed="<?php echo $index === 0
                                ? "true"
                                : "false"; ?>"
                            data-who-we-are-dot="<?php echo esc_attr(
                                $index
                            ); ?>"
                        ></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <p data-para-anim class="hero-subtitle-1 text-center font-body text-[1.875vw] leading-[1.35] text-text-primary md:text-[28px] sm:text-[20px]">
            We’re a leading provider of telecommunications in Africa
        </p>

        <div data-animate="fade-up" class="counter flex w-full justify-center" data-counter-section>
            <div class="counter-grid grid w-full max-w-[72vw] grid-cols-3 gap-[3.646vw] md:max-w-full md:grid-cols-1 md:gap-10">
                <?php foreach ($who_we_are_stats as $index => $stat): ?>
                    <article
                        class="counter-item relative flex flex-col items-center text-center<?php echo $index < count($who_we_are_stats) - 1
                            ? " has-divider"
                            : ""; ?>"
                    >
                        <div class="counter-value-wrap  flex items-start justify-center gap-[0.208vw] text-brand-primary md:mb-4 md:gap-1">
                            <div
                                class="counter-value flex overflow-hidden text-[3vw]"
                                aria-label="<?php echo esc_attr(
                                    str_replace("\n", " ", $stat["label"])
                                ); ?>"
                            >
                                <?php foreach (str_split($stat["value"]) as $digit_index => $digit): ?>
                                    <?php
                                    $digit = (int) $digit;
                                    $reel_numbers = [];

                                    for ($loop = 0; $loop < 3; $loop++) {
                                        for ($number = 0; $number <= 9; $number++) {
                                            $reel_numbers[] = $number;
                                        }
                                    }

                                    for ($number = 0; $number <= $digit; $number++) {
                                        $reel_numbers[] = $number;
                                    }
                                    ?>
                                    <span
                                        class="counter-digit-window"
                                        aria-hidden="true"
                                    >
                                        <span
                                            class="counter-digit-reel"
                                            data-digit-reel
                                            data-target-digit="<?php echo esc_attr(
                                                $digit
                                            ); ?>"
                                            data-digit-index="<?php echo esc_attr(
                                                $digit_index
                                            ); ?>"
                                            data-reel-loops="3"
                                        >
                                            <?php foreach ($reel_numbers as $reel_number): ?>
                                                <span class="counter-digit"><?php echo esc_html(
                                                    $reel_number
                                                ); ?></span>
                                            <?php endforeach; ?>
                                        </span>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                            <?php if (!empty($stat["suffix_top"])): ?>
                                <span class="counter-suffix counter-suffix-top" data-counter-fade>
                                    <?php echo esc_html($stat["suffix_top"]); ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($stat["suffix_bottom"])): ?>
                                <span class="counter-suffix counter-suffix-bottom mt-[-1vw]" data-counter-fade>
                                    <?php echo esc_html($stat["suffix_bottom"]); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <p data-para-anim class="counter-label whitespace-pre-line font-body text-[1.2vw] leading-[1] text-text-primary md:text-[24px] sm:text-[18px]">
                            <?php echo esc_html($stat["label"]); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
