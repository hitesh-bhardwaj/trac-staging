<?php
if (!defined('ABSPATH')) {
    exit();
}

$hub_label = get_field('cc_hub_label');
$hub_title = get_field('cc_hub_title');
$hub_paragraphs = trac_split_lines(get_field('cc_hub_description'));

$community_hub_cards = [];
for ($i = 1; $i <= 5; $i++) {
    $icon = get_field("cc_hub_card_{$i}_icon");
    $community_hub_cards[] = [
        'title' => get_field("cc_hub_card_{$i}_title"),
        'icon' => is_array($icon) ? $icon['url'] : '',
    ];
}
?>

<section class="community-hub-section relative overflow-hidden bg-brand-tint" data-section="community-hub">
    <div class="relative z-[2] px-[5.208vw] py-[6.25vw] md:py-16 md:px-[7vw] sm:py-12">
        <div class="relative z-[2] max-w-[68vw] text-left md:max-w-[90%] sm:max-w-full">
            <div class="mb-12 flex items-center justify-start gap-3 md:mb-10" data-animate="fade-up">
                <span class="h-1 w-6 bg-brand-secondary"></span>
                <span class="font-body text-30 text-brand-secondary sm:!text-[4vw]"><?php echo trac_esc_html(
                    $hub_label,
                ); ?></span>
            </div>

            <h2 class="mb-[2.292vw] font-heading text-66 font-normal leading-[1.2425] tracking-normal text-text-primary md:mb-6 md:max-w-full  sm:mb-5 " data-heading-anim>
                <?php echo trac_esc_html($hub_title); ?>
            </h2>

            <div class="w-[59.948vw] font-body text-24 leading-[1.5] text-text-body space-y-[2vw] md:!w-full">
                <?php foreach ($hub_paragraphs as $paragraph): ?>
                    <p data-para-anim><?php echo trac_esc_html($paragraph); ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="relative mx-auto mt-[10vw] min-h-[35vw] max-w-[94.792vw] md:mt-12 md:min-h-0 md:max-w-full sm:mt-10">
            <div class="relative z-[1] flex min-h-[35vw] justify-between gap-[2vw] md:!flex md:!grid-cols-none md:justify-start md:gap-4 md:-mx-[5.208vw] md:overflow-x-auto md:overflow-y-visible md:px-[5.208vw] md:pb-3 md:[scroll-padding-left:5.208vw] md:[scroll-snap-type:x_proximity] md:[scrollbar-width:none] md:[&::-webkit-scrollbar]:hidden  md: sm:gap-4 sm:-mx-[6vw] sm:px-[6vw] sm:pb-3 sm:[scroll-padding-left:6vw] sm:[scrollbar-width:none] sm:[&::-webkit-scrollbar]:hidden" data-community-hub-cards>
                <?php foreach ($community_hub_cards as $index => $card): ?>
                    <article
                        class="flex h-[21.198vw] w-[16vw] flex-col justify-between rounded-[1.25vw] border-[1.5px] border-brand-tertiary bg-brand-tertiary px-[1.458vw] pb-[1.823vw] pt-[2.865vw] shadow-[0_0_0_1px_rgba(16,65,127,0.02)] md:h-80 md:min-h-80 md:w-[min(38vw,300px)] md:min-w-[min(38vw,300px)] md:flex-[0_0_min(38vw,300px)] md:!transform-none md:rounded-3xl md:px-6 md:pb-6 md:pt-8 md:[scroll-snap-align:start]  md:w-[min(60vw,260px)]md:[&:nth-child(3)]:col-span-2 md:[&:nth-child(3)]:mx-auto  sm:h-[252px] sm:min-h-[252px] sm:w-[min(58vw,240px)] sm:min-w-[min(58vw,240px)] sm:flex-[0_0_min(58vw,240px)] sm:px-[18px] sm:pb-[18px] sm:pt-[22px] sm:[&:nth-child(3)]:col-span-1 md:[&:nth-child(3)]:max-w-none"
                        data-community-hub-card
                        data-card-index="<?php echo esc_attr($index); ?>"
                    >
                        <img
                            src="<?php echo esc_url($card['icon']); ?>"
                            alt="community-image"
                            class="h-[4.167vw] min-h-16 w-[4.167vw] min-w-16 object-contain brightness-0 invert sm:h-[15vw] sm:min-h-[15vw] sm:w-[15vw] sm:min-w-[15vw]"
                            loading="lazy"
                        >
                        <h3 class="m-0 font-heading text-36 font-normal leading-[1.18] w-[85%] tracking-normal text-white sm:!text-[7vw]">
                            <?php echo trac_esc_html($card['title']); ?>
                        </h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <canvas class="network-canvas-el pointer-events-none absolute inset-0 z-[1] h-full w-full md:top-[8%] md:h-[92%] sm:hidden" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>
</section>
