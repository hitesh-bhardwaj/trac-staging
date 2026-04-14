<?php
if (!defined('ABSPATH')) {
    exit();
}

$hero_title = $args['hero_title'] ?? '';
$hero_subtitle = $args['hero_subtitle'] ?? '';
$hero_description = $args['hero_description'] ?? '';
$hero_image_url = $args['hero_image_url'] ?? '';
$hero_image_alt = $args['hero_image_alt'] ?? '';
?>

<section class="communities-hero relative w-full min-h-screen bg-white pt-[12vw] pb-[6.25vw] px-[5.208vw] md:pt-32 md:pb-16 md:px-[4vw] sm:pt-24 sm:pb-12 sm:px-[6vw]" data-section="communities-hero">
    <div class="hero-content text-center mb-[5.208vw] md:mb-16 sm:mb-12 space-y-[2vw]">
        <h1 class="hero-title font-heading hero-title-line leading-[1.08] tracking-[-0.04vw] text-[#111] max-w-[71.51vw] mx-auto md:text-6xl md:leading-[1.2] sm:text-4xl" data-hero-reveal>
            <?php echo esc_html($hero_title); ?>
        </h1>

        <?php if ($hero_subtitle): ?>
            <p class="hero-subtitle-1 !text-center font-body font-normal text-text-body w-[70%] max-w-[51.406vw] mx-auto md:max-w-full" data-hero-reveal data-hero-delay="0.08">
                <?php echo esc_html($hero_subtitle); ?>
            </p>
        <?php endif; ?>

        <?php if ($hero_description): ?>
            <p class="hero-description font-body text-[1.25vw] leading-[2.083vw] text-[#1e1e1e] max-w-[46.927vw] mx-auto md:text-xl md:leading-[1.6] md:max-w-[90%] sm:text-lg sm:leading-[1.5] sm:max-w-full" data-hero-reveal data-hero-delay="0.14">
                <?php echo esc_html($hero_description); ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="hero-image-wrapper relative bg-[#edecec] rounded-[2.083vw] overflow-hidden h-[30.99vw] max-w-[89.583vw] mx-auto md:rounded-3xl md:h-[400px] sm:rounded-2xl sm:h-[300px]" data-hero-reveal data-hero-delay="0.22">
        <img
            src="<?php echo esc_url($hero_image_url); ?>"
            alt="<?php echo esc_attr($hero_image_alt); ?>"
            class="absolute inset-0 w-full h-full object-cover"
            loading="lazy"
        >
    </div>
</section>
