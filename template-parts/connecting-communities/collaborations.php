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

<section class="bg-brand-quaternary px-[5vw] py-[7vw] text-white md:py-12 md:px-[7vw] sm:py-16" data-section="communities-collaborations">
    <div class="grid grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] gap-[5vw] md:grid-cols-1 md:gap-11 sm:gap-8">
        <div class="max-w-[43.7vw] text-left md:max-w-[720px]">
            <div class="mb-[3.3vw] inline-flex items-center gap-[1.3vw] md:mb-8 md:gap-4 sm:mb-6 sm:gap-3" data-animate="fade-up">
                <span class="h-[2px] min-h-[2px] w-[1.3vw] min-w-5 bg-current" aria-hidden="true"></span>
                <span class="font-body text-30 leading-none text-white sm:text-[4vw]"><?php echo trac_esc_html(
                    $collab_label,
                ); ?></span>
            </div>

            <h2 class="mb-[2.3vw] w-[45vw] font-heading text-66 font-normal leading-[1.3] tracking-normal text-white md:mb-6 sm:mb-5 md:w-full" data-heading-anim>
                <?php echo trac_esc_html($collab_title); ?>
            </h2>

            <div class="flex max-w-[40.4vw] flex-col gap-[2vw] font-body text-24 leading-[1.45] text-white md:max-w-full md:gap-7 sm:gap-5">
                <?php foreach ($collab_paragraphs as $index => $paragraph): ?>
                    <p data-para-anim data-delay="<?php echo esc_attr(
                        0.2 + $index * 0.08,
                    ); ?>">
                        <?php echo trac_esc_html($paragraph); ?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>

        <figure class="relative m-0 w-full overflow-hidden rounded-[1.6vw] md:max-w-[720px] md:rounded-[26px] sm:rounded-[20px] group" data-animate="fade-up" data-delay="0.2">
            <img
                src="<?php echo esc_url($collab_image_url); ?>"
                alt="<?php echo esc_attr($collab_image_alt); ?>"
                class="block aspect-[1.14/1] w-full h-full rounded-[inherit] object-cover scale-105 transition-transform duration-[600ms] ease-out group-hover:scale-100"
                loading="lazy"
            >
        </figure>
    </div>
</section>
