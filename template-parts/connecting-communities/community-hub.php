<?php
if (!defined('ABSPATH')) {
    exit();
}

$community_hub_cards = $args['community_hub_cards'] ?? [];
?>

<section class="community-hub-section relative overflow-hidden bg-white" data-section="community-hub">
    <div class="community-hub-container relative z-[10] px-[5.208vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="community-hub-header mx-auto max-w-[68vw] text-center md:max-w-[90%] sm:max-w-full">
            <div class="community-hub-label mx-auto mb-14 inline-flex items-center gap-[0.938vw] md:mb-5 md:gap-3 sm:mb-4 sm:gap-3" data-animate="fade-up">
                <span class="community-hub-label__line" aria-hidden="true"></span>
                <span class="community-hub-label__text">Community Hub Sites (CHS)</span>
            </div>

            <h2 class="community-hub-title mx-auto mb-[2.292vw] max-w-[68.438vw] md:mb-6 md:max-w-full sm:mb-5" data-heading-anim>
                TrAC is leading the rollout of Community Hub Sites across Rwanda.
            </h2>

            <div class="community-hub-description mx-auto max-w-[59.948vw]">
                <p data-para-anim>These hubs are physical access points designed to bring connectivity and essential services directly into communities.</p>
                <p data-para-anim>Each hub is built on TrAC infrastructure and serves as a local centre for:</p>
            </div>
        </div>

        <div class="community-hub-cards-wrap relative mx-auto mt-[10vw] max-w-[94.792vw] md:mt-12 md:max-w-full sm:mt-10">
              


            <div class="community-hub-cards" data-community-hub-cards>
                <?php foreach ($community_hub_cards as $index => $card): ?>
                    <article
                        class="community-hub-card <?php echo esc_attr($card['modifier']); ?>"
                        data-community-hub-card
                        data-card-index="<?php echo esc_attr($index); ?>"
                    >
                        <img
                            src="<?php echo esc_url($card['icon']); ?>"
                            alt=""
                            class="community-hub-card__icon"
                            loading="lazy"
                        >
                        <h3 class="community-hub-card__title">
                            <?php echo esc_html($card['title']); ?>
                        </h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
     <canvas class="network-canvas-el absolute inset-0 h-full w-full"></canvas>
</section>
