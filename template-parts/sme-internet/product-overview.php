<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<?php
$label = get_field('sme_overview_label');
$title = get_field('sme_overview_title');
$description_paragraphs = trac_split_lines(
    get_field('sme_overview_description'),
);

$cards = [];
for ($i = 1; $i <= 6; $i++) {
    $cards[] = [
        'text' => get_field("sme_overview_card_{$i}_text"),
        'icon' => get_field("sme_overview_card_{$i}_icon"),
    ];
}
?>

<section class="sme-overview relative overflow-hidden bg-brand-tint py-[7vw] md:py-20 sm:py-16" data-section="sme-overview">
    <div class="relative z-[1] w-full px-[9vw] md:px-[7vw]">
        <div class="max-w-[92rem] mx-auto">
            <div class="flex items-center justify-start gap-3 mb-10 md:mb-5" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body text-brand-secondary text-30 sm:text-[4vw]"><?php echo trac_esc_html(
                    $label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-66 font-normal leading-[1.3] tracking-[0.01em] text-text-primary mb-[1.6vw] md:mb-6 text-left" data-heading-anim>
                <?php echo trac_esc_html($title); ?>
            </h2>

            <div class="w-[46%] mb-[5vw] md:mb-10 sm:mb-8 md:w-full">
                <?php foreach ($description_paragraphs as $index => $paragraph): ?>
                    <p class="font-body text-24 leading-[1.45] text-text-body <?php echo $index >
 0
 ? 'mt-[1.4vw] md:mt-4 '
 : ''; ?>" data-para-anim data-delay="<?php echo esc_attr(
    $index * 0.1,
); ?>">
                        <?php echo trac_esc_html($paragraph); ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="grid grid-cols-3 gap-[3.5vw] md:grid-cols-2 md:gap-6 sm:grid-cols-1 sm:gap-4 items-stretch">
                <?php foreach ($cards as $i => $c): ?>
                    <div class="rounded-[1vw] md:rounded-2xl bg-brand-tertiary p-[1.8vw] md:p-8 sm:p-6 flex flex-col items-start justify-between h-[12vw] gap-[1.4vw] md:gap-6  md:h-[30vw] sm:h-[45vw]" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.06 * $i,
                    ); ?>">
                        <img
                            src="<?php echo esc_url($c['icon']); ?>"
                            alt="icons"
                            class="size-[3.5vw] md:size-[6vw] sm:w-11 sm:h-11 object-contain"
                            loading="lazy"
                        >
                        <p class="font-body text-white text-24 leading-[1.45] w-[70%] sm:w-full">
                            <?php echo trac_esc_html($c['text']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>
</section>
