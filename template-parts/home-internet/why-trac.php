<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('hi_why_label') ?: 'Why TrAC';
$title = get_field('hi_why_title') ?: 'Internet That Just Works.';
$subtitle = get_field('hi_why_subtitle') ?: 'No buffering. No dropouts. No delays.';
$body =
    get_field('hi_why_body') ?:
    "TrAC delivers reliable home internet designed to keep your home connected, whether you're working, learning, or streaming.";

$items = [
    'Unlimited internet for everyday use',
    'Stable fibre connection',
    'Strong in-home Wi-Fi',
    'Clear pricing with no hidden costs',
    'Fast installation and setup',
    'Business-grade support when you need it',
];
?>

<section class="home-internet-why relative bg-[#eef3fc] overflow-hidden" data-section="home-internet-why" data-hi-why>
    <div class="w-full px-[5.21vw] py-[7vw] md:px-[4vw] md:py-20 sm:px-[6vw] sm:py-16">
        <div class="max-w-[92rem] mx-auto grid grid-cols-[minmax(0,1fr)_minmax(0,1fr)] gap-[6vw] items-start md:grid-cols-1 md:gap-12">
            <div class="max-w-[42rem]">
                <div class="flex items-center gap-3 mb-8 md:mb-6" data-animate="fade-up">
                    <span class="w-6 h-1 bg-brand-primary"></span>
                    <span class="font-body text-base text-[#111]"><?php echo esc_html(
                        $label,
                    ); ?></span>
                </div>

                <h2 class="font-heading text-[3.5vw] font-normal leading-[1.08] tracking-[0.01em] text-text-primary mb-[1.2vw] md:text-5xl md:mb-5 sm:text-4xl" data-heading-anim>
                    <?php echo esc_html($title); ?>
                </h2>

                <p class="font-body text-[1.25vw] leading-[1.5] text-text-primary mb-[2.2vw] md:text-lg md:mb-6 sm:text-base" data-para-anim data-delay="0.15">
                    <?php echo esc_html($subtitle); ?>
                </p>

                <p class="font-body text-[1.25vw] leading-[1.65] text-text-body max-w-[34rem] md:text-lg sm:text-base" data-para-anim data-delay="0.2">
                    <?php echo esc_html($body); ?>
                </p>
            </div>

            <div class="md:pt-0 pt-[3vw]">
                <ul class="flex flex-col items-start gap-[1.6vw] md:gap-5" aria-label="Home internet benefits">
                    <?php foreach ($items as $i => $text):
                        // A gentle cascade in layout like the reference (bigger shift for lower items).
                        $step = 1.6; // vw
                        // $mr = max(0, (5 - $i) * $step);
                        ?>
                        <li class="w-full flex justify-start" style="margin-right: <?php echo esc_attr(
                            $mr,
                        ); ?>vw;">
                            <div class="bg-white rounded-[1.2vw] md:rounded-2xl px-[2.1vw] py-[2.35vw] md:px-8 md:py-6 sm:px-6 sm:py-5 w-[34vw] md:w-full shadow-[0_16px_40px_rgba(16,65,127,0.06)] flex items-center gap-6"
                                 data-hi-why-item>
                                <span class="w-3 h-3 rounded-full bg-brand-primary shrink-0"></span>
                                <span class="font-body text-text-primary text-body-lg md:text-base sm:text-sm leading-[1.35]">
                                    <?php echo esc_html($text); ?>
                                </span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
