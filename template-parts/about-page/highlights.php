<?php
if (!defined('ABSPATH')) {
    exit();
}

$about_highlights = [
    [
        'title' => __('Connectivity First', 'trac'),
        'description' => __(
            'We design digital infrastructure that gives teams, communities, and businesses reliable access to the tools they depend on.',
            'trac',
        ),
    ],
    [
        'title' => __('Built For Scale', 'trac'),
        'description' => __(
            'Our network approach balances resilience, performance, and practical execution so growth does not become operational drag.',
            'trac',
        ),
    ],
    [
        'title' => __('Operational Trust', 'trac'),
        'description' => __(
            'We focus on clear delivery, strong partnerships, and support structures that hold up after launch.',
            'trac',
        ),
    ],
];
?>

<section class="about-highlights relative overflow-hidden bg-neutral-50" data-section="about-highlights">
    <div class="about-highlights-container w-full px-[5.21vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="mb-[3.125vw] max-w-[52vw] md:mb-10 md:max-w-full">
            <div class="mb-[1.563vw] flex items-center gap-[1.042vw] md:mb-6 md:gap-4" data-animate="fade-up">
                <span class="h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6"></span>
                <span class="font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">
                    <?php esc_html_e('What Shapes Our Work', 'trac'); ?>
                </span>
            </div>

            <h2 class="font-heading text-[3.125vw] leading-[1.18] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl" data-animate="fade-up" data-delay="0.1">
                <?php esc_html_e(
                    'Clear priorities behind every deployment and partnership.',
                    'trac',
                ); ?>
            </h2>
        </div>

        <div class="grid grid-cols-3 gap-[1.667vw] md:grid-cols-1 md:gap-6">
            <?php foreach ($about_highlights as $index => $highlight): ?>
                <article
                    class="rounded-[1.875vw] border border-neutral-200 bg-white p-[2.083vw] shadow-[0_20px_60px_rgba(16,65,127,0.08)] md:rounded-[24px] md:p-8"
                    data-animate="fade-up"
                    data-delay="<?php echo esc_attr(number_format($index * 0.1, 1)); ?>"
                >
                    <h3 class="mb-[1.042vw] font-heading text-[1.667vw] leading-[1.2] text-text-primary md:mb-4 md:text-2xl">
                        <?php echo esc_html($highlight['title']); ?>
                    </h3>
                    <p class="font-body text-[1.042vw] leading-[1.7] text-neutral-600 md:text-base">
                        <?php echo esc_html($highlight['description']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
