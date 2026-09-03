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
            'services',
            'testimonials',
            'clients',
            'our-network',
            'connecting-communities',
            'faqs',
            'cta',
        ];

        foreach ($front_page_sections as $section_slug) {
            if ($section_slug === 'faqs') {
                get_template_part(
                    'template-parts/common/faqs',
                    null,
                    trac_get_faq_section_args([
                        'id_prefix' => 'front-page-faq',
                    ]),
                );
                continue;
            }

            if ($section_slug === 'cta') {
                get_template_part('template-parts/common/cta');
                continue;
            }

            get_template_part('template-parts/front-page/' . $section_slug);
        }
        ?>
    <?php endif; ?>
</main>

<?php get_footer();
