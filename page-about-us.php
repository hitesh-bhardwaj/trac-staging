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
            'cta',

        ];

        foreach ($about_page_sections as $section_slug) {
            get_template_part('template-parts/about-page/' . $section_slug);
        }
        ?>
    <?php endwhile; ?>
</main>

<?php get_footer();
