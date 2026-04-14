<?php
if (!defined('ABSPATH')) {
    exit();
}

$solution_cards = [
    [
        'title' => 'For New ISPs',
        'number' => '01',
        'desc' => 'Launch with the right network foundation, infrastructure support, and commercial flexibility from day one.',
    ],
    [
        'title' => 'For Growing Networks',
        'number' => '02',
        'desc' => 'Expand capacity with infrastructure designed to support performance, reach, and operational confidence.',
    ],
    [
        'title' => 'For Established Carriers',
        'number' => '03',
        'desc' => 'Strengthen your network with reliable backbone connectivity, improved performance, and consistent uptime.',
    ],
    [
        'title' => 'Built for Scale',
        'number' => '04',
        'desc' => 'From local deployments to regional expansion, our infrastructure supports long-term growth across Rwanda and East Africa.',
    ],
];
?>

<section class="solution-overview-section relative h-[300vh] bg-white px-[5.208vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12" data-section="solution-overview">
    <div class="mx-auto flex max-w-[92rem] items-start justify-between gap-[5vw] md:flex-col md:gap-10 sticky top-[20%]">
        <div class="w-[45%] md:w-full">
            <div
                class="mb-14 inline-flex items-center gap-[0.85vw] md:mb-6 md:gap-3 sm:mb-4 sm:gap-3"
                data-animate="fade-up"
            >
                <span class="w-6 h-1 bg-brand-primary"></span>
                <span class="font-body text-[1.25vw] text-text-primary md:text-lg sm:text-base">
                    Solution Overview
                </span>
            </div>

            <h2
                class="mb-[2.4vw] w-full font-heading text-[3.5vw] font-normal leading-[1.15] tracking-[-0.03em] text-text-primary md:mb-6 md:max-w-full md:text-[48px] sm:mb-5 sm:text-[34px]"
                data-animate="fade-up"
                data-delay="0.1"
            >
                Built for Network Operators
            </h2>

            <div
                class="w-full space-y-[1.8vw] font-body text-body-lg leading-[1.4] text-text-body md:max-w-full md:space-y-5 md:text-[20px] sm:text-[17px]"
                data-animate="fade-up"
                data-delay="0.2"
            >
                <p>
                    Running a network requires more than connectivity it requires infrastructure you can rely on.
                </p>

                <p>
                    TrAC supports operators at every stage, from new ISPs launching services to established carriers expanding capacity. Our role is simple: provide the backbone, infrastructure, and support you need to build, operate, and scale with confidence.
                </p>
            </div>
        </div>

        <div class="solution-overview-stack-wrap mt-[10vw] flex w-[39vw] justify-end md:mt-0 md:w-full md:justify-start">
    <div class="solution-overview-stack" data-solution-stack>
        <?php foreach ($solution_cards as $index => $card): ?>
            <article
                class="solution-overview-card"
                data-solution-card
                data-card-index="<?php echo esc_attr($index); ?>"
            >
                <div class="flex items-start justify-between gap-4">
                    <h3 class="solution-overview-card__title">
                        <?php echo esc_html($card['title']); ?>
                    </h3>

                    <span class="solution-overview-card__number">
                        <?php echo esc_html($card['number']); ?>
                    </span>
                </div>

                <div class="solution-overview-card__divider"></div>

                <p class="solution-overview-card__desc">
                    <?php echo esc_html($card['desc']); ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
</div>
    </div>
</section>