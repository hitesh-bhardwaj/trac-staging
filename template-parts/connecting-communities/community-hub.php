<?php
if (!defined('ABSPATH')) {
    exit();
}

$community_hub_cards = $args['community_hub_cards'] ?? [];
?>

<section class="community-hub-section relative overflow-hidden bg-brand-tint" data-section="community-hub">
    <div class="relative z-[2] px-[5.208vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="relative z-[2] max-w-[68vw] text-left md:max-w-[90%] sm:max-w-full">
            <div class="mb-12 flex items-center justify-start gap-3 md:mb-10" data-animate="fade-up">
                <span class="h-1 w-6 bg-brand-secondary"></span>
                <span class="font-body text-30 text-brand-secondary">Community Smart Hubs (CSH)</span>
            </div>

            <h2 class="mb-[2.292vw] max-w-[68.438vw] font-heading text-66 font-normal leading-[1.2425] tracking-normal text-text-primary md:mb-6 md:max-w-full md:text-[44px] md:leading-[1.16] sm:mb-5 sm:text-[34px] sm:leading-[1.18]" data-heading-anim>
                Bringing the model to communities
            </h2>

            <div class="max-w-[59.948vw] font-body text-24 leading-[1.5] text-text-body md:text-xl sm:text-base sm:leading-[1.6] [&_p+p]:mt-[1.302vw] md:[&_p+p]:mt-4">
                <p data-para-anim>Community Smart Hubs are where the Connecting Communities platform comes to life.</p>
                <p data-para-anim>Built on TrAC infrastructure, each hub creates a local point of access where communities can connect to Internet services, financial tools, digital education, agriculture and nutrition support, clean water, and other services as the model grows.</p>
                <p data-para-anim>One connection. More ways to access what matters.</p>
            </div>
        </div>

        <div class="relative mx-auto mt-[10vw] min-h-[35vw] max-w-[94.792vw] md:mt-12 md:min-h-0 md:max-w-full sm:mt-10">
            <div class="relative z-[1] flex min-h-[35vw] justify-between gap-[2vw] md:grid md:min-h-0 md:grid-cols-2 md:gap-5 sm:grid-cols-1 sm:gap-4" data-community-hub-cards>
                <?php foreach ($community_hub_cards as $index => $card): ?>
                    <article
                        class="relative h-[21.198vw] w-[16vw] rounded-[1.25vw] border-[1.5px] border-brand-tertiary bg-brand-tertiary px-[1.458vw] pb-[1.823vw] pt-[2.865vw] shadow-[0_0_0_1px_rgba(16,65,127,0.02)] md:h-80 md:min-h-80 md:w-full md:min-w-0 md:!transform-none md:rounded-3xl md:px-6 md:pb-6 md:pt-8 md:[&:nth-child(3)]:col-span-2 md:[&:nth-child(3)]:mx-auto md:[&:nth-child(3)]:max-w-[360px] sm:h-[260px] sm:min-h-[260px] sm:px-[18px] sm:pb-[18px] sm:pt-[22px] sm:[&:nth-child(3)]:col-span-1 sm:[&:nth-child(3)]:max-w-none"
                        data-community-hub-card
                        data-card-index="<?php echo esc_attr($index); ?>"
                    >
                        <img
                            src="<?php echo esc_url($card['icon']); ?>"
                            alt=""
                            class="h-[4.167vw] min-h-16 w-[4.167vw] min-w-16 object-contain brightness-0 invert sm:h-[52px] sm:min-h-[52px] sm:w-[52px] sm:min-w-[52px]"
                            loading="lazy"
                        >
                        <h3 class="absolute bottom-[2.917vw] left-[1.458vw] right-[1.458vw] m-0 font-heading text-36 font-normal leading-[1.18] tracking-normal text-white md:bottom-8 md:left-6 md:right-6 md:text-30 sm:bottom-[22px] sm:left-[18px] sm:right-[18px] sm:text-lg">
                            <?php echo esc_html($card['title']); ?>
                        </h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <canvas class="network-canvas-el pointer-events-none absolute inset-0 z-[1] h-full w-full md:top-[8%] md:h-[92%] sm:hidden" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>
</section>
