<?php
if (!defined('ABSPATH')) {
    exit();
}

$hero_title = get_field('cc_hero_title');
$hero_subtitle = get_field('cc_hero_subtitle');
$hero_description = get_field('cc_hero_description');

$hero_image = get_field('cc_hero_image');
$hero_image_url = is_array($hero_image) ? $hero_image['url'] : '';
$hero_image_alt = is_array($hero_image) ? $hero_image['alt'] : '';

$hero_icons_image = get_field('cc_hero_icons_image');
$hero_icons_image_url = is_array($hero_icons_image)
    ? $hero_icons_image['url']
    : '';
$hero_icons_image_alt = is_array($hero_icons_image)
    ? $hero_icons_image['alt']
    : '';

ob_start();
if ($hero_icons_image_url):
    ?>
<div class="mt-[2.604vw] md:mt-8" data-hero-reveal data-hero-delay="0.28">
    <img
        src="<?php echo esc_url($hero_icons_image_url); ?>"
        alt="<?php echo esc_attr($hero_icons_image_alt); ?>"
        class="h-auto w-[27vw] md:w-[260px] sm:w-[220px]"
        loading="lazy"
    >
</div>
<?php
endif;
$hero_text_footer = ob_get_clean();

get_template_part('template-parts/common/hero', null, [
    'section_classes' =>
        'hero relative min-h-screen overflow-hidden !bg-brand-primary',
    'grid_classes' =>
        'hero-grid flex items-center justify-between gap-[6vw] md:flex-col md:gap-8 ',
    'text_classes' =>
        'hero-text w-[50%] md:w-full md:max-w-full relative z-[10]',
    'media_classes' => 'hero-media w-[55%] md:w-full sm:pb-10',
    'title_lines' => [$hero_title],
    'title_classes' =>
        'hero-title text-[4vw] font-heading text-white tracking-[0.05vw] mb-6 md:mb-8 sm:mb-7',
    'subtitle_1' => $hero_subtitle,
    'subtitle_1_classes' =>
        'hero-subtitle-1 font-heading pr-0.2 text-36 font-normal leading-[1.35] text-white mb-[1vw] md:mb-7 md:text-[34px] sm:mb-6 sm:text-[6vw]',
    'subtitle' => $hero_description,
    'subtitle_classes' =>
        'hero-subtitle font-body text-24 font-medium  text-white mb-0 md:w-full md:max-w-full md:text-left',
    'text_footer' => $hero_text_footer,
    'media' => [
        'src' => $hero_image_url,
        'alt' => $hero_image_alt,
    ],
]);
