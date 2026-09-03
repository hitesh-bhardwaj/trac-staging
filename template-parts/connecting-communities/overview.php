<?php
if (!defined('ABSPATH')) {
    exit();
}

$overview_label = 'Overview';
$overview_title = 'What is Connecting Communities?';
$overview_description = "Connecting Communities (CC) is a platform that connects infrastructure, services, and communities.\n\nThe idea is simple: start with reliable Internet, then bring useful services closer to the people who need them. By connecting technology, local access points, and specialised services, CC helps turn connectivity into practical opportunities for everyday life.";

$overview_image_left = get_field('cc_overview_image_left');
$overview_image_left_url = is_array($overview_image_left) && !empty($overview_image_left['url'])
    ? $overview_image_left['url']
    : get_template_directory_uri() . '/src/imgs/communities/overview-1.png';
$overview_image_left_alt = is_array($overview_image_left) && !empty($overview_image_left['alt'])
    ? $overview_image_left['alt']
    : 'TrAC team at a community event';

$overview_image_right = get_field('cc_overview_image_right');
$overview_image_right_url = is_array($overview_image_right) && !empty($overview_image_right['url'])
    ? $overview_image_right['url']
    : get_template_directory_uri() . '/src/imgs/communities/overview-2.png';
$overview_image_right_alt = is_array($overview_image_right) && !empty($overview_image_right['alt'])
    ? $overview_image_right['alt']
    : 'TrAC team group photo outdoors';
?>

<section class="communities-overview relative bg-white px-[5vw] pt-[3%] pb-[8.333vw] md:px-[4vw] md:pb-24 sm:px-[6vw] sm:pb-16" data-section="communities-overview">
    <div class="communities-overview__header max-w-[91.25vw] text-left">
        <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
            <span class="w-6 h-1 bg-brand-secondary"></span>
            <span class="font-body text-brand-secondary text-30"><?php echo esc_html($overview_label); ?></span>
        </div>

        <h2 class="communities-overview__title mb-[2.396vw] max-w-[63.333vw] md:mb-6 md:max-w-[90%] sm:mb-5 sm:max-w-full" data-heading-anim>
            <?php echo esc_html($overview_title); ?>
        </h2>

        <div class="communities-overview__description max-w-[58vw]">
            <?php foreach (preg_split('/\R{2,}/', trim($overview_description)) as $paragraph): ?>
                <p data-para-anim><?php echo esc_html(trim($paragraph)); ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="communities-overview__media-grid mx-auto mt-[5.99vw] grid  grid-cols-2 gap-[1.615vw] md:mt-12 md:max-w-full md:gap-5 sm:mt-10 sm:grid-cols-1 sm:gap-4">
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
