<?php
/**
 * Cards Section Template
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get ACF fields
$eyebrow = get_sub_field('eyebrow');
$title = get_sub_field('title');
$cards = get_sub_field('cards');
$columns = get_sub_field('columns') ?: '3';
$background = get_sub_field('background') ?: 'white';

// Background classes
$bg_classes = [
    'white' => 'bg-white text-neutral-900',
    'light' => 'bg-neutral-50 text-neutral-900',
    'dark' => 'bg-neutral-950 text-white',
];

$section_class = $bg_classes[$background] ?? $bg_classes['white'];

// Grid classes based on columns
$grid_classes = [
    '2' => 'md:grid-cols-2',
    '3' => 'md:grid-cols-2 lg:grid-cols-3',
    '4' => 'md:grid-cols-2 lg:grid-cols-4',
];

$grid_class = $grid_classes[$columns] ?? $grid_classes['3'];

// Card background based on section background
$card_bg = $background === 'dark' ? 'bg-neutral-900' : 'bg-white';
?>

<section class="section cards <?php echo esc_attr(
    $section_class,
); ?>" data-section="cards">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <?php if ($eyebrow || $title): ?>
            <header class="section-header text-center max-w-3xl mx-auto mb-12">
                <?php if ($eyebrow): ?>
                    <p class="text-brand-primary text-body-sm font-semibold uppercase tracking-wider mb-4" data-para-anim>
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="text-heading-1 font-heading font-bold" data-animate="fade-up" data-delay="0.1">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>
            </header>
        <?php endif; ?>

        <!-- Cards Grid -->
        <?php if ($cards): ?>
            <div class="cards-grid grid grid-cols-1 <?php echo esc_attr(
                $grid_class,
            ); ?> gap-8">
                <?php foreach ($cards as $index => $card): ?>
                    <?php
                    $link = $card['link'];
                    $is_link = !empty($link);
                    $tag = $is_link ? 'a' : 'div';
                    $link_attrs = $is_link
                        ? sprintf(
                            'href="%s"%s',
                            esc_url($link['url']),
                            $link['target']
                                ? ' target="_blank" rel="noopener noreferrer"'
                                : '',
                        )
                        : '';
                    ?>
                    <<?php echo $tag; ?> <?php echo $link_attrs; ?> class="card <?php echo esc_attr(
     $card_bg,
 ); ?> group">
                        <?php if ($card['image']): ?>
                            <div class="card-image relative overflow-hidden aspect-[4/3]">
                                <img
                                    src="<?php echo esc_url(
                                        $card['image']['sizes']['card'] ??
                                            $card['image']['url'],
                                    ); ?>"
                                    alt="<?php echo esc_attr(
                                        $card['image']['alt'] ?: $card['title'],
                                    ); ?>"
                                    class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-105"
                                    loading="lazy"
                                />
                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <?php if ($card['title']): ?>
                                <h3 class="card-title text-heading-3 font-heading font-semibold mb-2 <?php echo $is_link
                                    ? 'group-hover:text-brand-primary transition-colors'
                                    : ''; ?>">
                                    <?php echo esc_html($card['title']); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($card['description']): ?>
                                <p class="card-description text-neutral-600 <?php echo $background ===
                                'dark'
                                    ? 'text-neutral-400'
                                    : ''; ?>">
                                    <?php echo wp_kses_post(
                                        $card['description'],
                                    ); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($is_link): ?>
                                <span class="inline-flex items-center gap-2 mt-4 text-brand-primary font-semibold">
                                    <?php echo esc_html(
                                        $link['title'] ?:
                                        __('Learn More', 'trac'),
                                    ); ?>
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </span>
                            <?php endif; ?>
                        </div>
                    </<?php echo $tag; ?>>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
