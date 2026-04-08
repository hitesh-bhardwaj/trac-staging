<?php
/**
 * Content Section Template
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get ACF fields
$layout = get_sub_field('layout') ?: 'text-image';
$eyebrow = get_sub_field('eyebrow');
$title = get_sub_field('title');
$content = get_sub_field('content');
$image = get_sub_field('image');
$cta = get_sub_field('cta');
$background = get_sub_field('background') ?: 'white';

// Background classes
$bg_classes = [
    'white' => 'bg-white text-neutral-900',
    'light' => 'bg-neutral-50 text-neutral-900',
    'dark' => 'bg-neutral-950 text-white',
];

$section_class = $bg_classes[$background] ?? $bg_classes['white'];

// Image position based on layout
$image_order = $layout === 'image-text' ? 'lg:order-first' : 'lg:order-last';
?>

<section class="section content-section <?php echo esc_attr(
    $section_class,
); ?>" data-section="content">
    <div class="container mx-auto px-4">
        <?php if ($layout === 'text-only'): ?>
            <!-- Text Only Layout -->
            <div class="max-w-3xl mx-auto text-center">
                <?php if ($eyebrow): ?>
                    <p class="text-brand-primary text-body-sm font-semibold uppercase tracking-wider mb-4" data-animate="fade-up">
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="text-heading-1 font-heading font-bold mb-6" data-animate="fade-up" data-delay="0.1">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div class="prose prose-lg <?php echo $background === 'dark'
                        ? 'prose-invert'
                        : ''; ?> mx-auto" data-animate="fade-up" data-delay="0.2">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>

                <?php if ($cta): ?>
                    <div class="mt-8" data-animate="fade-up" data-delay="0.3">
                        <a
                            href="<?php echo esc_url($cta['url']); ?>"
                            class="btn btn-primary btn-lg"
                            <?php echo $cta['target']
                                ? 'target="_blank" rel="noopener noreferrer"'
                                : ''; ?>
                        >
                            <?php echo esc_html($cta['title']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <!-- Text + Image Layout -->
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Text Column -->
                <div class="content-text">
                    <?php if ($eyebrow): ?>
                        <p class="text-brand-primary text-body-sm font-semibold uppercase tracking-wider mb-4" data-animate="fade-up">
                            <?php echo esc_html($eyebrow); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <h2 class="text-heading-1 font-heading font-bold mb-6" data-animate="fade-up" data-delay="0.1">
                            <?php echo wp_kses_post($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($content): ?>
                        <div class="prose prose-lg <?php echo $background ===
                        'dark'
                            ? 'prose-invert'
                            : ''; ?>" data-animate="fade-up" data-delay="0.2">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($cta): ?>
                        <div class="mt-8" data-animate="fade-up" data-delay="0.3">
                            <a
                                href="<?php echo esc_url($cta['url']); ?>"
                                class="btn btn-primary"
                                <?php echo $cta['target']
                                    ? 'target="_blank" rel="noopener noreferrer"'
                                    : ''; ?>
                            >
                                <?php echo esc_html($cta['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Image Column -->
                <?php if ($image): ?>
                    <div class="content-image <?php echo esc_attr(
                        $image_order,
                    ); ?>" data-animate="fade-<?php echo $layout ===
'image-text'
    ? 'right'
    : 'left'; ?>">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img
                                src="<?php echo esc_url(
                                    $image['sizes']['card-lg'] ?? $image['url'],
                                ); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>"
                                class="w-full h-auto"
                                loading="lazy"
                            />
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
