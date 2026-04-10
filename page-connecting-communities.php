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

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="main-content" class="site-main connecting-communities-page" data-barba="container" data-barba-namespace="communities">

            <?php
            // Get ACF fields with fallbacks
            $hero_title =
                get_field('cc_hero_title') ?: 'Connectivity Is Where It All Begins';
            $hero_subtitle =
                get_field('cc_hero_subtitle') ?:
                'Access to services starts with access to connectivity.';
            $hero_description =
                get_field('cc_hero_description') ?:
                'Without it, systems cannot function, platforms cannot reach people, and opportunities remain out of reach. TrAC provides that foundation, building the infrastructure that enables everything else to work.';
            $hero_image = get_field('cc_hero_image');
            $hero_image_url = $hero_image
                ? $hero_image['url']
                : get_template_directory_uri() . '/src/imgs/connecting-communities-hero.jpg';
            $hero_image_alt = $hero_image
                ? $hero_image['alt']
                : 'TrAC Connectivity Network - People Connected';

            $overview_label = get_field('cc_overview_label') ?: 'TrAc Overview';
            $overview_title =
                get_field('cc_overview_title') ?:
                'A Stronger Network for Greater Impact';
            $overview_description =
                get_field('cc_overview_description') ?:
                "TransAfrica Communications (TrAC) was built on a simple idea—reliable internet can empower people and businesses. Since 2012, it has grown from Rwanda into a regional provider across East Africa, delivering.\n\nNow, in partnership with Connecting Communities Africa, TrAC is expanding its reach and impact bringing connectivity to underserved regions and enabling more communities to learn, work, and grow.";

            $overview_image_left = get_field('cc_overview_image_left');
            $overview_image_left_url = $overview_image_left
                ? $overview_image_left['url']
                : 'https://www.figma.com/api/mcp/asset/440ca199-986f-4ff6-956c-47111fc17ce0';
            $overview_image_left_alt = $overview_image_left
                ? $overview_image_left['alt']
                : 'TrAC team at a community event';

            $overview_image_right = get_field('cc_overview_image_right');
            $overview_image_right_url = $overview_image_right
                ? $overview_image_right['url']
                : 'https://www.figma.com/api/mcp/asset/48943b59-ac80-4c7d-b127-784a32d23ef9';
            $overview_image_right_alt = $overview_image_right
                ? $overview_image_right['alt']
                : 'TrAC team group photo outdoors';

            $collaboration_items = [
                [
                    'title' => 'Expanding Access',
                    'description' =>
                        'Extending reliable connectivity to rural and underserved communities bringing more people online where access was previously limited.',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/communities-collab-expanding-access.svg',
                    'expanded' => true,
                ],
                [
                    'title' => 'Enabling Essential Services',
                    'description' =>
                        'Supporting schools, health facilities, and community hubs with connectivity that makes essential digital services reachable and dependable.',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/communities-collab-essential-services.svg',
                    'expanded' => false,
                ],
                [
                    'title' => 'Strengthening Infrastructure',
                    'description' =>
                        'Building resilient last-mile and backbone infrastructure that can support long-term connectivity growth across priority regions.',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/communities-collab-infrastructure.svg',
                    'expanded' => false,
                ],
                [
                    'title' => 'Creating Long-Term Impact',
                    'description' =>
                        'Combining investment, execution, and local partnership to deliver durable outcomes for the communities that rely on access every day.',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/communities-collab-impact.svg',
                    'expanded' => false,
                ],
            ];

            $community_hub_cards = [
                [
                    'title' => 'Internet Access',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-internet-access.svg',
                    'modifier' => 'is-outer-left',
                ],
                [
                    'title' => 'Digital Services',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-digital-services.svg',
                    'modifier' => 'is-inner-left',
                ],
                [
                    'title' => 'Financial Tools',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-financial-tools.svg',
                    'modifier' => 'is-center',
                ],
                [
                    'title' => 'Learning Platforms',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-learning-platforms.svg',
                    'modifier' => 'is-inner-right',
                ],
                [
                    'title' => 'Community Support',
                    'icon' =>
                        get_template_directory_uri() .
                        '/src/assets/icons/community-hub-community-support.svg',
                    'modifier' => 'is-outer-right',
                ],
            ];

            $impact_gallery_images = [
                get_template_directory_uri() . '/src/imgs/impact-1.jpg',
                get_template_directory_uri() . '/src/imgs/impact-2.jpg',
                get_template_directory_uri() . '/src/imgs/impact-3.jpg',
                get_template_directory_uri() . '/src/imgs/impact-4.jpg',
                get_template_directory_uri() . '/src/imgs/impact-5.jpg',
                get_template_directory_uri() . '/src/imgs/impact-6.jpg',
            ];

            $communities_sections = [
                'hero' => [
                    'hero_title' => $hero_title,
                    'hero_subtitle' => $hero_subtitle,
                    'hero_description' => $hero_description,
                    'hero_image_url' => $hero_image_url,
                    'hero_image_alt' => $hero_image_alt,
                ],
                'overview' => [
                    'overview_label' => $overview_label,
                    'overview_title' => $overview_title,
                    'overview_description' => $overview_description,
                    'overview_image_left_url' => $overview_image_left_url,
                    'overview_image_left_alt' => $overview_image_left_alt,
                    'overview_image_right_url' => $overview_image_right_url,
                    'overview_image_right_alt' => $overview_image_right_alt,
                ],
                'collaborations' => [
                    'collaboration_items' => $collaboration_items,
                ],
                'community-hub' => [
                    'community_hub_cards' => $community_hub_cards,
                ],
                'impact-gallery' => [
                    'impact_gallery_images' => $impact_gallery_images,
                ],
            ];

            foreach ($communities_sections as $section_slug => $section_args) {
                get_template_part(
                    'template-parts/connecting-communities/' . $section_slug,
                    null,
                    $section_args,
                );
            }
            ?>

            <?php get_template_part('template-parts/front-page/faqs'); ?>
            <?php get_template_part('template-parts/connecting-communities/cta'); ?>
        </main>

        <?php
    }
}

get_footer(); ?>
