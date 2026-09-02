<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="about-section relative bg-[var(--color-brand-light)] overflow-hidden" data-section="about">
    <div class="about-container w-full px-[5.21vw] pt-[10vw] pb-[6vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-[20%] sm:pb-[30%]">
        <div class="about-label flex items-center gap-[1.042vw] mb-14 md:gap-4 md:mb-8 sm:mb-14 md:justify-center" data-animate="fade-up">
            <span class="label-line w-[1.354vw] h-[0.208vw] bg-[var(--color-brand-secondary)] md:w-6 md:h-1 sm:w-5"></span>
            <span class="label-text font-body text-30 text-[var(--color-brand-secondary)] md:text-xl sm:text-lg"><?php echo esc_html(
                get_field('about_label') ?: 'Why TrAC',
            ); ?></span>
        </div>

        <div class="about-grid flex justify-between gap-[5.208vw] items-center md:grid-cols-1 md:gap-10 sm:gap-[25vw] md:flex-col-reverse ">
            <div class="about-visual w-[36%] md:w-full" data-animate="fade-right">
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

            <div class="about-content w-[50%] mt-[-7vw] md:w-full md:text-center">
	                <h2 data-para-anim  class="about-title font-heading text-66 leading-[1.24] tracking-[0.01em] text-text-primary mb-[2vw] md:text-4xl md:mb-8 sm:text-[8vw] sm:mb-10">
	                    <?php echo esc_html(
	                        get_field('about_title') ?:
	                            "TrAC is Rwanda and East Africa's homegrown internet service provider, built on long-term commitment and technical excellence.",
	                    ); ?>
	                </h2>
                <div class="w-full flex gap-[7vw] mb-[3vw]">

                <ul class="about-list font-body text-24 leading-[1.58] text-text-body space-y-[0.521vw] md:text-lg md:space-y-2 md:mb-8  sm:text-base sm:space-y-[2vw] sm:mb-[10vw] sm:w-[80%] sm:mx-auto  ">
                    <?php
                    $list_items = [
                        get_field('about_list_item_1') ?: 'Zero Contention',
                        get_field('about_list_item_2') ?:
                            '24/7 NOC Support',
                        get_field('about_list_item_3') ?:
                            'Fully Redundant',
                       
                    ];
                    foreach ($list_items as $item):
                    ?>
                        <li data-animate="fade-up" data-delay="0.08" class="flex items-center gap-[0.625vw] md:gap-2 sm:text-[4vw]">
                            <span class="list-dot w-[0.375vw] h-[0.375vw] bg-text-primary rounded-full flex-shrink-0 md:w-1.5 md:h-1.5"></span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="about-list font-body text-24 leading-[1.58] text-text-body space-y-[0.521vw] md:text-lg md:space-y-2 md:mb-8  sm:text-base sm:space-y-[2vw] sm:mb-[10vw] sm:w-[80%] sm:mx-auto  ">
                    <?php
                    $list_items = [
                        
                        get_field('about_list_item_1') ?:
                            'Business-Grade for All',
                        get_field('about_list_item_2') ?:
                            'Managed Equipment',
                        get_field('about_list_item_3') ?:
                            'Pan-African Reach',
                       
                    ];
                    foreach ($list_items as $item):
                    ?>
                        <li data-animate="fade-up" data-delay="0.08" class="flex items-center gap-[0.625vw] md:gap-2 sm:text-[4vw]">
                            <span class="list-dot w-[0.375vw] h-[0.375vw] bg-text-primary rounded-full flex-shrink-0 md:w-1.5 md:h-1.5"></span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
</div>
                

                <p data-para-anim data-delay="0.16" class="about-subtitle font-subheading w-[90%] text-36 leading-[1.33] tracking-[0.01em] text-text-primary md:text-2xl sm:text-xl">
                    <?php echo esc_html(
                        get_field('about_subtitle') ?:
                            'We design our network with protection in mind so you can stay online, connected, and secure.',
                    ); ?>
                </p>
            </div>
        </div>
    </div>
</section>
