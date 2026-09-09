<?php
/**
 * Template Name: About Us
 * Description: About Us page (hero + who we are + what we do + vision & mission + team + socials).
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();
?>

<main id="main-content" class="site-main" data-barba="container" data-barba-namespace="home">
    <?php while (have_posts()):
        the_post(); ?>
        <?php
        $hero_image = get_field('hero_image');

        get_template_part('template-parts/common/hero', null, [
            'grid_classes' =>
                'hero-grid flex items-start justify-between gap-[10vw] md:flex-col md:gap-8  ',
            'text_classes' =>
                'hero-text w-[45%] md:w-full md:max-w-full relative z-[10]',
            'title_classes' =>
                'hero-title font-heading text-white tracking-[0.05vw] mb-6 md:mb-6 sm:mb-4',
            'subtitle_classes' =>
                'hero-subtitle font-body text-24 font-medium text-white mb-[3.125vw] md:w-full md:max-w-full md:mb-8 sm:mb-6',
            'title' => get_field('hero_title'),
            'subtitle' => get_field('hero_subtitle_2'),
            'primary' => [
                'text' => get_field('hero_primary_button_text'),
                'link' => get_field('hero_primary_button_link'),
            ],
            'secondary' => [
                'text' => get_field('hero_secondary_button_text'),
                'link' => get_field('hero_secondary_button_link'),
            ],
            'media' => [
                'src' => is_array($hero_image) ? $hero_image['url'] : '',
                'alt' => is_array($hero_image) ? $hero_image['alt'] : '',
            ],
        ]);

        $about_page_sections = [
            'who-we-are',
            'what-we-do',
            'vision-mission',
            'our-team',
            'socials',
        ];

        foreach ($about_page_sections as $section_slug) {
            get_template_part('template-parts/about-page/' . $section_slug);
        }

        // Shared CTA
        get_template_part('template-parts/common/cta', null, [
            'pattern_top_class' => 'top-[-12%] sm:top-0',
        ]);
        ?>
    <?php
    endwhile; ?>
</main>

<?php get_footer();
