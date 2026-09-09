<?php
if (!defined('ABSPATH')) {
    exit();
}

$impact_gallery_modal_css =
    get_template_directory_uri() .
    '/src/css/sections/impact-gallery-modal.css';

$gallery_label = get_field('cc_gallery_label');
$gallery_title = get_field('cc_gallery_title');
$gallery_paragraphs = trac_split_lines(get_field('cc_gallery_description'));

$gallery_images = [];
for ($i = 1; $i <= 8; $i++) {
    $image = get_field("cc_gallery_image_{$i}");
    if ($image) {
        $gallery_images[] = [
            'src' => is_array($image) ? $image['url'] : $image,
            'alt' => is_array($image) ? $image['alt'] : '',
        ];
    }
}
?>

<link rel="stylesheet" href="<?php echo esc_url(
    $impact_gallery_modal_css,
); ?>">

<section class="bg-white px-[5.208vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12" data-section="impact-gallery">
    <div class="text-left">
        <div class="mb-[2.865vw] flex items-center justify-start gap-3 md:mb-8" data-animate="fade-up">
            <span class="h-1 w-6 bg-brand-secondary"></span>
            <span class="font-body text-30 text-brand-secondary sm:!text-[4vw]"><?php echo trac_esc_html(
                $gallery_label,
            ); ?></span>
        </div>

        <h2 class="mb-[2.604vw] max-w-[70vw] font-heading text-66 font-normal leading-[1.18] tracking-normal text-text-primary md:mb-8 md:max-w-full md:text-[44px] sm:text-[34px] sm:leading-[1.18]" data-heading-anim>
            <?php echo trac_esc_html($gallery_title); ?>
        </h2>

        <div class="w-[62vw] space-y-[1vw] font-body text-24 leading-[1.55] text-text-body md:max-w-full md:text-xl sm:text-base sm:leading-[1.6] [&_p+p]:mt-[1.563vw] md:[&_p+p]:mt-5 sm:w-full" >
            <?php foreach ($gallery_paragraphs as $paragraph): ?>
                <p data-para-anim ><?php echo trac_esc_html($paragraph); ?></p>
            <?php endforeach; ?>
        </div>

        <div class="impact-gallery-grid mt-[5.208vw] grid grid-cols-9 gap-[1.563vw] md:mt-12 md:gap-5 sm:grid-cols-3 sm:gap-4">
            <?php foreach ($gallery_images as $index => $image): ?>
                <figure class="impact-gallery-grid__item m-0 h-[21.458vw] overflow-hidden rounded-[0.833vw] md:h-[260px] md:rounded-2xl sm:col-span-1 sm:h-[270px] sm:rounded-[14px] <?php echo $index === 0 || $index === 7
                    ? 'col-span-3 sm:col-span-3'
                    : 'col-span-2'; ?>" data-animate="fade-up" data-delay="<?php echo esc_attr(
     0.08 * ($index % 4),
 ); ?>">
                    <button
                        type="button"
                        class="impact-gallery-grid__button block h-full w-full cursor-pointer overflow-hidden border-0 bg-transparent p-0"
                        data-impact-gallery-trigger
                        data-gallery-index="<?php echo esc_attr($index); ?>"
                        aria-label="<?php echo esc_attr(
                            'Open gallery image ' . ($index + 1),
                        ); ?>"
                    >
                        <img
                            src="<?php echo esc_url($image['src']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>"
                            class="h-full w-full object-cover transition-transform duration-500 scale-105 ease-out hover:scale-100"
                            loading="lazy"
                        >
                    </button>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (!empty($gallery_images)): ?>
        <div class="impact-gallery-modal invisible pointer-events-none fixed inset-0 z-[100000] flex items-center justify-center px-[7vw] py-[3vw] lg:px-[62px] lg:py-6 sm:p-4" data-impact-gallery-modal aria-hidden="true">
            <div class="impact-gallery-modal__backdrop absolute inset-0 bg-[rgba(5,12,24,0.82)] backdrop-blur-[10px]" data-impact-gallery-close></div>
            <div class="impact-gallery-modal__dialog relative z-[1] flex h-[min(80vh,820px)] w-[min(76vw,1280px)] flex-col items-center justify-center outline-none lg:h-[78vh] lg:w-full sm:h-[76vh] sm:max-h-[88vh]" role="dialog" aria-modal="true" aria-label="<?php echo esc_attr(
                $gallery_title ?: 'Gallery',
            ); ?>" tabindex="-1">
                <button type="button" class="impact-gallery-modal__close absolute right-[-4.1vw] top-0 z-[4] flex h-[2.5vw] min-h-[42px] w-[2.5vw] min-w-[42px] items-center justify-center rounded-full border border-white/70 bg-transparent text-white transition-all duration-300 hover:border-black/50 hover:bg-black/50 lg:right-[-54px] sm:right-0 sm:top-[-48px] sm:h-10 sm:min-h-10 sm:w-10 sm:min-w-10" data-impact-gallery-close aria-label="Close gallery">
                    <span class="absolute h-0.5 w-[42%] bg-current transition-transform duration-300"></span>
                    <span class="absolute h-0.5 w-[42%] bg-current transition-transform duration-300"></span>
                </button>

                <div class="impact-gallery-modal__media-wrap relative flex h-[calc(100%_-_102px)] min-h-0 w-full items-center justify-center overflow-hidden rounded-[0.75vw] bg-transparent lg:h-[calc(100%_-_96px)] lg:rounded-2xl sm:h-[calc(100%_-_86px)]" data-impact-gallery-media>
                    <div class="impact-gallery-modal__track flex h-full w-full translate-x-0 [will-change:transform]" data-impact-gallery-track>
                        <?php foreach ($gallery_images as $image): ?>
                            <div class="impact-gallery-modal__slide h-full w-full flex-[0_0_100%] overflow-hidden rounded-[inherit]">
                                <img class="impact-gallery-modal__image block h-full w-full bg-transparent object-cover" src="<?php echo esc_url(
                                    $image['src'],
                                ); ?>" alt="<?php echo esc_attr(
    $image['alt'],
); ?>" loading="lazy">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button type="button" class="impact-gallery-modal__nav impact-gallery-modal__nav--prev absolute left-[-5vw] top-[calc((100%_-_102px)/2)] z-[2] flex h-[2.05vw] min-h-[34px] w-[3.6vw] min-w-[58px] -translate-y-1/2 items-center justify-center rounded-full border border-white/70 bg-transparent px-[1vw] text-white transition-colors duration-300 hover:border-brand-secondary hover:bg-brand-secondary disabled:pointer-events-none disabled:cursor-default disabled:border-white/35 disabled:bg-transparent disabled:text-white/30 lg:left-[-58px] lg:top-[calc((100%_-_96px)/2)] lg:h-8 lg:min-h-8 lg:w-12 lg:min-w-12 sm:left-2.5 sm:top-[calc((100%_-_86px)/2)] sm:h-[30px] sm:min-h-[30px] sm:w-9 sm:min-w-9" data-impact-gallery-prev aria-label="Previous image">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>

                <button type="button" class="impact-gallery-modal__nav impact-gallery-modal__nav--next absolute right-[-5vw] top-[calc((100%_-_102px)/2)] z-[2] flex h-[2.05vw] min-h-[34px] w-[3.6vw] min-w-[58px] -translate-y-1/2 items-center justify-center rounded-full border border-white/70 bg-transparent px-[1vw] text-white transition-colors duration-300 hover:border-brand-secondary hover:bg-brand-secondary disabled:pointer-events-none disabled:cursor-default disabled:border-white/35 disabled:bg-transparent disabled:text-white/30 lg:right-[-58px] lg:top-[calc((100%_-_96px)/2)] lg:h-8 lg:min-h-8 lg:w-12 lg:min-w-12 sm:right-2.5 sm:top-[calc((100%_-_86px)/2)] sm:h-[30px] sm:min-h-[30px] sm:w-9 sm:min-w-9" data-impact-gallery-next aria-label="Next image">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>

                <div class="impact-gallery-modal__thumbs mt-[2vw] flex w-full gap-[0.75vw] overflow-x-auto overflow-y-hidden pb-[0.4vw] [scroll-snap-type:x_proximity] [scrollbar-width:none] [-webkit-overflow-scrolling:touch] [&::-webkit-scrollbar]:hidden lg:mt-[18px] lg:gap-2.5 sm:w-full" data-impact-gallery-thumbs>
                    <?php foreach ($gallery_images as $index => $image): ?>
                        <button
                            type="button"
                            class="impact-gallery-modal__thumb h-[4.9vw] max-h-[94px] min-h-[78px] w-[7.8vw] max-w-[150px] min-w-[126px] flex-none overflow-hidden rounded-[0.55vw] border-2 border-white/30 bg-transparent p-0 opacity-60 transition-all duration-300 [scroll-snap-align:center] lg:rounded-[10px] sm:h-[62px] sm:max-h-[62px] sm:min-h-[62px] sm:w-[86px] sm:max-w-[86px] sm:min-w-[86px]"
                            data-impact-gallery-thumb
                            data-gallery-index="<?php echo esc_attr(
                                $index,
                            ); ?>"
                            data-gallery-src="<?php echo esc_url(
                                $image['src'],
                            ); ?>"
                            data-gallery-alt="<?php echo esc_attr(
                                $image['alt'],
                            ); ?>"
                            aria-label="<?php echo esc_attr(
                                'View gallery image ' . ($index + 1),
                            ); ?>"
                        >
                            <img src="<?php echo esc_url(
                                $image['src'],
                            ); ?>" alt="<?php echo esc_attr(
    $image['alt'],
); ?>" loading="lazy">
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
