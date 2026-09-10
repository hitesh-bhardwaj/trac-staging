<?php
if (!defined('ABSPATH')) {
    exit();
}

$enterprise_why_label = get_field('enterprise_why_label');
$enterprise_why_title = get_field('enterprise_why_title');
$enterprise_why_paragraphs = trac_split_lines(
    get_field('enterprise_why_description'),
);

$enterprise_stats = [];
for ($i = 1; $i <= 3; $i++) {
    $enterprise_stats[] = [
        'number' => get_field("enterprise_stat_{$i}_number"),
        'label' => get_field("enterprise_stat_{$i}_label"),
    ];
}
?>

<section class="enterprise-why relative overflow-hidden bg-brand-tint pt-[7%] pb-[10%]  md:py-20 px-[7vw] sm:py-16" data-section="enterprise-why">
                               <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>


    <div class="relative z-[1] w-full px-[4vw] md:px-0">
        <div class="">
            <div class="flex items-center justify-start gap-3 mb-8 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body  text-brand-secondary text-30 sm:text-[4vw]"><?php echo trac_esc_html(
                    $enterprise_why_label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-66 font-normal leading-[1.3] tracking-[0.01em] text-text-primary mb-[2vw] text-left sm:mb-[5vw]" data-heading-anim>
                <?php echo trac_esc_html($enterprise_why_title); ?>
            </h2>

            <?php foreach ($enterprise_why_paragraphs as $paragraph): ?>
                <p class="w-[75%] font-body text-24 leading-[1.45] text-text-body  mb-[2.6vw]  md:mb-8  sm:mb-6 text-left md:w-full" data-para-anim data-delay="0.2">
                    <?php echo trac_esc_html($paragraph); ?>
                </p>
            <?php endforeach; ?>

	            <div class="grid grid-cols-3 gap-12 md:grid-cols-1 mt-[8vw] md:gap-8 text-left items-stretch">
                    <?php foreach ($enterprise_stats as $index => $stat): ?>
                        <div
                            class="bg-brand-quaternary rounded-2xl border border-transparent hover:border-brand-primary transition-colors duration-300 px-8 py-8 h-full flex flex-col gap-3 items-start sm:py-5 sm:px-5 sm:rounded-[3.5vw] sm:gap-2"
                            data-animate="fade-up"
                            <?php if ($index > 0): ?>
                                data-delay="<?php echo esc_attr(
                                    $index * 0.05,
                                ); ?>"
                            <?php endif; ?>
                        >
                            <div class="font-heading text-white font-bold md:font-medium text-[2.9vw]  flex items-end md:text-[5.5vw] sm:text-[8vw]"><?php echo trac_esc_html(
                                $stat['number'],
                            ); ?></div>
                            <p class="font-body text-white text-24 leading-snug">
                               <?php echo trac_esc_html($stat['label']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
        </div>
    </div>

</section>
