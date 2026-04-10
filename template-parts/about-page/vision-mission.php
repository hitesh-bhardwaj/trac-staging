<?php
if (!defined('ABSPATH')) {
    exit();
}

$vision_mission_cards = [
    [
        'title' => __('Our Vision', 'trac'),
        'description' => __(
            'To build a more connected Africa where reliable digital infrastructure expands opportunity for businesses, institutions, and communities.',
            'trac',
        ),
        'image' => get_template_directory_uri() . '/src/imgs/why-1.jpg',
        'alt' => __('Team meeting', 'trac'),
    ],
    [
        'title' => __('Our Mission', 'trac'),
        'description' => __(
            'We deliver resilient, scalable telecommunications solutions that make access stronger, operations smoother, and growth more practical.',
            'trac',
        ),
        'image' => get_template_directory_uri() . '/src/imgs/why-3.jpg',
        'alt' => __('Digital network visual', 'trac'),
    ],
];
?>

<section class="vision-mission-section  relative px-[12vw] py-[6.25vw] w-screen h-fit" data-section="vision-mission">
     <canvas  class=" network-canvas-el absolute inset-0 h-full w-full"></canvas>
    <div class="vision-mission-container w-full h-fit  md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12 relative z-[4]">
        <div class="vision-mission-grid grid grid-cols-2 gap-[3.646vw] md:grid-cols-1 md:gap-8">
            <?php foreach ($vision_mission_cards as $card): ?>
                <article class="vision-mission-card rounded-[2.083vw] border border-brand-primary/70 bg-white px-[3.438vw] py-[3.125vw] pb-[7vw] md:rounded-[28px] md:px-8 md:py-8 sm:rounded-[24px] sm:px-6 sm:py-6">
                    <div class="mb-[7.125vw] md:mb-8 sm:mb-6">
                        <img
                            src="<?php echo esc_url($card['image']); ?>"
                            alt="<?php echo esc_attr($card['alt']); ?>"
                            class="h-[11.458vw] w-[16.667vw] rounded-[1.146vw] object-cover md:h-[180px] md:w-[260px] md:rounded-[18px] sm:h-[150px] sm:w-full sm:max-w-[220px] sm:rounded-[16px]"
                            loading="lazy"
                        >
                    </div>

                    <h2 class="mb-[2.083vw] font-heading text-[3.021vw] font-normal leading-[1.05] tracking-[-0.02em] text-text-primary md:mb-6 md:text-[52px] sm:text-[38px]">
                        <?php echo esc_html($card['title']); ?>
                    </h2>

                    <p class="max-w-[25vw] font-body text-[1.25vw] leading-[1.5] text-text-body md:max-w-full md:text-[22px] sm:text-[17px]">
                        <?php echo esc_html($card['description']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

   
</section>
