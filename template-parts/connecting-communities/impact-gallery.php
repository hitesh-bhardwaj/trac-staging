<?php
if (!defined('ABSPATH')) {
    exit();
}

$gallery_images = [
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery1.png',
        'alt' => 'TrAC leaders in Rwanda',
        'class' => 'col-span-5 row-span-1 md:col-span-6 sm:col-span-1',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery2.png',
        'alt' => 'TrAC collaboration discussion',
        'class' => 'col-span-2 row-span-1 md:col-span-3 sm:col-span-1',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery3.png',
        'alt' => 'Digital access training session',
        'class' => 'col-span-2 row-span-1 md:col-span-3 sm:col-span-1',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery4.png',
        'alt' => 'Connecting Communities planning session',
        'class' => 'col-span-2 row-span-1 md:col-span-6 sm:col-span-1',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery5.png',
        'alt' => 'Team reviewing community access plans',
        'class' => 'col-span-2 row-span-1 md:col-span-3 sm:col-span-1',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery6.png',
        'alt' => 'Community Smart Hub presentation',
        'class' => 'col-span-2 row-span-1 md:col-span-3 sm:col-span-1',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery7.png',
        'alt' => 'TrAC Rwanda presentation',
        'class' => 'col-span-2 row-span-1 md:col-span-3 sm:col-span-1',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/communities/gallery8.png',
        'alt' => 'TrAC team at Rwanda Internet Governance Forum',
        'class' => 'col-span-5 row-span-1 md:col-span-3 sm:col-span-1',
    ],
];
?>

<section class="bg-white px-[5.208vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12" data-section="impact-gallery">
    <div class="text-left">
        <div class="mb-[2.865vw] flex items-center justify-start gap-3 md:mb-8" data-animate="fade-up">
            <span class="h-1 w-6 bg-brand-secondary"></span>
            <span class="font-body text-30 text-brand-secondary">Image Gallery</span>
        </div>

        <h2 class="mb-[2.604vw] max-w-[70vw] font-heading text-66 font-normal leading-[1.18] tracking-normal text-text-primary md:mb-8 md:max-w-full md:text-[44px] sm:text-[34px] sm:leading-[1.18]" data-heading-anim>
            Built in Rwanda. Enabled by TrAC.
        </h2>

        <div class="w-[62vw] space-y-[1vw] font-body text-24 leading-[1.55] text-text-body md:max-w-full md:text-xl sm:text-base sm:leading-[1.6] [&_p+p]:mt-[1.563vw] md:[&_p+p]:mt-5" >
            <p data-para-anim >Rwanda is the starting point and headquarters for the Connecting Communities rollout.</p>
            <p data-para-anim >With deep local roots, network expertise, and established infrastructure, TrAC is enabling the first Community Smart Hubs and creating the connectivity foundation that allows the wider model to take shape.</p>
        </div>

        <div class="mt-[5.208vw] grid grid-cols-11 gap-[1.563vw] md:mt-12 md:grid-cols-6 md:gap-5 sm:grid-cols-1 sm:gap-4">
            <?php foreach ($gallery_images as $index => $image): ?>
                <figure class="<?php echo esc_attr($image['class']); ?> m-0 h-[21.458vw] overflow-hidden rounded-[0.833vw] md:h-[260px] md:rounded-2xl sm:h-[230px]" data-animate="fade-up" data-delay="<?php echo esc_attr(0.08 * ($index % 4)); ?>">
                    <img
                        src="<?php echo esc_url($image['src']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>"
                        class="h-full w-full object-cover transition-transform duration-500 scale-105 ease-out hover:scale-100"
                        loading="lazy"
                    >
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
