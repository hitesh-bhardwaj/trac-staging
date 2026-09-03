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
        "value" => "14",
        "suffix" => "",
        "label" => __("YEARS OF OPERATION", "trac"),
    ],
    [
        "value" => "400",
        "suffix" => "+",
        "label" => __("BUSINESS LOCATIONS CONNECTED ", "trac"),
    ],
    [
        "value" => "99.9",
        "suffix" => "%",
        "label" => __("NETWORK AVAILABILITY", "trac"),
    ],
];
?>

<section class="who-we-are-section relative overflow-hidden bg-white py-[7vw]" data-section="who-we-are">
    <div class="who-we-are-container w-full flex flex-col items-center space-y-[7vw] px-[5vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="who-we-are-intro w-full flex justify-start gap-[10vw] items-start md:flex-col md:gap-8">
            <div class="who-we-are-label flex shrink-0 items-center gap-[0.833vw] whitespace-nowrap md:gap-3" data-animate="fade-up">
                <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>
                <span class="font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                    <?php esc_html_e("Who We Are", "trac"); ?>
                </span>
            </div>
             <p data-para-anim class="hero-subtitle-1 text-center font-heading text-36 leading-[1.35] text-text-primary md:text-left md:text-[28px] sm:text-[20px]">
            We’re a leading provider of telecommunications Africa
        </p>
        </div>

        

       

        <div data-animate="fade-up" class="counter flex w-full justify-center" data-counter-section>
            <div class="counter-grid grid w-full max-w-[72vw] grid-cols-3 gap-[3.5vw] md:max-w-full md:grid-cols-1 md:gap-10">
                <?php foreach ($who_we_are_stats as $index => $stat): ?>
                    <article
                        class="counter-item relative flex flex-col items-center text-center<?php echo $index < count($who_we_are_stats) - 1
                            ? " has-divider"
                            : ""; ?>"
                    >
                        <div class="counter-value-wrap mb-[1.25vw] flex items-baseline justify-center text-brand-primary-alt md:mb-4">
                            <div
                                class="counter-value"
                                aria-label="<?php echo esc_attr(
                                    $stat["value"] . ($stat["suffix"] ?? "")
                                ); ?>"
                            >
                                <?php foreach (str_split($stat["value"]) as $digit_index => $character): ?>
                                    <?php if (!ctype_digit($character)): ?>
                                        <span class="counter-static-char" aria-hidden="true"><?php echo esc_html($character); ?></span>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <?php
                                    $digit = (int) $character;
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

                                <?php if (!empty($stat["suffix"])): ?>
                                    <span class="counter-suffix" data-counter-fade>
                                        <?php echo esc_html($stat["suffix"]); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <p data-para-anim class="counter-label whitespace-nowrap font-body text-[1.15vw] leading-[1] text-text-body md:whitespace-normal md:text-[24px] sm:text-[18px]">
                            <?php echo esc_html($stat["label"]); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
