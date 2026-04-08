<?php
/**
 * Features Section Template
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get ACF fields
$eyebrow = get_sub_field('eyebrow');
$title = get_sub_field('title');
$description = get_sub_field('description');
$features = get_sub_field('features');
$layout = get_sub_field('layout') ?: 'grid-3';
$background = get_sub_field('background') ?: 'white';

// Background classes
$bg_classes = [
    'white' => 'bg-white text-neutral-900',
    'light' => 'bg-neutral-50 text-neutral-900',
    'dark' => 'bg-neutral-950 text-white',
];

$section_class = $bg_classes[$background] ?? $bg_classes['white'];

// Grid classes based on layout
$grid_classes = [
    'grid-3' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
    'grid-2' => 'grid-cols-1 md:grid-cols-2',
    'list' => 'grid-cols-1 max-w-3xl mx-auto',
];

$grid_class = $grid_classes[$layout] ?? $grid_classes['grid-3'];
?>

<section id="content" class="section features <?php echo esc_attr(
    $section_class,
); ?>" data-section="features">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <?php if ($eyebrow || $title || $description): ?>
            <header class="section-header text-center max-w-3xl mx-auto mb-16">
                <?php if ($eyebrow): ?>
                    <p class="section-eyebrow text-brand-primary text-body-sm font-semibold uppercase tracking-wider mb-4" data-animate="fade-up">
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="section-title text-heading-1 font-heading font-bold mb-4" data-animate="fade-up" data-delay="0.1">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description): ?>
                    <p class="section-description text-body-lg <?php echo $background ===
                    'dark'
                        ? 'text-neutral-400'
                        : 'text-neutral-600'; ?>" data-animate="fade-up" data-delay="0.2">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php endif; ?>
            </header>
        <?php endif; ?>

        <!-- Features Grid -->
        <?php if ($features): ?>
            <div class="features-grid grid <?php echo esc_attr(
                $grid_class,
            ); ?> gap-8 stagger-children">
                <?php foreach ($features as $index => $feature): ?>
                    <div class="feature-item <?php echo $layout === 'list'
                        ? 'flex gap-6'
                        : 'text-center'; ?>">
                        <?php if ($feature['icon']): ?>
                            <div class="feature-icon <?php echo $layout ===
                            'list'
                                ? 'flex-shrink-0'
                                : 'mx-auto mb-6'; ?> w-16 h-16 flex items-center justify-center rounded-2xl <?php echo $background ===
 'dark'
     ? 'bg-neutral-800'
     : 'bg-brand-primary/10'; ?>">
                                <img
                                    src="<?php echo esc_url(
                                        $feature['icon']['url'],
                                    ); ?>"
                                    alt=""
                                    class="w-8 h-8 object-contain"
                                    loading="lazy"
                                />
                            </div>
                        <?php endif; ?>

                        <div class="feature-content">
                            <?php if ($feature['title']): ?>
                                <h3 class="feature-title text-heading-3 font-heading font-semibold mb-3">
                                    <?php echo esc_html($feature['title']); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($feature['description']): ?>
                                <p class="feature-description <?php echo $background ===
                                'dark'
                                    ? 'text-neutral-400'
                                    : 'text-neutral-600'; ?>">
                                    <?php echo wp_kses_post(
                                        $feature['description'],
                                    ); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($feature['link']): ?>
                                <a
                                    href="<?php echo esc_url(
                                        $feature['link']['url'],
                                    ); ?>"
                                    class="inline-flex items-center gap-2 mt-4 text-brand-primary font-semibold hover:gap-3 transition-all"
                                    <?php echo $feature['link']['target']
                                        ? 'target="_blank" rel="noopener noreferrer"'
                                        : ''; ?>
                                >
                                    <?php echo esc_html(
                                        $feature['link']['title'],
                                    ); ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
