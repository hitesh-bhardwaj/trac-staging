<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('cs_partner_label') ?: 'Partner with TrAC';
$title = get_field('cs_partner_title') ?: 'Why Operators Partner with TrAC';
$subtitle =
    get_field('cs_partner_subtitle') ?:
    'We provide the foundation your network can grow on.';

$why_cards = [
    [
        'number' => '01',
        'text' => 'Rwanda-rooted infrastructure with regional reach',
    ],
    [
        'number' => '02',
        'text' => 'Proven experience supporting telecom deployments',
    ],
    [
        'number' => '03',
        'text' => 'Scalable, carrier-grade infrastructure',
    ],
    [
        'number' => '04',
        'text' => 'Built with security and data protection in mind',
    ],
    [
        'number' => '05',
        'text' =>
            'Technical expertise across network design and implementation',
    ],
];
?>

<section class="why-choose-trac-section relative overflow-hidden bg-brand-tint px-[5vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12" data-section="why-choose-trac">
    <div class="relative z-[2] mx-auto max-w-[92rem]">
        <div class="flex items-center justify-start gap-3 mb-8 md:mb-6" data-animate="fade-up">
            <span class="w-6 h-1 bg-brand-secondary"></span>
            <span class="font-body text-brand-secondary text-24"><?php echo esc_html(
                $label,
            ); ?></span>
        </div>

        <h2 class="font-heading text-[3.5vw] font-normal leading-[1.15] tracking-[0.01em] text-text-primary mb-[1.4vw] md:text-5xl md:mb-6 sm:text-4xl" data-heading-anim>
            <?php echo esc_html($title); ?>
        </h2>

        <p class="font-body text-24 leading-[1.5] text-text-body md:text-lg sm:text-base" data-para-anim>
            <?php echo esc_html($subtitle); ?>
        </p>

        <div class="mt-[4.5vw] md:mt-12 flex items-start gap-[1.6vw] md:flex-col md:gap-5 sm:gap-4">
            <?php foreach ($why_cards as $i => $card): ?>
                <article
                    class="w-[16.5vw] md:w-full mt-[var(--card-mt)] md:mt-0 rounded-xl md:rounded-2xl bg-brand-tertiary p-[1.6vw] py-[2.2vw] md:p-8 flex flex-col justify-between gap-[3.2vw] md:gap-10"
                    style="--card-mt: <?php echo esc_attr($i * 2.4); ?>vw;"
                    data-animate="fade-up"
                    data-delay="<?php echo esc_attr(0.08 * $i); ?>"
                >
                    <span class="font-heading text-white text-36 md:text-3xl font-normal">
                        <?php echo esc_html($card['number']); ?>
                    </span>
                    <p class="font-body text-white text-24 md:text-lg leading-[1.35]">
                        <?php echo esc_html($card['text']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>
</section>
