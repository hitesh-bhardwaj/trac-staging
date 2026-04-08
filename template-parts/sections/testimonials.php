<?php
/**
 * Testimonials Section Template
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get ACF fields
$title = get_sub_field('title');
$testimonials = get_sub_field('testimonials');
$background = get_sub_field('background') ?: 'light';

// Background classes
$bg_classes = [
    'white' => 'bg-white text-neutral-900',
    'light' => 'bg-neutral-50 text-neutral-900',
];

$section_class = $bg_classes[$background] ?? $bg_classes['light'];

// Determine grid layout based on testimonial count
$count = count($testimonials ?? []);
$grid_cols =
    $count === 1
        ? 'max-w-2xl mx-auto'
        : ($count === 2
            ? 'md:grid-cols-2'
            : 'md:grid-cols-2 lg:grid-cols-3');
?>

<section class="section testimonials <?php echo esc_attr(
    $section_class,
); ?>" data-section="testimonials">
    <div class="container mx-auto px-4">
        <?php if ($title): ?>
            <h2 class="text-heading-1 font-heading font-bold text-center mb-12" data-animate="fade-up">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($testimonials): ?>
            <div class="testimonials-grid grid grid-cols-1 <?php echo esc_attr(
                $grid_cols,
            ); ?> gap-8 stagger-children">
                <?php foreach ($testimonials as $testimonial): ?>
                    <article class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                        <!-- Quote Icon -->
                        <svg class="w-10 h-10 text-brand-primary/20 mb-4" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-1.1.9-2 2-2V8zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-1.1.9-2 2-2V8z"/>
                        </svg>

                        <!-- Quote -->
                        <blockquote class="testimonial-quote text-body-lg text-neutral-700 mb-6">
                            "<?php echo wp_kses_post($testimonial['quote']); ?>"
                        </blockquote>

                        <!-- Author -->
                        <footer class="testimonial-author flex items-center gap-4">
                            <?php if ($testimonial['avatar']): ?>
                                <img
                                    src="<?php echo esc_url(
                                        $testimonial['avatar']['sizes'][
                                            'thumbnail'
                                        ] ?? $testimonial['avatar']['url'],
                                    ); ?>"
                                    alt="<?php echo esc_attr(
                                        $testimonial['author'],
                                    ); ?>"
                                    class="w-12 h-12 rounded-full object-cover"
                                    loading="lazy"
                                />
                            <?php else: ?>
                                <div class="w-12 h-12 rounded-full bg-brand-primary/10 flex items-center justify-center">
                                    <span class="text-brand-primary font-semibold text-lg">
                                        <?php echo esc_html(
                                            substr(
                                                $testimonial['author'],
                                                0,
                                                1,
                                            ),
                                        ); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <div>
                                <cite class="not-italic font-semibold text-neutral-900">
                                    <?php echo esc_html(
                                        $testimonial['author'],
                                    ); ?>
                                </cite>
                                <?php if (
                                    $testimonial['role'] ||
                                    $testimonial['company']
                                ): ?>
                                    <p class="text-body-sm text-neutral-500">
                                        <?php
                                        $meta = [];
                                        if ($testimonial['role']) {
                                            $meta[] = $testimonial['role'];
                                        }
                                        if ($testimonial['company']) {
                                            $meta[] = $testimonial['company'];
                                        }
                                        echo esc_html(implode(', ', $meta));
                                        ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </footer>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
