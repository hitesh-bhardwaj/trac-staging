<?php
/**
 * Template Name: Partners
 * Description: Partners page (Hero + FAQs + CTA), using existing global animations.
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="partners">
            <?php get_template_part('template-parts/partners/hero'); ?>
            <?php get_template_part('template-parts/partners/partner-program'); ?>
            <?php get_template_part('template-parts/partners/partner-network'); ?>
            <?php get_template_part('template-parts/partners/partner-voices'); ?>
            <?php get_template_part('template-parts/front-page/faqs'); ?>
            <?php
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
        </main>

        <?php
    }
}

get_footer();
