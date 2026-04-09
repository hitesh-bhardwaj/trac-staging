<?php
if (!defined('ABSPATH')) {
    exit();
}

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="main-content" class="site-main" data-barba="container" data-barba-namespace="enterprise-network">
            <?php get_template_part('template-parts/enterprise-network/hero'); ?>
            <?php get_template_part('template-parts/enterprise-network/services'); ?>
            <?php get_template_part('template-parts/enterprise-network/why-choose'); ?>
            <?php get_template_part('template-parts/enterprise-network/contact'); ?>
            <?php get_template_part('template-parts/enterprise-network/faqs'); ?>
            <?php get_template_part('template-parts/enterprise-network/cta'); ?>


        </main>

        <?php
    }
}

get_footer();
