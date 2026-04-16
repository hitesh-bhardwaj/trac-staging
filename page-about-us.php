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
        $about_page_sections = [
            'hero',
            'who-we-are',
            'what-we-do',
            'vision-mission',
            'trac-story',
            'our-team',
        ];

        foreach ($about_page_sections as $section_slug) {
            get_template_part('template-parts/about-page/' . $section_slug);
        }

        // Shared CTA
        get_template_part(
            'template-parts/front-page/cta',
            null,
            [
                'title' => 'Ready to Get on TrAC?',
                'subtitle' =>
                    "Stop paying for internet you're not getting. Join businesses across Africa that trust TrAC.",
                'button_text' => 'Get Connected',
                'button_link' => '#get-connected',
                'pattern_top_class' => 'top-[-12%] sm:top-0',
            ],
        );
        ?>
    <?php endwhile; ?>
</main>

<?php get_footer();
