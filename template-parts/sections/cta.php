<?php
/**
 * CTA Section Template
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get ACF fields
$title = get_sub_field('title');
$description = get_sub_field('description');
$button = get_sub_field('button');
$background = get_sub_field('background') ?: 'primary';

// Background classes
$bg_classes = [
    'primary' => 'bg-brand-primary text-white',
    'secondary' => 'bg-brand-secondary text-neutral-900',
    'dark' => 'bg-neutral-950 text-white',
    'gradient' =>
        'bg-gradient-to-r from-brand-primary to-brand-secondary text-white',
];

$section_class = $bg_classes[$background] ?? $bg_classes['primary'];

// Button style based on background
$btn_classes = [
    'primary' => 'bg-white text-brand-primary hover:bg-neutral-100',
    'secondary' => 'bg-neutral-900 text-white hover:bg-neutral-800',
    'dark' => 'bg-brand-primary text-white hover:bg-brand-primary/90',
    'gradient' => 'bg-white text-brand-primary hover:bg-neutral-100',
];

$btn_class = $btn_classes[$background] ?? $btn_classes['primary'];
?>

<section class="section cta <?php echo esc_attr(
    $section_class,
); ?>" data-section="cta">
    <div class="container mx-auto px-4">
        <div class="cta-content text-center max-w-3xl mx-auto">
            <?php if ($title): ?>
                <h2 class="cta-title text-heading-1 font-heading font-bold mb-4" data-animate="fade-up">
                    <?php echo wp_kses_post($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <p class="cta-description text-body-lg opacity-90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                    <?php echo wp_kses_post($description); ?>
                </p>
            <?php endif; ?>

            <?php if ($button): ?>
                <div data-animate="fade-up" data-delay="0.2">
                    <a
                        href="<?php echo esc_url($button['url']); ?>"
                        class="btn btn-lg <?php echo esc_attr(
                            $btn_class,
                        ); ?> magnetic"
                        <?php echo $button['target']
                            ? 'target="_blank" rel="noopener noreferrer"'
                            : ''; ?>
                    >
                        <?php echo esc_html($button['title']); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
