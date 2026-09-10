<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="relative bg-white overflow-hidden min-h-auto" data-section="about" id="about">
    <div class="about-container w-full px-[5vw] py-[7vw] md:px-[7vw] md:py-20  sm:py-[20%] sm:pb-[30%]">
        <div class="about-label flex items-center gap-[1vw] mb-14 md:gap-4 md:mb-24 sm:mb-14" data-animate="fade-up">
            <span class="label-line w-[1.5vw] h-[0.2vw] bg-brand-secondary md:w-6 md:h-1 sm:w-5"></span>
            <span class="label-text font-body text-30 text-brand-secondary sm:text-[4vw]"><?php echo trac_esc_html(
                get_field('about_label'),
            ); ?></span>
        </div>

        <div class="about-grid flex justify-between gap-[5vw] items-center md:grid-cols-1 md:gap-[15vw] sm:gap-[25vw] md:flex-col-reverse ">
            <div class="about-visual w-[36%] md:w-[70%]" data-animate="fade-right">
                <?php $about_image = get_field('about_image'); ?>
                <img
                    src="<?php echo esc_url($about_image); ?>"
                    alt="TrAC lion wireframe illustration"
                    class="w-full mx-auto scale-[1.7] translate-x-[-50%] md:scale-[1.5] sm:scale-[1.7]"
                    loading="lazy"
                >
            </div>

            <div class="about-content w-[50%] mt-[-7vw] md:w-full">
	                <h2 data-para-anim  class="font-heading font-normal text-66 leading-[1.3] tracking-[0.01em] text-text-primary mb-[2vw] md:mb-8 sm:mb-6">
	                    <?php echo trac_esc_html(get_field('about_title')); ?>
	                </h2>
                <div class="w-full flex gap-[7vw] mb-[3vw] ml-[1vw] sm:flex-col sm:gap-[2vw] sm:mb-6">

                <ul class="font-body text-24 leading-[1.45] text-text-body space-y-4 md:text-[2.5vw] md:space-y-2 sm:space-y-[2vw]">
                    <?php
                    $list_items = [
                        get_field('about_list_item_1'),
                        get_field('about_list_item_3'),
                        get_field('about_list_item_5'),
                    ];
                    foreach ($list_items as $item): ?>
                        <li data-animate="fade-up" data-delay="0.08" class="list-none flex items-center gap-3 md:gap-2 sm:text-[4vw]">
                            <span class="list-dot w-[0.3vw] h-[0.3vw] bg-text-primary rounded-full flex-shrink-0 md:w-1.5 md:h-1.5"></span>
                            <span><?php echo trac_esc_html($item); ?></span>
                        </li>
                    <?php endforeach;
                    ?>
                </ul>
                <ul class="font-body text-24 leading-[1.45] text-text-body space-y-4 md:text-[2.5vw] md:space-y-2 sm:space-y-[2vw]">
                    <?php
                    $list_items = [
                        get_field('about_list_item_2'),
                        get_field('about_list_item_4'),
                        get_field('about_list_item_6'),
                    ];
                    foreach ($list_items as $item): ?>
                        <li data-animate="fade-up" data-delay="0.08" class="list-none flex items-center gap-3 md:gap-2 sm:text-[4vw]">
                            <span class="list-dot w-[0.3vw] h-[0.3vw] bg-text-primary rounded-full flex-shrink-0 md:w-1.5 md:h-1.5"></span>
                            <span><?php echo trac_esc_html($item); ?></span>
                        </li>
                    <?php endforeach;
                    ?>
                </ul>
</div>
                

                <p data-para-anim data-delay="0.16" class="font-subheading font-normal w-[90%] text-36 leading-[1.45] tracking-[0.01em] text-text-primary md:text-[1.25rem]">
                    <?php echo trac_esc_html(get_field('about_subtitle')); ?>
                </p>
            </div>
        </div>
    </div>
</section>
