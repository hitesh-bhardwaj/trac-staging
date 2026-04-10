<?php
if (!defined('ABSPATH')) {
    exit();
}

$impact_gallery_images = $args['impact_gallery_images'] ?? [];
?>

<section class="impact-gallery-section" data-section="impact-gallery">
    <div class="impact-gallery-stage">
        <div class="impact-gallery-sticky">
            <div class="impact-gallery-header">
                <div class="impact-gallery-label" data-animate="fade-up">
                    <span class="impact-gallery-label__line" aria-hidden="true"></span>
                    <span class="impact-gallery-label__text">Image Gallery</span>
                </div>

                <h2 class="impact-gallery-title pt-[7vw]" data-animate="fade-up" data-delay="0.1">
                    <span class="impact-gallery-title__secondary">Impact in Action</span>
                </h2>
            </div>

            <div class="impact-gallery-canvas">
                <?php foreach ($impact_gallery_images as $index => $image): ?>
                    <figure
                        class="impact-gallery-image impact-gallery-image--<?php echo esc_attr($index + 1); ?>"
                        data-impact-image
                        data-impact-index="<?php echo esc_attr($index); ?>"
                    >
                        <img
                            src="<?php echo esc_url($image); ?>"
                            alt=""
                            class="impact-gallery-image__img"
                            loading="lazy"
                        >
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
