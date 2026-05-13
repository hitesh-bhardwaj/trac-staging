<?php
if (!defined("ABSPATH")) {
    exit();
}

$who_we_are_copy = [
    __(
        "TrAC is a private, Rwanda-founded internet service provider with over 13 years of experience delivering reliable, high-performance connectivity. We enable businesses and communities to stay connected and grow with confidence, building strong relationships with the people and organisations we serve.",
        "trac"
    ),
];

$who_we_are_stats = [
    [
        "value" => "3",
        "suffix_top" => "RD",
        "label" => __("LARGEST TELECOM\nIN AFRICA", "trac"),
    ],
    [
        "value" => "60",
        "suffix_bottom" => "",
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
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-[#E86224] md:h-1 md:w-6 sm:w-5"></span>
                <span class="font-body text-[1.6vw] text-[#E86224] md:text-xl sm:text-lg">
                    <?php esc_html_e("Who We Are", "trac"); ?>
                </span>
            </div>

            <div class="who-we-are-copy space-y-[2.5vw] md:space-y-6" >
                <?php foreach ($who_we_are_copy as $paragraph): ?>
                    <p data-para-anim data-delay="0.08" class="max-w-[50vw] font-body text-[1.406vw] leading-[1.45] text-text-body md:max-w-full md:text-[22px] md:leading-[1.5] sm:text-[17px]">
                        <?php echo esc_html($paragraph); ?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>

        

        <p data-para-anim class="hero-subtitle-1 text-center font-body text-[1.875vw] leading-[1.35] text-text-primary md:text-[28px] sm:text-[20px]">
            We’re a leading provider of telecommunications Africa
        </p>

        <div data-animate="fade-up" class="counter flex w-full justify-center" data-counter-section>
            <div class="counter-grid grid w-full max-w-[72vw] grid-cols-3 gap-[3.646vw] md:max-w-full md:grid-cols-1 md:gap-10">
                <?php foreach ($who_we_are_stats as $index => $stat): ?>
                    <article
                        class="counter-item relative flex flex-col items-center text-center<?php echo $index < count($who_we_are_stats) - 1
                            ? " has-divider"
                            : ""; ?>"
                    >
                        <div class="counter-value-wrap  flex items-start justify-center gap-[0.208vw] text-brand-primary  md:mb-4 md:gap-1">
                            <div
                                class="counter-value flex overflow-hidden text-[3vw] leading-[1.5]"
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
