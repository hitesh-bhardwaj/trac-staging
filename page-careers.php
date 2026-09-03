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

<?php if (have_posts()) {
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
            get_template_part(
                'template-parts/common/hero',
                null,
                [
                    'title_lines' => [
                        get_field('hero_title_line_1') ?:
                            'Work With Us',
                    ],
                    'subtitle' =>
                        get_field('hero_subtitle') ?:
                        ["We're always looking for people who want to do meaningful work, solve real problems, and grow with a team that is shaping connectivity across Rwanda and beyond. ",
                        "If you're interested in working with us, get in touch!"],
                    'button_text' =>
                        get_field('hero_primary_button_text') ?:
                        'Apply',
                    'button_link' =>
                        get_field('hero_primary_button_link') ?:
                        '#open-positions',
                    'media' => [
                        'src' => is_array($hero_image)
                            ? $hero_image['url']
                            : get_template_directory_uri() .
                                '/src/imgs/careers/careers-hero.png',
                        'alt' => is_array($hero_image)
                            ? $hero_image['alt']
                            : 'TrAC team member in modern office workspace',
                    ],
                ],
            );

            // Why Work With Us Section
            // get_template_part('template-parts/careers/why-work');

            // Open Positions Section
            get_template_part('template-parts/careers/open-positions');

            // Job Application Form Section
            get_template_part('template-parts/careers/application-form');

            // CTA Section
            get_template_part('template-parts/front-page/cta');
            ?>
        </main>

        <?php
    }
}

get_footer();
?>
