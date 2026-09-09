<?php
if (!defined('ABSPATH')) {
    exit();
}

$vm_label = get_field('au_vm_label');

$vision_mission_cards = [
    [
        'title' => get_field('au_vision_title'),
        'description' => get_field('au_vision_description'),
        'image' => get_field('au_vision_image'),
        'alt' => get_field('au_vision_title'),
    ],
    [
        'title' => get_field('au_mission_title'),
        'description' => get_field('au_mission_description'),
        'image' => get_field('au_mission_image'),
        'alt' => get_field('au_mission_title'),
    ],
];
?>


<section class="vision-mission-section  relative px-[5vw] py-[7vw] pb-[11vw] w-screen h-fit bg-brand-tint sm:py-[15vw]" data-section="vision-mission">
        <div
                class="testimonials-label mb-[1.563vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-6"
                data-animate="fade-up"
            >
                <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>
                <span class="label-text font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                    <?php echo trac_esc_html($vm_label); ?>
                </span>
            </div>

            <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>

    <div class="vision-mission-container w-full h-fit px-[6vw] pt-[5vw]  md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12 relative z-[4]">
        <div class="vision-mission-grid grid grid-cols-2 gap-[3.5vw] md:grid-cols-1 md:gap-8">
            <?php foreach ($vision_mission_cards as $card): ?>
                <article data-animate="fade-up" class="rounded-[2vw] border-[1.5px] border-brand-quaternary bg-brand-quaternary p-[3vw] pb-[4vw] shadow-[0_18px_60px_rgba(16,65,127,0.04)] md:rounded-[28px] md:px-8 md:py-8 sm:rounded-[24px] sm:px-6 sm:py-6 sm:h-[110vw]">
                    <div class="mb-[3.125vw] md:mb-8 sm:mb-6 group overflow-hidden rounded-[0.8vw] md:rounded-[18px] sm:rounded-[16px]">
                        <img
                            src="<?php echo esc_url($card['image']); ?>"
                            alt="<?php echo esc_attr($card['alt']); ?>"
                            class="h-[13vw] w-full  md:h-[36vw] md:w-full  sm:h-[42vw]  scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"
                            loading="lazy"
                        >
                    </div>

                    <h2 class="mb-[2vw] font-heading text-66 font-normal leading-[1.05] tracking-[-0.02em] text-white md:mb-6 md:text-[52px] sm:text-[38px]">
                        <?php echo trac_esc_html($card['title']); ?>
                    </h2>

                    <p class="font-body text-24 leading-[1.5] text-white md:max-w-full md:text-[22px] sm:text-[17px]">
                        <?php echo trac_esc_html($card['description']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>


</section>
