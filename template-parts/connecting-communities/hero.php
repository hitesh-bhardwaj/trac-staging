<?php
if (!defined('ABSPATH')) {
    exit();
}

$hero_title = 'Connectivity is Where Access Begins';
$hero_subtitle = 'Connecting Communities brings reliable Internet and essential services together, making them easier for communities to access in one connected local platform.';
$hero_description = 'Enabled by TrAC, the model starts with strong connectivity, creating the foundation for financial tools, education, clean water, agriculture, nutrition, and other services that support everyday life.';
$hero_image = get_field('cc_hero_image');
$hero_image_url = is_array($hero_image)
    ? $hero_image['url']
    : get_template_directory_uri() . '/src/imgs/communities/hero-img.png';
$hero_image_alt = is_array($hero_image) && !empty($hero_image['alt'])
    ? $hero_image['alt']
    : 'Connecting Communities platform in Rwanda';

ob_start();
?>
<div class="mt-[2.604vw] md:mt-8" data-hero-reveal data-hero-delay="0.28">
    <img
        src="<?php echo esc_url(get_template_directory_uri() . '/src/imgs/communities/hero-icons.png'); ?>"
        alt="Connecting Communities enabled by TrAC"
        class="h-auto w-[27vw] md:w-[260px] sm:w-[220px]"
        loading="lazy"
    >
</div>
<?php
$hero_text_footer = ob_get_clean();

get_template_part(
    'template-parts/common/hero',
    null,
    [
        'section_classes' =>
            'hero relative min-h-screen overflow-hidden !bg-brand-primary',
        'grid_classes' =>
            'hero-grid flex items-center justify-between gap-[6vw] md:flex-col md:gap-8',
        'text_classes' =>
            'hero-text w-[50%] md:w-full md:max-w-full relative z-[10]',
        'media_classes' => 'hero-media w-[55%] md:w-full',
        'title_lines' => [$hero_title],
        'subtitle_1' => $hero_subtitle,
        'subtitle' => $hero_description,
        'subtitle_classes' =>
            'hero-subtitle font-body text-24 font-medium  text-white mb-0 md:w-full md:max-w-full md:text-left',
        'text_footer' => $hero_text_footer,
        'media' => [
            'src' => $hero_image_url,
            'alt' => $hero_image_alt,
        ],
    ],
);
