<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('sme_plans_label') ?: 'Plans & Pricing';
$title = get_field('sme_plans_title') ?: 'Simple Plans. Clear Pricing.';

$plans = [
    [
        'name' => 'SME Lite',
        'price' => 'RWF 75,000',
        'period' => '/month',
        'bullets' => [
            'Unlimited internet',
            'Up to 80 Mbps',
            'Ideal for small offices, retail stores, and co-working spaces.',
        ],
    ],
    [
        'name' => 'SME Elite',
        'price' => 'RWF 130,000',
        'period' => '/month',
        'bullets' => [
            'Unlimited internet',
            'Up to 150 Mbps',
            'Built for growing businesses using cloud tools, video meetings, and multi-user environments.',
        ],
    ],
];
?>

<section class="sme-plans relative bg-white py-[7vw] md:py-20 sm:py-16 overflow-hidden" data-section="sme-plans">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[92rem] mx-auto">
            <div class="text-center max-w-[56rem] mx-auto">
                <div class="flex items-center justify-center gap-3 mb-8 md:mb-6" data-animate="fade-up">
                    <span class="w-6 h-1 bg-brand-primary"></span>
                    <span class="font-body text-base text-[#111]"><?php echo esc_html(
                        $label,
                    ); ?></span>
                </div>

                <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[4.2vw] md:text-5xl md:mb-10 sm:text-4xl" data-heading-anim>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>

            <div class="grid grid-cols-2 gap-[3vw] mt-[5vw] md:grid-cols-1 md:gap-8 max-w-[60rem] mx-auto items-stretch">
                <?php foreach ($plans as $i => $p): ?>
                    <article class="group/plan rounded-[2vw] md:rounded-3xl p-[1.5vw] md:p-10 sm:p-7 bg-white flex flex-col border border-brand-primary min-h-[34vw] md:min-h-0 transition-all duration-300 ease-out" data-animate="fade-up" data-delay="<?php echo esc_attr(0.1 * $i); ?>">
                        <div class="rounded-[1.6vw] md:rounded-2xl p-[1.2vw] md:p-8 sm:p-7 bg-[#EEF3FC] transition-colors duration-300 ease-out group-hover/plan:bg-brand-primary">
                            <div class="flex justify-center">
                                <span class="inline-flex items-center justify-center rounded-full px-8 py-1.5 font-body text-[1.25vw] md:text-sm sm:text-xs bg-brand-primary text-white transition-colors duration-300 ease-out group-hover/plan:bg-white group-hover/plan:text-brand-primary">
                                    <?php echo esc_html($p['name']); ?>
                                </span>
                            </div>

                            <div class="mt-[5vw] md:mt-7 sm:mt-6 text-center">
                                <span class="font-heading font-normal text-[2.604vw] md:text-4xl sm:text-3xl leading-[1] text-[#111111] transition-colors duration-300 ease-out group-hover/plan:text-white">
                                    <?php echo esc_html($p['price']); ?>
                                </span>
                                <span class="font-body text-[1.25vw] md:text-sm sm:text-xs ml-[-0.5vw] text-black/70 transition-colors duration-300 ease-out group-hover/plan:text-white/80">
                                    <?php echo esc_html($p['period']); ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-col flex-1">
                            <ul class="mt-[2.2vw] md:mt-8 sm:mt-7 space-y-4 font-body text-text-body text-[1.25vw] md:text-base sm:text-sm leading-[1.55]">
                            <?php foreach ($p['bullets'] as $b): ?>
                                <li class="flex gap-3">
                                    <span class="mt-2 w-1.5 h-1.5 rounded-full bg-text-body shrink-0"></span>
                                    <span><?php echo esc_html($b); ?></span>
                                </li>
                            <?php endforeach; ?>
                            </ul>

                            <div class="mt-auto pt-[3vw] md:pt-10 sm:pt-8 flex justify-center">
                                <a href="<?php echo esc_url(
                                    get_field('sme_plans_button_link') ?:
                                        '#get-connected',
                                ); ?>" class="btn btn-primary group magnetic inline-flex">
                                    <span class="btn-line"></span>
                                    <span class="btn-text"><?php echo esc_html(
                                        get_field('sme_plans_button_text') ?:
                                            'Get on TrAC',
                                    ); ?></span>
                                    <span class="btn-icon" aria-hidden="true">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                                            <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                                            <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                                            <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                                            <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                                            <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
