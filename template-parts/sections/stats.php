<?php
/**
 * Stats Section Template
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get ACF fields
$title = get_sub_field('title');
$stats = get_sub_field('stats');
$background = get_sub_field('background') ?: 'dark';

// Background classes
$bg_classes = [
    'dark' => 'bg-neutral-950 text-white',
    'primary' => 'bg-brand-primary text-white',
    'light' => 'bg-neutral-50 text-neutral-900',
];

$section_class = $bg_classes[$background] ?? $bg_classes['dark'];
?>

<section class="section-sm stats <?php echo esc_attr(
    $section_class,
); ?>" data-section="stats">
    <div class="container mx-auto px-4">
        <?php if ($title): ?>
            <h2 class="text-heading-2 font-heading font-bold text-center mb-12" data-animate="fade-up">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($stats): ?>
            <div class="stats-grid grid grid-cols-2 lg:grid-cols-<?php echo count(
                $stats,
            ); ?> gap-8 lg:gap-12 stagger-children">
                <?php foreach ($stats as $stat): ?>
                    <div class="stat-item text-center">
                        <div class="stat-number text-display-2 font-heading font-bold text-brand-secondary mb-2" data-counter="<?php echo esc_attr(
                            preg_replace('/[^0-9]/', '', $stat['number']),
                        ); ?>">
                            <?php echo esc_html($stat['number']); ?>
                        </div>
                        <div class="stat-label text-body-lg opacity-80">
                            <?php echo esc_html($stat['label']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
