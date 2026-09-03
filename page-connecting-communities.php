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
            $community_hub_cards = [
                [
                    'title' => 'Internet Access',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-internet-access.svg',
                    'modifier' => 'is-outer-left',
                ],
                [
                    'title' => 'Financial Tools',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-financial-tools.svg',
                    'modifier' => 'is-inner-left',
                ],
                [
                    'title' => 'Digital Education',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-digital-services.svg',
                    'modifier' => 'is-center',
                ],

                [
                    'title' => 'Agriculture and Nutrition',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-learning-platforms.svg',
                    'modifier' => 'is-inner-right',
                ],
                [
                    'title' => 'Clean Water',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-community-support.svg',
                    'modifier' => 'is-outer-right',
                ],
            ];

            $communities_sections = [
                'hero' => [],
                'overview' => [],
                'collaborations' => [],
                'community-hub' => [
                    'community_hub_cards' => $community_hub_cards,
                ],
                'impact-gallery' => [],
            ];

            foreach ($communities_sections as $section_slug => $section_args) {
                get_template_part(
                    'template-parts/connecting-communities/' . $section_slug,
                    null,
                    $section_args,
                );
            }
            ?>
            <?php get_template_part('template-parts/common/cta', null, [
                'title' => 'Learn What is Possible for Your Community',
                'subtitle' => '',
                'para' =>
                    'If you’d like to explore how connectivity can support your community, or have ideas you’d like to discuss, our team is here to help.',
                'button_text' => 'Get Connected',
                'button_link' => '#get-connected',
                'pattern_top_class' => 'top-[-15%]',
                // Move CTA button slightly upward for this page.
                'button_wrapper_class' => '',
                'logo_class' => 'bottom-[1.25vw] md:bottom-4',
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
