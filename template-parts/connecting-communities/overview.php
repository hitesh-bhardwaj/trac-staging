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
    <div class="communities-overview__header max-w-[91.25vw] text-left">
        <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
            <span class="w-6 h-1 bg-brand-secondary"></span>
            <span class="font-body text-brand-secondary text-30 sm:!text-[4vw]"><?php echo trac_esc_html(
                $overview_label,
            ); ?></span>
        </div>

        <h2 class="font-heading text-[3.438vw] font-normal leading-[1.2425] tracking-[0.01em] text-text-primary mb-[2.396vw] max-w-[63.333vw] lg:text-[44px] lg:leading-[1.18] sm:text-[34px] sm:leading-[1.2] md:mb-6 md:max-w-[90%] sm:mb-5 sm:max-w-full" data-heading-anim>
            <?php echo trac_esc_html($overview_title); ?>
        </h2>

        <div class="font-body text-[1.25vw] leading-[1.8333] text-text-body w-[60vw] lg:text-[20px] lg:leading-[1.7] sm:text-[16px] sm:leading-[1.7] md:w-full">
            <?php foreach (
                preg_split('/\R{2,}/', trim((string) $overview_description))
                as $index => $paragraph
            ): ?>
                <p data-para-anim<?php echo $index > 0
                    ? ' class="mt-[1.823vw] lg:mt-[24px] sm:mt-[18px]"'
                    : ''; ?>><?php echo trac_esc_html(trim($paragraph)); ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="communities-overview__media-grid mx-auto mt-[3.5vw] grid  grid-cols-2 gap-[3vw] md:mt-12 md:max-w-full md:gap-5 sm:mt-10 sm:grid-cols-1 sm:gap-8">
        <figure class="relative overflow-hidden rounded-[2.083vw] bg-[#f3f3f3] aspect-[77/71] lg:rounded-[28px] sm:rounded-[22px] sm:aspect-square group" data-animate="fade-up" data-delay="0.25">
            <img
                src="<?php echo esc_url($overview_image_left_url); ?>"
                alt="<?php echo esc_attr($overview_image_left_alt); ?>"
                        class="h-full w-full scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"
                loading="lazy"
            >
        </figure>

        <figure class="relative overflow-hidden rounded-[2.083vw] bg-[#f3f3f3] aspect-[77/71] lg:rounded-[28px] sm:rounded-[22px] sm:aspect-square group" data-animate="fade-up" data-delay="0.3">
            <img
                src="<?php echo esc_url($overview_image_right_url); ?>"
                alt="<?php echo esc_attr($overview_image_right_alt); ?>"
                                        class="h-full w-full scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"

                loading="lazy"
            >
        </figure>
    </div>
</section>
