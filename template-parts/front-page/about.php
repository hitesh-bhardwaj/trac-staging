<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="about-section relative bg-white overflow-hidden" data-section="about">
    <div class="about-container w-full px-[5.21vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="about-label flex items-center gap-[1.042vw] mb-[2.604vw] md:gap-4 md:mb-8 sm:mb-6" data-animate="fade-up">
            <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1 sm:w-5"></span>
            <span class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg"><?php echo esc_html(
                get_field('about_label') ?: 'Why TrAC',
            ); ?></span>
        </div>

        <div class="about-grid flex justify-between gap-[5.208vw] items-center md:grid-cols-1 md:gap-10 sm:gap-8">
            <div class="about-visual w-[36%]" data-animate="fade-right">
                <?php
                $about_image =
                    get_field('about_image') ?:
                    get_template_directory_uri() .
                        '/src/imgs/lion-wireframe.png';
                ?>
                <img
                    src="<?php echo esc_url($about_image); ?>"
                    alt="TrAC lion wireframe illustration"
                    class="w-full mx-auto scale-[1.7] translate-x-[-50%]"
                    loading="lazy"
                >
            </div>

            <div class="about-content w-[47%] mt-[-4vw]">
                <h2 data-para-anim  class="about-title font-heading text-[3.438vw] leading-[1.24] tracking-[0.01em] text-text-primary mb-[2.083vw] md:text-4xl md:mb-8 sm:text-3xl sm:mb-6">
                    <?php echo esc_html(
                        get_field('about_title') ?:
                            "TrAC is Rwanda's homegrown ISP, built on long-term commitment and technical excellence.",
                    ); ?>
                </h2>

                <ul class="about-list font-body text-[1.25vw] leading-[1.58] text-text-body space-y-[0.521vw] mb-[2.604vw] md:text-lg md:space-y-2 md:mb-8 sm:text-base sm:space-y-2 sm:mb-6">
                    <?php
                    $list_items = [
                        get_field('about_list_item_1') ?: 'Fibre-first infrastructure',
                        get_field('about_list_item_2') ?:
                            'Redundant international routes',
                        get_field('about_list_item_3') ?:
                            '24/7 network monitoring',
                        get_field('about_list_item_4') ?:
                            'Local support with fast response',
                    ];
                    foreach ($list_items as $item):
                    ?>
                        <li data-animate="fade-up" data-delay="0.08" class="flex items-center gap-[0.625vw] md:gap-2">
                            <span class="list-dot w-[0.375vw] h-[0.375vw] bg-text-primary rounded-full flex-shrink-0 md:w-1.5 md:h-1.5 md:mt-2.5"></span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <p data-para-anim data-delay="0.16" class="about-subtitle font-heading text-[1.875vw] leading-[1.33] tracking-[0.01em] text-text-primary md:text-2xl sm:text-xl">
                    <?php echo esc_html(
                        get_field('about_subtitle') ?:
                            'We design our network with protection in mind so you can stay online, connected, and secure.',
                    ); ?>
                </p>
            </div>
        </div>
    </div>
</section>
