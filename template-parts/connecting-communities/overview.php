<?php
if (!defined('ABSPATH')) {
    exit();
}

$overview_label = $args['overview_label'] ?? '';
$overview_title = $args['overview_title'] ?? '';
$overview_description = $args['overview_description'] ?? '';
$overview_image_left_url = $args['overview_image_left_url'] ?? '';
$overview_image_left_alt = $args['overview_image_left_alt'] ?? '';
$overview_image_right_url = $args['overview_image_right_url'] ?? '';
$overview_image_right_alt = $args['overview_image_right_alt'] ?? '';
?>

<section class="communities-overview relative bg-white px-[5.208vw] pt-[3%] pb-[8.333vw] md:px-[4vw] md:pb-24 sm:px-[6vw] sm:pb-16" data-section="communities-overview">
    <div class="communities-overview__header mx-auto max-w-[91.25vw] text-center">
        <div class="communities-overview__eyebrow mx-auto mb-14 inline-flex items-center gap-[1.042vw] md:mb-6 md:gap-4 sm:mb-4 sm:gap-3" data-animate="fade-up">
            <span class="communities-overview__eyebrow-line" aria-hidden="true"></span>
            <span class="communities-overview__eyebrow-text"><?php echo esc_html($overview_label); ?></span>
        </div>

        <h2 class="communities-overview__title mx-auto mb-[2.396vw] max-w-[63.333vw] md:mb-6 md:max-w-[90%] sm:mb-5 sm:max-w-full" data-animate="fade-up" data-delay="0.1">
            <?php echo esc_html($overview_title); ?>
        </h2>

        <div class="communities-overview__description mx-auto max-w-[55.156vw]" data-animate="fade-up" data-delay="0.2">
            <?php foreach (preg_split('/\R{2,}/', trim($overview_description)) as $paragraph): ?>
                <p><?php echo esc_html(trim($paragraph)); ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="communities-overview__media-grid mx-auto mt-[5.99vw] grid max-w-[81.25vw] grid-cols-2 gap-[1.615vw] md:mt-12 md:max-w-full md:gap-5 sm:mt-10 sm:grid-cols-1 sm:gap-4">
        <figure class="communities-overview__media-card" data-animate="fade-up" data-delay="0.25">
            <img
                src="<?php echo esc_url($overview_image_left_url); ?>"
                alt="<?php echo esc_attr($overview_image_left_alt); ?>"
                class="communities-overview__media-image"
                loading="lazy"
            >
        </figure>

        <figure class="communities-overview__media-card" data-animate="fade-up" data-delay="0.3">
            <img
                src="<?php echo esc_url($overview_image_right_url); ?>"
                alt="<?php echo esc_attr($overview_image_right_alt); ?>"
                class="communities-overview__media-image"
                loading="lazy"
            >
        </figure>
    </div>
</section>
