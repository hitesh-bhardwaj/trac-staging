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

<section class="why-choose-trac-section relative overflow-hidden bg-brand-tint px-[5vw] py-[6.2vw] md:py-16 md:px-[6vw] sm:py-12" data-section="why-choose-trac">
    <div class="relative z-[2] mx-auto max-w-[92rem]">
        <div class="flex items-center justify-start gap-3 mb-8 md:mb-6" data-animate="fade-up">
            <span class="w-6 h-1 bg-brand-secondary"></span>
            <span class="font-body text-brand-secondary text-24 sm:text-[4vw]"><?php echo trac_esc_html(
                $label,
            ); ?></span>
        </div>

        <h2 class="font-heading text-66 font-normal leading-[1.3] tracking-[0.01em] text-text-primary mb-[1.4vw] md:mb-6" data-heading-anim>
            <?php echo trac_esc_html($title); ?>
        </h2>

        <p class="font-body text-24 leading-[1.45] text-text-body" data-para-anim>
            <?php echo trac_esc_html($subtitle); ?>
        </p>

        <div class="carrier-why-cards mt-[4.5vw] flex items-start gap-[1.6vw] md:mt-12 md:!flex-row md:items-stretch md:gap-5 md:-mx-[6vw] md:overflow-x-auto md:overflow-y-visible md:px-[6vw] md:pb-2 md:[scroll-padding-left:6vw] md:[scroll-snap-type:x_proximity] md:[scrollbar-width:none] md:[&::-webkit-scrollbar]:hidden sm:!flex-row sm:items-stretch sm:gap-5 sm:-mx-[6vw] sm:overflow-x-auto sm:overflow-y-visible sm:px-[6vw] sm:pb-2 sm:[scroll-padding-left:6vw] sm:[scroll-snap-type:x_proximity] sm:[scrollbar-width:none] sm:[&::-webkit-scrollbar]:hidden">
            <?php foreach ($why_cards as $i => $card): ?>
                <article
                    class="carrier-why-card mt-[var(--card-mt)] flex w-[16.5vw] flex-col justify-between gap-[3.2vw] rounded-xl bg-brand-tertiary p-[1.6vw] py-[2.2vw] md:!mt-0 md:h-auto md:!w-[30vw] md:min-w-[10vw] md:flex-[0_0_50vw] md:gap-8 md:rounded-2xl md:p-8 sm:!mt-0 sm:h-[200px] sm:w-[66vw] sm:min-w-[66vw] sm:flex-[0_0_66vw] sm:gap-0 sm:rounded-xl sm:p-[18px_16px_28px] sm:[scroll-snap-align:start] md:[scroll-snap-align:start]"
                    style="--card-mt: <?php echo esc_attr($i * 2.4); ?>vw;"
                >
                    <span class="font-heading text-white text-36 font-normal sm:leading-none">
                        <?php echo trac_esc_html($card['number']); ?>
                    </span>
                    <p class="font-body text-white text-24 leading-[1.45] sm:max-w-[92%]">
                        <?php echo trac_esc_html($card['text']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="carrier-why-mobile-nav mt-7 hidden justify-center gap-3 md:flex sm:flex" aria-hidden="true">
            <button class="carrier-why-mobile-nav__button carrier-why-mobile-nav__button--prev flex h-12 w-20 items-center justify-center rounded-full border border-brand-secondary  text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white disabled:cursor-default disabled:opacity-100" type="button" aria-label="<?php esc_attr_e(
                'Previous card',
                'trac',
            ); ?>">
                <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
            <button class="carrier-why-mobile-nav__button carrier-why-mobile-nav__button--next flex h-12 w-20 items-center justify-center rounded-full border border-brand-secondary  text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white disabled:cursor-default disabled:opacity-100" type="button" aria-label="<?php esc_attr_e(
                'Next card',
                'trac',
            ); ?>">
                <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>

    <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>
</section>
