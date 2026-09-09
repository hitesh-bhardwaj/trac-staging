<?php
/**
 * Template Name: Careers
 * Description: Page template for Careers
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

        <main
            id="main-content"
            class="site-main careers-page"
            data-barba="container"
            data-barba-namespace="careers"
        >
            <?php
            $hero_image = get_field('hero_image');
            get_template_part('template-parts/common/hero', null, [
                'title_lines' => [get_field('hero_title_line_1')],
                'subtitle' => trac_split_lines(get_field('hero_subtitle')),
                'button_text' => get_field('hero_primary_button_text'),
                'button_link' => get_field('hero_primary_button_link'),
                'media' => [
                    'src' => is_array($hero_image) ? $hero_image['url'] : '',
                    'alt' => is_array($hero_image) ? $hero_image['alt'] : '',
                ],
            ]);

            // Open Positions Section
            get_template_part('template-parts/careers/open-positions');

            // Job Application Form Section
            get_template_part('template-parts/careers/application-form');

            // CTA Section
            get_template_part('template-parts/common/cta');
            ?>
        </main>

        <?php
    }
}

get_footer();


?>
