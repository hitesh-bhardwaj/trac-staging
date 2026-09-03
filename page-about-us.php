<?php
/**
 * About Us Page Template
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
        $title = get_field('hero_title_line_1') ?: 'About Us';
        $subtitle =
            get_field('hero_subtitle_2') ?:
            'TrAC is a Rwanda-founded internet service provider with over 14 years of experience delivering reliable, high-performance connectivity. From our roots in Rwanda, we are helping businesses and communities across East Africa stay connected, grow with confidence, and build stronger futures.';
        $primary_link =
           
            get_field('hero_primary_button_link') ?: home_url('/contact-us');
        $primary_text =
            get_field('hero_primary_button_text') ?: 'Get Connected';
        // $secondary_link =
            get_field('hero_secondary_button_link') ?: '#products';
        // $secondary_text =
            get_field('hero_secondary_button_text') ?: 'Explore Solutions';

        get_template_part('template-parts/common/hero', null, [
            'grid_classes' =>
                'hero-grid flex items-start justify-between gap-[10vw] md:flex-col md:gap-8 ',
            'text_classes' =>
                'hero-text w-[45%] md:w-full md:max-w-full relative z-[10]',
            'title_classes' =>
                'hero-title font-heading text-white tracking-[0.05vw] mb-6 md:mb-6 sm:mb-4 md:text-center',
            'subtitle_classes' =>
                'hero-subtitle font-body text-24 font-medium text-white mb-[3.125vw] md:w-full md:max-w-full md:mb-8 sm:mb-6 md:text-center',
            'title' => $title,
            'subtitle' => $subtitle,
            'primary' => [
                'text' => $primary_text,
                'link' => $primary_link,
            ],
            'secondary' => [
                'text' => $secondary_text,
                // 'link' => $secondary_link,
            ],
            'media' => [
                'src' =>
                    get_template_directory_uri() .
                    '/src/imgs/about/about-hero.png',
                'alt' => 'Mobile globe visual',
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
            'title' => 'Ready to Get on TrAC?',
            'subtitle' =>
                "Stop paying for internet you're not getting. Join businesses across Africa that trust TrAC.",
            'button_text' => 'Get Connected',
            'button_link' => home_url('/contact-us'),
            'pattern_top_class' => 'top-[-12%] sm:top-0',
        ]);
        ?>
    <?php
    endwhile; ?>
</main>

<?php get_footer();
