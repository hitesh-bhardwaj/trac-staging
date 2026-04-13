<?php
/**
 * Template Name: Home Internet
 * Description: Home Internet product page (hero + shared sections), using existing global animations.
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

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="home-internet">
            <?php get_template_part('template-parts/home-internet/hero'); ?>

            <?php get_template_part('template-parts/home-internet/why-trac'); ?>
            <?php get_template_part('template-parts/home-internet/packages'); ?>
            <?php get_template_part('template-parts/home-internet/installation'); ?>

            <?php // Reuse existing sections until Home Internet-specific sections are designed. ?>
            <?php get_template_part('template-parts/home-internet/faqs'); ?>
            <?php get_template_part('template-parts/home-internet/cta'); ?>
        </main>

        <?php
    }
}

get_footer();
