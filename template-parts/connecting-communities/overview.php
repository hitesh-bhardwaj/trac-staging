<?php
if (!defined('ABSPATH')) {
    exit();
}

$overview_label = get_field('cc_overview_label');
$overview_title = get_field('cc_overview_title');
$overview_description = get_field('cc_overview_description');

$overview_image_left = get_field('cc_overview_image_left');
$overview_image_left_url = is_array($overview_image_left)
    ? $overview_image_left['url']
    : '';
$overview_image_left_alt = is_array($overview_image_left)
    ? $overview_image_left['alt']
    : '';

$overview_image_right = get_field('cc_overview_image_right');
$overview_image_right_url = is_array($overview_image_right)
    ? $overview_image_right['url']
    : '';
$overview_image_right_alt = is_array($overview_image_right)
    ? $overview_image_right['alt']
    : '';
?>

<section class="communities-overview relative bg-white px-[5vw] py-[7vw] md:pb-24 sm:py-[15vw] sm:pb-16 md:px-[7vw]" data-section="communities-overview">
    <div class="communities-overview__header max-w-[91.2vw] text-left">
        <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
            <span class="w-6 h-1 bg-brand-secondary"></span>
            <span class="font-body text-brand-secondary text-30 sm:text-[4vw]"><?php echo trac_esc_html(
                $overview_label,
            ); ?></span>
        </div>

        <h2 class="font-heading text-[3.4vw] font-normal leading-[1.3] tracking-[0.01em] text-text-primary mb-[2.3vw] max-w-[63.3vw] lg:text-[44px] sm:text-[34px] md:mb-6 md:max-w-[90%] sm:mb-5 sm:max-w-full" data-heading-anim>
            <?php echo trac_esc_html($overview_title); ?>
        </h2>

        <div class="font-body text-[1.2vw] leading-[1.45] text-text-body w-[60vw] lg:text-[20px] sm:text-[16px] md:w-full">
            <?php foreach (
                preg_split('/\R{2,}/', trim((string) $overview_description))
                as $index => $paragraph
            ): ?>
                <p data-para-anim<?php echo $index > 0
                    ? ' class="mt-[1.8vw] lg:mt-[24px] sm:mt-[18px]"'
                    : ''; ?>><?php echo trac_esc_html(trim($paragraph)); ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="communities-overview__media-grid mx-auto mt-[3.5vw] grid  grid-cols-2 gap-[3vw] md:mt-12 md:max-w-full md:gap-5 sm:mt-10 sm:grid-cols-1 sm:gap-8">
        <figure class="relative overflow-hidden rounded-[2vw] bg-[#f3f3f3] aspect-[77/71] lg:rounded-[28px] sm:rounded-[22px] sm:aspect-square group" data-animate="fade-up" data-delay="0.25">
            <img
                src="<?php echo esc_url($overview_image_left_url); ?>"
                alt="<?php echo esc_attr($overview_image_left_alt); ?>"
                        class="h-full w-full scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"
                loading="lazy"
            >
        </figure>

        <figure class="relative overflow-hidden rounded-[2vw] bg-[#f3f3f3] aspect-[77/71] lg:rounded-[28px] sm:rounded-[22px] sm:aspect-square group" data-animate="fade-up" data-delay="0.3">
            <img
                src="<?php echo esc_url($overview_image_right_url); ?>"
                alt="<?php echo esc_attr($overview_image_right_alt); ?>"
                                        class="h-full w-full scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"

                loading="lazy"
            >
        </figure>
    </div>
</section>
