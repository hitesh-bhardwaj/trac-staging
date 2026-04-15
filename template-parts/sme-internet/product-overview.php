<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<?php
$label = get_field('sme_overview_label') ?: 'Product Overview';
$title = get_field('sme_overview_title') ?: 'Product Overview';
$subtitle =
    get_field('sme_overview_subtitle') ?:
    'TrAC SME Internet is designed to support how modern businesses work consistently and without interruptions.';
$footer =
    get_field('sme_overview_footer') ?:
    'This is internet built to keep your business moving.';

$cards = [
    [
        'icon' => get_template_directory_uri() . '/src/imgs/sme-internet/product-icon-1.svg',
        'text' => 'Stable fibre connectivity for daily operations',
    ],
    [
        'icon' => get_template_directory_uri() . '/src/imgs/sme-internet/product-icon-2.svg',
        'text' => 'Reliable performance for POS and cloud tools',
    ],
    [
        'icon' => get_template_directory_uri() . '/src/imgs/sme-internet/product-icon-3.svg',
        'text' => 'Smooth video conferencing and team collaboration',
    ],
    [
        'icon' => get_template_directory_uri() . '/src/imgs/sme-internet/product-icon-4.svg',
        'text' => 'Local support that responds when you need it',
    ],
];
?>

<section class="sme-overview relative overflow-hidden bg-[#eef3fc] py-[7vw] md:py-20 sm:py-16" data-section="sme-overview">
    <div class="relative z-[1] w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[92rem] mx-auto text-center">
            <div class="flex items-center justify-center gap-3 mb-8 md:mb-6" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-primary"></span>
                <span class="font-body text-base text-[#111]"><?php echo esc_html(
                    $label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[1.6vw] md:text-5xl md:mb-6 sm:text-4xl" data-heading-anim>
                <?php echo esc_html($title); ?>
            </h2>

            <p class="font-body text-[1.25vw] leading-[1.58] text-text-body max-w-[58rem] mx-auto mb-[3.2vw] md:text-lg md:mb-10 sm:text-base sm:mb-8" data-para-anim data-delay="0.2">
                <?php echo esc_html($subtitle); ?>
            </p>

            <div class="grid grid-cols-2 gap-[2.6vw] gap-x-[5.2vw] md:grid-cols-1 md:gap-8 text-left items-stretch max-w-[74rem] mx-auto mt-[5vw] md:mt-12">
                <?php foreach ($cards as $i => $c):
                    $is_active = $i === 0;
                    ?>
                    <div class="<?php echo esc_attr(
                        'bg-white rounded-[1.6vw] md:rounded-3xl p-[2.4vw] py-[2vw] md:p-10 sm:p-7 flex flex-col flex-nowrap items-start gap-[1.6vw] md:gap-6 transition-colors duration-300 border border-transparent hover:border-brand-primary'
                    ); ?>" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.06 * $i,
                    ); ?>">
                        <img src="<?php echo esc_url(
                            $c['icon'],
                        ); ?>" alt="" class="w-[4vw] h-[4vw] md:w-14 md:h-14 sm:w-12 sm:h-12 object-contain shrink-0">
                        <p class="font-body text-text-body text-[1.25vw] md:text-base sm:text-sm leading-[1.55] flex-1 min-w-0" data-para-anim>
                            <?php echo esc_html($c['text']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

            <p class="font-body text-text-body text-center text-[1.25vw] leading-[1.65] md:text-sm sm:text-xs mt-[3.6vw] md:mt-10 sm:mt-8" data-para-anim data-delay="0.25">
                <?php echo esc_html($footer); ?>
            </p>
        </div>
    </div>

    <canvas class="network-canvas-el absolute inset-0 h-full w-full"></canvas>
</section>
