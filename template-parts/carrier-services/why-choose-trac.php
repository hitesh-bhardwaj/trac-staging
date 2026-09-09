<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('cs_partner_label');
$title = get_field('cs_partner_title');
$subtitle = get_field('cs_partner_subtitle');

$why_cards = [];
for ($i = 1; $i <= 5; $i++) {
    $why_cards[] = [
        'number' => str_pad($i, 2, '0', STR_PAD_LEFT),
        'text' => get_field("cs_why_card_{$i}_text"),
    ];
}
?>

<section class="why-choose-trac-section relative overflow-hidden bg-brand-tint px-[5vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12" data-section="why-choose-trac">
    <div class="relative z-[2] mx-auto max-w-[92rem]">
        <div class="flex items-center justify-start gap-3 mb-8 md:mb-6" data-animate="fade-up">
            <span class="w-6 h-1 bg-brand-secondary"></span>
            <span class="font-body text-brand-secondary text-24 sm:!text-[4vw]"><?php echo trac_esc_html(
                $label,
            ); ?></span>
        </div>

        <h2 class="font-heading text-[3.5vw] font-normal leading-[1.15] tracking-[0.01em] text-text-primary mb-[1.4vw] md:text-5xl md:mb-6 sm:text-4xl" data-heading-anim>
            <?php echo trac_esc_html($title); ?>
        </h2>

        <p class="font-body text-24 leading-[1.5] text-text-body md:text-lg sm:text-base" data-para-anim>
            <?php echo trac_esc_html($subtitle); ?>
        </p>

        <div class="carrier-why-cards mt-[4.5vw] flex items-start gap-[1.6vw] md:mt-12 md:flex-col md:gap-5 sm:!flex-row sm:items-stretch sm:gap-5 sm:-mx-[6vw] sm:overflow-x-auto sm:overflow-y-visible sm:px-[6vw] sm:pb-2 sm:[scroll-padding-left:6vw] sm:[scroll-snap-type:x_proximity] sm:[scrollbar-width:none] sm:[&::-webkit-scrollbar]:hidden">
            <?php foreach ($why_cards as $i => $card): ?>
                <article
                    class="carrier-why-card mt-[var(--card-mt)] flex w-[16.5vw] flex-col justify-between gap-[3.2vw] rounded-xl bg-brand-tertiary p-[1.6vw] py-[2.2vw] md:mt-0 md:w-full md:gap-10 md:rounded-2xl md:p-8 sm:!mt-0 sm:h-[200px] sm:w-[66vw] sm:min-w-[66vw] sm:flex-[0_0_66vw] sm:gap-0 sm:rounded-xl sm:p-[18px_16px_28px] sm:[scroll-snap-align:start]"
                    style="--card-mt: <?php echo esc_attr($i * 2.4); ?>vw;"
                >
                    <span class="font-heading text-white text-36 font-normal md:text-3xl sm:text-2xl sm:leading-none">
                        <?php echo trac_esc_html($card['number']); ?>
                    </span>
                    <p class="font-body text-white text-24 leading-[1.35] md:text-lg sm:max-w-[92%] sm:text-base">
                        <?php echo trac_esc_html($card['text']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="carrier-why-mobile-nav mt-7 hidden justify-center gap-3 sm:flex" aria-hidden="true">
            <button class="carrier-why-mobile-nav__button carrier-why-mobile-nav__button--prev flex h-[38px] w-16 items-center justify-center rounded-full border border-brand-primary/10 bg-white/55 text-brand-primary/20 transition-colors duration-300 disabled:cursor-default disabled:opacity-100" type="button" aria-label="<?php esc_attr_e(
                'Previous card',
                'trac',
            ); ?>">
                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" aria-hidden="true">
                    <path d="M8.2 1L1.2 8L8.2 15M2.2 8H21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <button class="carrier-why-mobile-nav__button carrier-why-mobile-nav__button--next flex h-[38px] w-16 items-center justify-center rounded-full border border-brand-primary/10 bg-white/55 text-brand-primary/20 transition-colors duration-300 disabled:cursor-default disabled:opacity-100" type="button" aria-label="<?php esc_attr_e(
                'Next card',
                'trac',
            ); ?>">
                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" aria-hidden="true">
                    <path d="M13.8 1L20.8 8L13.8 15M1 8H19.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>

    <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>
</section>
