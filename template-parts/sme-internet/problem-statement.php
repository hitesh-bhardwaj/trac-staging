<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('hi_why_label') ?: 'Problem Statement';
$title = get_field('hi_why_title') ?: 'When Your Internet Slows Down, Your Business Does Too';
$subtitle = get_field('hi_why_subtitle') ?: 'Your business depends on staying connected. But unreliable internet can disrupt everything:';
$footer = get_field('hi_why_footer') ?: 'These aren’t just technical issues—they impact your business performance.';

$items = [
    'Transactions failing during peak hours',
    'Video calls dropping mid-meeting',
    'Cloud systems slowing down operations',
    'Customers experiencing delays',
];
?>

<section class="sme-internet-problem relative overflow-hidden bg-white pt-[5vw] pb-[7vw] md:py-20 sm:py-16" data-section="sme-internet-problem" data-sme-problem>
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class=" mx-auto space-y-[3vw]">
            <div class="max-w-[60rem] mx-auto text-center">
                <div class="flex items-center justify-center text-center gap-3 mb-[3vw] md:mb-6" data-animate="fade-up">
                    <span class="w-6 h-1 bg-brand-primary"></span>
                    <span class="font-body text-base text-[#111] !text-[1.25vw]">
                        <?php echo esc_html($label); ?>
                    </span>
                </div>

                <h2 class="font-heading text-[3.5vw] font-normal leading-[1.08] tracking-[0.01em] text-text-primary mb-[1.2vw] md:text-5xl md:mb-5 sm:text-4xl" data-animate="fade-up" data-delay="0.1">
                    <?php echo esc_html($title); ?>
                </h2>

                <p class="font-body text-[1.25vw] mt-[6vw] leading-[1.5] text-text-primary mb-[2.2vw] md:text-lg md:mb-6 sm:text-base" data-para-anim data-delay="0.15">
                    <?php echo esc_html($subtitle); ?>
                </p>
            </div>

            <div class="md:pt-0 pt-[3vw] mx-auto w-full">
                <ul class="flex flex-col items-start gap-[1.6vw] md:gap-5 mx-auto max-w-[52rem] w-fit" aria-label="SME internet impact points">
                    <?php foreach ($items as $i => $text):
                        $num = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
                    ?>
                        <li class="w-full">
                            <div class="flex items-center gap-8 md:gap-6 w-full" data-sme-problem-item>
                                <span class="text-[2.6vw] md:text-3xl sm:text-2xl text-brand-primary font-body shrink-0 w-[4.8rem] text-right">
                                    <?php echo esc_html($num); ?>
                                </span>
                                <span class="font-body text-text-primary text-[1.25vw] md:text-base sm:text-sm leading-[1.35] text-left">
                                    <?php echo esc_html($text); ?>
                                </span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <p class="font-body text-[1.25vw] mt-[3vw] leading-[1.5] text-text-primary text-center mb-[2.2vw] md:text-lg md:mb-6 sm:text-base" data-para-anim data-delay="0.15">
                    <?php echo esc_html($footer); ?>
                </p>
            </div>
        </div>
    </div>
</section>
