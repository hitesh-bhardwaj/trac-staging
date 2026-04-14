<?php
/**
 * Template Name: SME Internet
 * Description: SME Internet product page (hero + FAQs + CTA), using existing global animations.
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

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="sme-internet">
            <?php get_template_part('template-parts/sme-internet/hero'); ?>
            <?php get_template_part('template-parts/sme-internet/problem-statement'); ?>
            <?php get_template_part('template-parts/sme-internet/product-overview'); ?>
            <?php get_template_part('template-parts/sme-internet/plans'); ?>
            <?php get_template_part('template-parts/sme-internet/faqs'); ?>
            <?php get_template_part('template-parts/sme-internet/cta'); ?>
        </main>

        <?php
    }
}

get_footer();
