<?php
/**
 * Default Page Template
 *
 * @package Trac
 */

get_header(); ?>

<main id="main-content" class="site-main">
    <?php // Check if page has ACF Flexible Content sections

if (function_exists('have_rows') && have_rows('page_sections')) {
        trac_render_sections('page_sections');
    } else {
        // Default page layout
        while (have_posts()):
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- Page Header -->
                <header class="page-header bg-neutral-950 text-white py-section">
                    <div class="container mx-auto px-4">
                        <div class="max-w-3xl">
                            <?php the_title(
                                '<h1 class="text-display-2 font-heading font-bold mb-4" data-animate="fade-up">',
                                '</h1>',
                            ); ?>

                            <?php if (has_excerpt()): ?>
                                <div class="text-heading-3 text-neutral-400" data-animate="fade-up" data-delay="0.1">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <div class="page-content py-section bg-white">
                    <div class="container mx-auto px-4">
                        <div class="prose prose-lg max-w-3xl mx-auto" data-animate="fade-up">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php
        endwhile;
    } ?>
</main>

<?php get_footer();
