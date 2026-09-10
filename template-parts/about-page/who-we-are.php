<?php
if (!defined('ABSPATH')) {
    exit();
}

$who_we_are_label = get_field('au_who_label');
$who_we_are_heading = get_field('au_who_heading');

$who_we_are_stats = [];
for ($i = 1; $i <= 3; $i++) {
    $who_we_are_stats[] = [
        'value' => get_field("au_stat_{$i}_value"),
        'suffix' => get_field("au_stat_{$i}_suffix"),
        'label' => get_field("au_stat_{$i}_label"),
    ];
}
?>

<section class="who-we-are-section relative overflow-hidden bg-white px-[5vw] py-[8vw] md:px-[7vw] sm:py-[15vw] md:py-[10%]" data-section="who-we-are">
    <div class="who-we-are-container w-full flex flex-col items-center space-y-[7vw]">
        <div class="who-we-are-intro w-full flex justify-start gap-[10vw] items-start md:flex-col md:gap-8">
            <div class="who-we-are-label flex shrink-0 items-center gap-[0.8vw] whitespace-nowrap md:gap-3" data-animate="fade-up">
                <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-5"></span>
                <span class="font-body text-30 text-brand-secondary sm:text-[4vw]">
                    <?php echo trac_esc_html($who_we_are_label); ?>
                </span>
            </div>
             <p data-para-anim class="text-center font-heading text-36 leading-[1.3] font-normal not-italic text-text-primary md:text-left sm:!text-[6vw]">
            <?php echo trac_esc_html($who_we_are_heading); ?>
        </p>
        </div>


        <div data-animate="fade-up" class="counter flex w-full justify-center" data-counter-section>
            <div class="counter-grid grid w-full max-w-[72vw] grid-cols-3 gap-[3.5vw] md:max-w-full md:grid-cols-1 md:gap-10 md:w-full">
                <?php foreach ($who_we_are_stats as $index => $stat): ?>
                    <article
                        class="counter-item relative flex flex-col items-center px-[1.5vw] text-center md:mt-10 md:flex-row md:justify-between md:px-0 <?php echo $index <
                        count($who_we_are_stats) - 1
                            ? ' has-divider after:absolute after:right-[-1.8vw] after:top-1/2 after:h-[12.2vw] after:w-[1.5px] after:-translate-y-1/2 after:bg-[#10417F] md:after:bottom-[-4vw] md:after:left-0 md:after:right-0 md:after:top-auto md:after:h-px md:after:w-full md:after:translate-y-0'
                            : ''; ?>"
                    >
                        <div class="counter-value-wrap mb-[1.2vw] flex items-baseline justify-center text-[#10417F] md:mb-4">
                            <div
                                class="inline-flex items-baseline font-heading text-[5.5vw] leading-none font-normal text-[#10417F] lg:text-[92px] sm:text-[45px]"
                                aria-label="<?php echo esc_attr(
                                    $stat['value'] . ($stat['suffix'] ?? ''),
                                ); ?>"
                            >
                                <?php foreach (
                                    str_split((string) $stat['value'])
                                    as $digit_index => $character
                                ): ?>
                                    <?php if (!ctype_digit($character)): ?>
                                        <span class="inline-flex items-center h-[1em] font-[inherit] leading-none text-[#10417F]" aria-hidden="true"><?php echo trac_esc_html(
                                            $character,
                                        ); ?></span>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <?php
                                    $digit = (int) $character;
                                    $reel_numbers = [];

                                    for ($loop = 0; $loop < 3; $loop++) {
                                        for (
                                            $number = 0;
                                            $number <= 9;
                                            $number++
                                        ) {
                                            $reel_numbers[] = $number;
                                        }
                                    }

                                    for (
                                        $number = 0;
                                        $number <= $digit;
                                        $number++
                                    ) {
                                        $reel_numbers[] = $number;
                                    }
                                    ?>
                                    <span
                                        class="relative inline-flex items-start h-[1em] overflow-hidden"
                                        aria-hidden="true"
                                    >
                                        <span
                                            class="flex flex-col items-center [will-change:transform]"
                                            data-digit-reel
                                            data-target-digit="<?php echo esc_attr(
                                                $digit,
                                            ); ?>"
                                            data-digit-index="<?php echo esc_attr(
                                                $digit_index,
                                            ); ?>"
                                            data-reel-loops="3"
                                        >
                                            <?php foreach (
                                                $reel_numbers
                                                as $reel_number
                                            ): ?>
                                                <span class="counter-digit flex h-[1em] items-center justify-center leading-none"><?php echo trac_esc_html(
                                                    $reel_number,
                                                ); ?></span>
                                            <?php endforeach; ?>
                                        </span>
                                    </span>
                                <?php endforeach; ?>

                                <?php if (!empty($stat['suffix'])): ?>
                                    <span class="inline-flex items-center h-[1em] font-[inherit] leading-none text-[#10417F]" data-counter-fade>
                                        <?php echo trac_esc_html($stat['suffix']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <p data-para-anim class="whitespace-nowrap font-body text-[1.1vw] leading-[1.45] text-text-body lg:max-w-none md:whitespace-normal md:text-[24px] md:text-right md:max-w-[45%] sm:text-[4vw]">
                            <?php echo trac_esc_html($stat['label']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
