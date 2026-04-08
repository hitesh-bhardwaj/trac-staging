<?php
/**
 * Main Template File
 *
 * @package Trac
 */

get_header(); ?>

<main id="main-content" class="site-main">
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(
    'container mx-auto px-4 py-section',
); ?>>
                <header class="entry-header mb-8">
                    <?php the_title(
                        '<h1 class="text-heading-1 font-heading font-bold">',
                        '</h1>',
                    ); ?>
                </header>

                <div class="entry-content prose prose-lg max-w-none">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php
        endwhile; ?>
    <?php else: ?>
        <section class="no-content container mx-auto px-4 py-section text-center">
            <h1 class="text-heading-2 font-heading mb-4"><?php esc_html_e(
                'Nothing Found',
                'trac',
            ); ?></h1>
            <p class="text-body-lg text-neutral-600"><?php esc_html_e(
                'It seems we can\'t find what you\'re looking for.',
                'trac',
            ); ?></p>
        </section>
    <?php endif; ?>
</main>

<?php get_footer();
