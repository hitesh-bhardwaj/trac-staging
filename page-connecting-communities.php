<?php
/**
 * Template Name: Connecting Communities
 * Description: Page template for Connecting Communities section
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();
?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="main-content" class="site-main connecting-communities-page" data-barba="container" data-barba-namespace="communities">

            <?php
            $communities_sections = [
                'hero',
                'overview',
                'collaborations',
                'community-hub',
                'impact-gallery',
            ];

            foreach ($communities_sections as $section_slug) {
                get_template_part(
                    'template-parts/connecting-communities/' . $section_slug,
                );
            }
            ?>
            <?php get_template_part('template-parts/common/cta', null, [
                'pattern_top_class' => 'top-[-15%]',
                'button_wrapper_class' => '',
                'logo_class' => 'bottom-[1.2vw] md:bottom-4',
                'container_class' => '!py-[5vw] md:!py-12 sm:!py-10',
                'content_class' => '!w-full',
                'title_class' => '!w-full',
                'para_class' => '!w-[52%] md:!w-[70%] sm:!w-full',
            ]); ?>
        </main>

        <?php
    }
}

get_footer();

?>
