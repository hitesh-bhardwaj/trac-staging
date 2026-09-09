<?php
if (!defined('ABSPATH')) {
    exit();
}

$collab_label = get_field('cc_collab_label');
$collab_title = get_field('cc_collab_title');
$collab_paragraphs = trac_split_lines(get_field('cc_collab_description'));

$collab_image = get_field('cc_collab_image');
$collab_image_url = is_array($collab_image) ? $collab_image['url'] : '';
$collab_image_alt = is_array($collab_image) ? $collab_image['alt'] : '';
?>

<section class="bg-brand-quaternary px-[5vw] py-[7vw] text-white md:px-[4vw] md:py-[82px] sm:px-[6vw] sm:py-16" data-section="communities-collaborations">
    <div class="grid grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] items-center gap-[5vw] md:grid-cols-1 md:gap-11 sm:gap-8">
        <div class="max-w-[43.75vw] text-left md:max-w-[720px]">
            <div class="mb-[3.333vw] inline-flex items-center gap-[1.302vw] md:mb-8 md:gap-4 sm:mb-6 sm:gap-3" data-animate="fade-up">
                <span class="h-[2px] min-h-[2px] w-[1.354vw] min-w-5 bg-current" aria-hidden="true"></span>
                <span class="font-body text-30 leading-none text-white md:text-xl sm:text-[4vw]"><?php echo trac_esc_html(
                    $collab_label,
                ); ?></span>
            </div>

            <h2 class="mb-[2.344vw] w-[45vw] font-heading text-66 font-normal leading-[1.22] tracking-normal text-white md:mb-6  sm:mb-5 sm:leading-[1.18] sm:w-full" data-heading-anim>
                <?php echo trac_esc_html($collab_title); ?>
            </h2>

            <div class="flex max-w-[40.417vw] flex-col gap-[2.083vw] font-body text-24 leading-[1.5] text-white md:max-w-[720px] md:gap-7 md:text-xl sm:gap-5 sm:text-base sm:leading-[1.55]">
                <?php foreach ($collab_paragraphs as $index => $paragraph): ?>
                    <p data-para-anim data-delay="<?php echo esc_attr(
                        0.2 + $index * 0.08,
                    ); ?>">
                        <?php echo trac_esc_html($paragraph); ?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>

        <figure class="relative m-0 w-full overflow-hidden rounded-[1.667vw] md:max-w-[720px] md:rounded-[26px] sm:rounded-[20px] group" data-animate="fade-up" data-delay="0.2">
            <img
                src="<?php echo esc_url($collab_image_url); ?>"
                alt="<?php echo esc_attr($collab_image_alt); ?>"
                class="block aspect-[1.14/1] w-full h-full rounded-[inherit] object-cover scale-105 transition-transform duration-[600ms] ease-out group-hover:scale-100"
                loading="lazy"
            >
        </figure>
    </div>
</section>
