<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<?php
$label = get_field('hi_why_label') ?: 'Why TrAC';
$title = get_field('hi_why_title') ?: 'Internet You Can Rely On';
$subtitle =
    get_field('hi_why_subtitle') ?: 'No buffering. No dropouts. No delays.';
$subtitle_2 =
    get_field('hi_why_body') ?:
    "TrAC delivers reliable home internet designed to keep your home connected, whether you're working, learning, or streaming.";

$icon_base = get_template_directory_uri() . '/src/imgs/home-internet/';

$cards = [
    [
        'text' => 'Unlimited internet for everyday use',
        'icon' => $icon_base . 'why-trac-icon-1.svg',
    ],
    [
        'text' => 'Stable fibre connection',
        'icon' => $icon_base . 'why-trac-icon-2.svg',
    ],
    [
        'text' => 'Consistent in-home Wi-Fi',
        'icon' => $icon_base . 'why-trac-icon-3.svg',
    ],
    [
        'text' => 'Clear pricing with no hidden charges',
        'icon' => $icon_base . 'why-trac-icon-4.svg',
    ],
    [
        'text' => 'Fast installation',
        'icon' => $icon_base . 'why-trac-icon-5.svg',
    ],
    [
        'text' => '24/7 monitoring and local support',
        'icon' => $icon_base . 'why-trac-icon-6.svg',
    ],
];
?>

<section class="home-internet-why relative overflow-hidden bg-brand-tint py-[8vw] md:py-20 sm:py-16" data-section="home-internet-why">
    <div class="relative z-[1] w-full px-[9vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[92rem] mx-auto">
            <div class="flex items-center justify-start gap-3 mb-10 md:mb-5" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body text-brand-secondary text-30"><?php echo esc_html(
                    $label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[1.6vw] md:text-5xl md:mb-6 sm:text-4xl text-left" data-heading-anim>
                <?php echo esc_html($title); ?>
            </h2>

            <div class="max-w-[46rem] mb-[5vw] md:mb-10 sm:mb-8">
                <p class="font-body text-24 leading-[1.58] text-text-body md:text-lg sm:text-base" data-para-anim>
                    <?php echo esc_html($subtitle); ?>
                </p>
                <p class="font-body text-24 leading-[1.58] text-text-body mt-[1.4vw] md:mt-4 md:text-lg sm:text-base" data-para-anim data-delay="0.1">
                    <?php echo esc_html($subtitle_2); ?>
                </p>
            </div>

            <div class="grid grid-cols-3 gap-[3.5vw] md:grid-cols-2 md:gap-6 sm:grid-cols-1 sm:gap-4 items-stretch">
                <?php foreach ($cards as $i => $c): ?>
                    <div class="rounded-[1.042vw] md:rounded-2xl bg-brand-tertiary p-[1.8vw] md:p-8 sm:p-6 flex flex-col items-start justify-between h-[12vw] gap-[1.4vw] md:gap-6" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.06 * $i,
                    ); ?>">
                        <img
                            src="<?php echo esc_url($c['icon']); ?>"
                            alt=""
                            class="size-[3.5vw] md:w-10 md:h-10 sm:w-9 sm:h-9 object-contain"
                            loading="lazy"
                        >
                        <p class="font-body text-white text-24 md:text-lg sm:text-base leading-[1.35] w-[55%]">
                            <?php echo esc_html($c['text']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>
</section>
