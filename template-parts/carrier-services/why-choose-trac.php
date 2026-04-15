<?php
if (!defined('ABSPATH')) {
    exit();
}

$why_cards = [
    [
        'number' => '01',
        'text'   => 'Understand your network and growth goals',
    ],
    [
        'number' => '02',
        'text'   => 'Design tailored infrastructure solutions',
    ],
    [
        'number' => '03',
        'text'   => 'Provide flexible commercial models',
    ],
    [
        'number' => '04',
        'text'   => 'Support implementation and expansion',
    ],
    [
        'number' => '05',
        'text'   => 'Deliver reliable long-term partnership',
    ],
    [
        'number' => '06',
        'text'   => 'Help you scale with confidence',
    ],
];
?>

<section class="why-choose-trac-section relative bg-[#EEF3FC] h-[300vh]  pt-[4.2vw] md:px-[4vw] md:pt-16 md:pb-24 sm:px-[6vw] sm:pt-12 sm:pb-16" data-section="why-choose-trac">
    <div class="mx-auto text-center w-screen sticky top-[5%] h-screen overflow-hidden">
        <div class="relative z-[2]">
            <div
                class="mx-auto mb-[2.4vw] inline-flex items-center gap-[0.85vw] md:mb-6 md:gap-3 sm:mb-4 sm:gap-3"
                data-animate="fade-up"
            >
                <span class="h-[2px] w-[1.2vw] min-w-[22px] bg-brand-primary" aria-hidden="true"></span>
                <span class="font-body text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Why Choose TrAC
                </span>
            </div>

            <h2
                class="mx-auto mb-[2vw] max-w-[72vw] font-heading text-[3.5vw] font-normal leading-[1.2] tracking-[-0.03em] text-text-primary md:mb-6 md:max-w-[90%] md:text-[48px] sm:mb-5 sm:max-w-full sm:text-[34px]"
                data-heading-anim
            >
                Built as a Partnership, Not Just a Service
            </h2>

            <div
                class="mx-auto max-w-[66vw] space-y-[1.4vw] font-body text-body-lg leading-[1.5] text-text-body md:max-w-[88%] md:space-y-5 md:text-[22px] sm:max-w-full sm:space-y-4 sm:text-[17px]"
                
            >
                <p data-para-anim >
                    Every network is different. That’s why we work closely with you to design solutions that fit your technical and commercial needs.
                </p>
            </div>
        </div>

        <div class="why-choose-cards-stage relative z-[2] mt-[5vw] h-[42vw] md:mt-12 md:h-[520px] sm:mt-10 sm:h-[420px]">
            <div class="why-choose-container absolute left-0 top-0 flex w-max flex-nowrap items-start gap-[2.2vw] will-change-transform">
                <?php foreach ($why_cards as $index => $card): ?>
                    <article
                        class="why-choose-card"
                        data-why-card
                        data-card-index="<?php echo esc_attr($index); ?>"
                    >
                        <div class="why-choose-card__number">
                            <?php echo esc_html($card['number']); ?>
                        </div>

                        <div class="why-choose-card__content">
                            <?php echo esc_html($card['text']); ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <canvas class="network-canvas-el absolute inset-0 h-full w-full"></canvas>
    </div>
</section>