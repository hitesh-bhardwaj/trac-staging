<?php
/**
 * Template Name: Carrier Services
 * Description: Carrier Services product page.
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

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="carrier-services">
            <?php get_template_part('template-parts/carrier-services/hero'); ?>

            <?php get_template_part('template-parts/carrier-services/overview'); ?>
            <?php get_template_part('template-parts/carrier-services/infrastructure'); ?>
            <?php get_template_part('template-parts/carrier-services/offerings'); ?>
            <?php get_template_part('template-parts/carrier-services/why-choose-trac'); ?>
            <?php get_template_part('template-parts/carrier-services/contact'); ?>

            <?php get_template_part('template-parts/carrier-services/faqs'); ?>
            <?php get_template_part('template-parts/carrier-services/cta'); ?>
        </main>

        <?php
    }
}

get_footer();
