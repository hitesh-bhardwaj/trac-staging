<?php
/**
 * Front Page Template - Trac/Enigma Design
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();
?>

<main id="main-content" class="site-main" data-barba="container" data-barba-namespace="home">
    <?php if (function_exists('have_rows') && have_rows('page_sections')): ?>
        <?php trac_render_sections('page_sections'); ?>
    <?php else: ?>
        <?php
        $front_page_sections = [
            'hero',
            'about',
            'why-trac',
            'services',
            'testimonials',
            'clients',
            'our-network',
            'faqs',
            'cta',
        ];

        foreach ($front_page_sections as $section_slug) {
            get_template_part('template-parts/front-page/' . $section_slug);
        }
        ?>
    <?php endif; ?>
</main>

<?php get_footer();
