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

?>

    <!-- Hero Section -->
    <section class="communities-hero relative w-full min-h-screen bg-white pt-[13.021vw] pb-[6.25vw] px-[5.208vw] md:pt-32 md:pb-16 md:px-[4vw] sm:pt-24 sm:pb-12 sm:px-[6vw]" data-section="communities-hero">

        <!-- Hero Text Content -->
        <div class="hero-content text-center mb-[5.208vw] md:mb-16 sm:mb-12 space-y-[2vw]">
            <!-- Main Heading -->
            <h1 class="hero-title font-heading text-[3.958vw] leading-[5vw] tracking-[0.04vw] text-[#111] max-w-[71.51vw] mx-auto md:text-6xl md:leading-[1.2] md:mb-12 sm:text-4xl sm:mb-8" data-animate="fade-up">
                <?php echo esc_html($hero_title); ?>
            </h1>

            <!-- Subheading -->
            <p class="hero-subtitle-1 !text-center font-body font-normal text-text-body w-[70%] mx-auto mb-[3.125vw] md:max-w-full md:mb-8 sm:mb-6" data-animate="fade-up" data-delay="0.1">
                <?php echo esc_html($hero_subtitle); ?>
            </p>

            <!-- Description -->
            <p class="hero-description font-body text-[1.25vw] leading-[2.083vw] text-[#1e1e1e] max-w-[46.927vw] mx-auto md:text-xl md:leading-[1.6] md:max-w-[90%] sm:text-lg sm:leading-[1.5] sm:max-w-full" data-animate="fade-up" data-delay="0.2">
                <?php echo esc_html($hero_description); ?>
            </p>
        </div>

        <!-- Hero Image -->
        <div class="hero-image-wrapper relative bg-[#edecec] rounded-[2.083vw] overflow-hidden h-[30.99vw] max-w-[89.583vw] mx-auto md:rounded-3xl md:h-[400px] sm:rounded-2xl sm:h-[300px]" data-animate="fade-up" data-delay="0.3">
            <img
                src="<?php echo esc_url($hero_image_url); ?>"
                alt="<?php echo esc_attr($hero_image_alt); ?>"
                class="absolute inset-0 w-full h-full object-cover"
                loading="lazy"
            >
        </div>

    </section>

    <section class="communities-overview relative bg-white px-[5.208vw] pb-[8.333vw] md:px-[4vw] md:pb-24 sm:px-[6vw] sm:pb-16" data-section="communities-overview">
        <div class="communities-overview__header mx-auto max-w-[91.25vw] text-center">
            <div class="communities-overview__eyebrow mx-auto mb-[2.24vw] inline-flex items-center gap-[1.042vw] md:mb-6 md:gap-4 sm:mb-4 sm:gap-3" data-animate="fade-up">
                <span class="communities-overview__eyebrow-line" aria-hidden="true"></span>
                <span class="communities-overview__eyebrow-text"><?php echo esc_html(
                    $overview_label
                ); ?></span>
            </div>

            <h2 class="communities-overview__title mx-auto mb-[2.396vw] max-w-[63.333vw] md:mb-6 md:max-w-[90%] sm:mb-5 sm:max-w-full" data-animate="fade-up" data-delay="0.1">
                <?php echo esc_html($overview_title); ?>
            </h2>

            <div class="communities-overview__description mx-auto max-w-[55.156vw]" data-animate="fade-up" data-delay="0.2">
                <?php foreach (preg_split('/\R{2,}/', trim($overview_description)) as $paragraph): ?>
                    <p><?php echo esc_html(trim($paragraph)); ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="communities-overview__media-grid mx-auto mt-[5.99vw] grid max-w-[91.25vw] grid-cols-2 gap-[1.615vw] md:mt-12 md:max-w-full md:gap-5 sm:mt-10 sm:grid-cols-1 sm:gap-4">
            <figure class="communities-overview__media-card" data-animate="fade-up" data-delay="0.25">
                <img
                    src="<?php echo esc_url($overview_image_left_url); ?>"
                    alt="<?php echo esc_attr($overview_image_left_alt); ?>"
                    class="communities-overview__media-image"
                    loading="lazy"
                >
            </figure>

            <figure class="communities-overview__media-card" data-animate="fade-up" data-delay="0.3">
                <img
                    src="<?php echo esc_url($overview_image_right_url); ?>"
                    alt="<?php echo esc_attr($overview_image_right_alt); ?>"
                    class="communities-overview__media-image"
                    loading="lazy"
                >
            </figure>
        </div>
    </section>

    <section class="communities-collaborations" data-section="communities-collaborations">
        <div class="communities-collaborations__grid">
            <div class="communities-collaborations__intro">
                <div class="communities-collaborations__eyebrow" data-animate="fade-up">
                    <span class="communities-collaborations__eyebrow-line" aria-hidden="true"></span>
                    <span class="communities-collaborations__eyebrow-text">Our Collaborations</span>
                </div>

                <h2 class="communities-collaborations__title" data-animate="fade-up" data-delay="0.1">
                    Working Together to Bridge the Digital Divide
                </h2>

                <p class="communities-collaborations__description" data-animate="fade-up" data-delay="0.2">
                    Real impact happens through collaboration. Our partnership
                    with Connecting Communities Africa brings together
                    investment, expertise, and a shared mission to create
                    inclusive connectivity at scale.
                </p>
            </div>

            <div class="communities-collaborations__accordion" data-collab-accordion>
                <?php foreach ($collaboration_items as $index => $item): ?>
                    <article
                        class="communities-collaborations__item"
                        data-collab-item
                        <?php echo $item['expanded']
                            ? 'data-open'
                            : ''; ?>
                        data-animate="fade-up"
                        data-delay="<?php echo esc_attr(
                            0.2 + $index * 0.05
                        ); ?>"
                    >
                        <button
                            type="button"
                            class="communities-collaborations__button"
                            data-collab-trigger
                            aria-expanded="<?php echo $item['expanded']
                                ? 'true'
                                : 'false'; ?>"
                            aria-controls="communities-collab-panel-<?php echo esc_attr(
                                $index
                            ); ?>"
                            id="communities-collab-trigger-<?php echo esc_attr(
                                $index
                            ); ?>"
                        >
                            <span class="communities-collaborations__icon-wrap" aria-hidden="true">
                                <img
                                    src="<?php echo esc_url($item['icon']); ?>"
                                    alt=""
                                    class="communities-collaborations__icon"
                                    loading="lazy"
                                >
                            </span>

                            <span class="communities-collaborations__divider" aria-hidden="true"></span>

                            <span class="communities-collaborations__content">
                                <span class="communities-collaborations__item-title">
                                    <?php echo esc_html($item['title']); ?>
                                </span>
                                <span
                                    class="communities-collaborations__content-body"
                                    data-collab-panel
                                    id="communities-collab-panel-<?php echo esc_attr(
                                        $index
                                    ); ?>"
                                    aria-hidden="<?php echo $item['expanded']
                                        ? 'false'
                                        : 'true'; ?>"
                                >
                                    <span class="communities-collaborations__content-body-inner">
                                        <span class="communities-collaborations__item-description">
                                            <?php echo esc_html(
                                                $item['description']
                                            ); ?>
                                        </span>
                                    </span>
                                </span>
                            </span>

                            <span class="communities-collaborations__toggle" aria-hidden="true">
                                <span class="communities-collaborations__toggle-bars">
                                    <span class="communities-collaborations__toggle-bar communities-collaborations__toggle-bar--h"></span>
                                    <span class="communities-collaborations__toggle-bar communities-collaborations__toggle-bar--v"></span>
                                </span>
                            </span>
                        </button>

                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="community-hub-section relative overflow-hidden bg-white" data-section="community-hub">
        <div class="community-hub-container relative z-10 px-[5.208vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
            <div class="community-hub-header mx-auto max-w-[68vw] text-center md:max-w-[90%] sm:max-w-full">
                <div class="community-hub-label mx-auto mb-[1.823vw] inline-flex items-center gap-[0.938vw] md:mb-5 md:gap-3 sm:mb-4 sm:gap-3" data-animate="fade-up">
                    <span class="community-hub-label__line" aria-hidden="true"></span>
                    <span class="community-hub-label__text">Community Hub Sites (CHS)</span>
                </div>

                <h2 class="community-hub-title mx-auto mb-[2.292vw] max-w-[68.438vw] md:mb-6 md:max-w-full sm:mb-5" data-animate="fade-up" data-delay="0.1">
                    TrAC is leading the rollout of Community Hub Sites across Rwanda.
                </h2>

                <div class="community-hub-description mx-auto max-w-[59.948vw]" data-animate="fade-up" data-delay="0.2">
                    <p>These hubs are physical access points designed to bring connectivity and essential services directly into communities.</p>
                    <p>Each hub is built on TrAC infrastructure and serves as a local centre for:</p>
                </div>
            </div>

            <div class="community-hub-cards-wrap relative mx-auto mt-[10vw] max-w-[94.792vw] md:mt-12 md:max-w-full sm:mt-10">
                <canvas class="community-hub-canvas absolute inset-0 h-full w-full" data-community-hub-canvas></canvas>

                <div class="community-hub-cards" data-community-hub-cards>
                    <?php foreach (
                        $community_hub_cards
                        as $index => $card
                    ): ?>
                        <article
                            class="community-hub-card <?php echo esc_attr(
                                $card['modifier']
                            ); ?>"
                            data-community-hub-card
                            data-card-index="<?php echo esc_attr($index); ?>"
                        >
                            <img
                                src="<?php echo esc_url($card['icon']); ?>"
                                alt=""
                                class="community-hub-card__icon"
                                loading="lazy"
                            >
                            <h3 class="community-hub-card__title">
                                <?php echo esc_html($card['title']); ?>
                            </h3>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="impact-gallery-section" data-section="impact-gallery">
        <div class="impact-gallery-stage">
            <div class="impact-gallery-sticky">
                <div class="impact-gallery-header">
                    <div class="impact-gallery-label" data-animate="fade-up">
                        <span class="impact-gallery-label__line" aria-hidden="true"></span>
                        <span class="impact-gallery-label__text">Image Gallery</span>
                    </div>

                    <h2 class="impact-gallery-title" data-animate="fade-up" data-delay="0.1">
                        <span class="impact-gallery-title__secondary">Impact in Action</span>
                        <!-- <span class="impact-gallery-title__secondary">in Action</span> -->
                    </h2>
                </div>

                <div class="impact-gallery-canvas">
                    <?php foreach ($impact_gallery_images as $index => $image): ?>
                        <figure
                            class="impact-gallery-image impact-gallery-image--<?php echo esc_attr(
                                $index + 1
                            ); ?>"
                            data-impact-image
                            data-impact-index="<?php echo esc_attr($index); ?>"
                        >
                            <img
                                src="<?php echo esc_url($image); ?>"
                                alt=""
                                class="impact-gallery-image__img"
                                loading="lazy"
                            >
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/front-page/faqs'); ?>

    <?php get_template_part('template-parts/front-page/cta'); ?>

</main>

<?php get_footer(); ?>
