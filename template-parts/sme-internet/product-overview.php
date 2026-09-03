<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<?php
$label = get_field('sme_overview_label') ?: 'Product Overview';
$title = get_field('sme_overview_title') ?: 'Built for Everyday Business';
$subtitle =
    get_field('sme_overview_subtitle') ?:
    'When your internet goes down, your business slows down.';
$subtitle_2 =
    get_field('sme_overview_footer') ?:
    'TrAC SME Internet is designed to keep your operations running - from transactions and video calls to cloud-based systems.';

$icon_base = get_template_directory_uri() . '/src/imgs/sme-internet/';

$cards = [
    [
        'text' => 'Stable fibre connectivity',
        'icon' => $icon_base . 'product-icon-1.svg',
    ],
    [
        'text' => 'Strong performance for POS and cloud systems',
        'icon' => $icon_base . 'product-icon-2.svg',
    ],
    [
        'text' => 'Reliable video conferencing',
        'icon' => $icon_base . 'product-icon-3.svg',
    ],
    [
        'text' => 'VAT-inclusive pricing',
        'icon' => $icon_base . 'product-icon-7.svg',
    ],
    [
        'text' => 'Priority business support',
        'icon' => $icon_base . 'product-icon-6.svg',
    ],
    [
        'text' => '24/7 monitoring',
        'icon' => $icon_base . 'product-icon-5.svg',
    ],
];
?>

<section class="sme-overview relative overflow-hidden bg-brand-tint py-[8vw] md:py-20 sm:py-16" data-section="sme-overview">
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
                    <div class="rounded-[1.042vw] md:rounded-2xl bg-[color:var(--color-brand-tertiary)] p-[1.8vw] md:p-8 sm:p-6 flex flex-col items-start justify-between h-[12vw] gap-[1.4vw] md:gap-6" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.06 * $i,
                    ); ?>">
                        <img
                            src="<?php echo esc_url($c['icon']); ?>"
                            alt=""
                            class="size-[3.5vw] md:w-10 md:h-10 sm:w-9 sm:h-9 object-contain"
                            loading="lazy"
                        >
                        <p class="font-body text-white text-24 md:text-lg sm:text-base leading-[1.35] w-[70%]">
                            <?php echo esc_html($c['text']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#E86224" data-line-color="#10417F33"></canvas>
</section>
