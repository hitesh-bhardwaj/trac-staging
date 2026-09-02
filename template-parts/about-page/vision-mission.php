<?php
if (!defined('ABSPATH')) {
    exit();
}

$vision_mission_cards = [
    [
        'title' => __('Our Vision', 'trac'),
        'description' => __(
            "To ‘Light Africa’ by bringing premium internet to cities, towns, and communities alike.",
            'trac',
        ),
        'image' => get_template_directory_uri() . '/src/imgs/about/vision.png',
        'alt' => __('Team meeting', 'trac'),
    ],
    [
        'title' => __('Our Mission', 'trac'),
        'description' => __(
            "To enable access through reliable connectivity, delivering internet, infrastructure, and digital solutions that help businesses, communities, and service providers grow with confidence.",
            'trac',
        ),
        'image' => get_template_directory_uri() . '/src/imgs/about/mission.png',
        'alt' => __('Digital network visual', 'trac'),
    ],
];
?>

        
<section class="vision-mission-section  relative px-[5vw] py-[7vw] pb-[11vw] w-screen h-fit bg-[#EEF3FC]" data-section="vision-mission">
        <div
                class="testimonials-label mb-[1.563vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-10"
                data-animate="fade-up"
            >
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-[#E86224] md:h-1 md:w-6 sm:w-5"></span>
                <span class="label-text font-body text-30 text-[#E86224] md:text-xl sm:text-lg">
                    <?php echo esc_html(get_field('testimonials_label') ? : 'Our Vision & Mission',); ?>
                </span>
            </div>
    
            <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>

    <div class="vision-mission-container w-full h-fit px-[8vw] pt-[5vw]  md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12 relative z-[4]">
        <div class="vision-mission-grid grid grid-cols-2 gap-[3.646vw] md:grid-cols-1 md:gap-8">
            <?php foreach ($vision_mission_cards as $card): ?>
                <article data-animate="fade-up" class="vision-mission-card rounded-[2.083vw] border-[1.5px] border-[#2F5FA0] bg-[#2F5FA0] p-[3vw] pb-[4vw] md:rounded-[28px] md:px-8 md:py-8 sm:rounded-[24px] sm:px-6 sm:py-6">
                    <div class="mb-[3.125vw] md:mb-8 sm:mb-6">
                        <img
                            src="<?php echo esc_url($card['image']); ?>"
                            alt="<?php echo esc_attr($card['alt']); ?>"
                            class="h-[13vw] w-full rounded-[0.8vw] object-cover md:h-[180px] md:w-[260px] md:rounded-[18px] sm:h-[150px] sm:w-full sm:max-w-[220px] sm:rounded-[16px]"
                            loading="lazy"
                        >
                    </div>

                    <h2 class="mb-[2.083vw] font-heading text-66 font-normal leading-[1.05] tracking-[-0.02em] text-white md:mb-6 md:text-[52px] sm:text-[38px]">
                        <?php echo esc_html($card['title']); ?>
                    </h2>

                    <p class="font-body text-24 leading-[1.5] text-white md:max-w-full md:text-[22px] sm:text-[17px]">
                        <?php echo esc_html($card['description']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

   
</section>
