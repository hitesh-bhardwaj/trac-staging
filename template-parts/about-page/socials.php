<?php
if (!defined('ABSPATH')) {
    exit();
}

$instagram_icon = get_template_directory_uri() . '/src/imgs/about/instagram.png';

$instagram_posts = [
    [
        'image' => get_template_directory_uri() . '/src/imgs/about/socials-1.png',
        'alt' => 'TrAC SME internet social post',
        'link' => '#',
    ],
    [
        'image' => get_template_directory_uri() . '/src/imgs/about/socials-2.png',
        'alt' => 'TrAC connecting communities social post',
        'link' => '#',
    ],
    [
        'image' => get_template_directory_uri() . '/src/imgs/about/socials-3.png',
        'alt' => 'TrAC internet connectivity social post',
        'link' => '#',
    ],
];
?>

<section class="about-socials-section px-[5vw] py-[7%] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
    <div class="mb-[3.646vw] flex items-center gap-[0.833vw] md:mb-8 md:gap-3 sm:mb-6" data-animate="fade-up">
        <span class="label-line h-[0.208vw] w-[1.354vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>
        <span class="font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
            <?php esc_html_e('Our Instagram', 'trac'); ?>
        </span>
    </div>

    <div class="rounded-[1.7vw] bg-brand-tint p-[3vw] md:rounded-3xl md:p-7 sm:rounded-[24px] sm:p-5" data-animate="fade-up">
        <div class="grid grid-cols-3 gap-[1.25vw] md:gap-5 sm:grid-cols-1 sm:gap-5">
            <?php foreach ($instagram_posts as $index => $post): ?>
                <a
                    href="<?php echo esc_url($post['link']); ?>"
                    class="group relative block h-[33vw] w-[26vw] overflow-hidden rounded-[1.2vw] bg-white md:rounded-2xl sm:rounded-[16px]<?php echo $index === 2 ? ' border border-brand-primary-alt' : ''; ?>"
                    aria-label="<?php echo esc_attr($post['alt']); ?>"
                >
                    <img
                        src="<?php echo esc_url($post['image']); ?>"
                        alt="<?php echo esc_attr($post['alt']); ?>"
                        class="h-full w-full scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"
                    >

                    <span class="absolute bottom-[1.042vw] right-[1.042vw] flex h-[2.083vw] w-[2.083vw] items-center justify-center rounded-full bg-white md:bottom-4 md:right-4 md:h-10 md:w-10 sm:bottom-3 sm:right-3 sm:h-9 sm:w-9">
                        <img
                            src="<?php echo esc_url($instagram_icon); ?>"
                            alt=""
                            aria-hidden="true"
                            class="h-full w-full"
                        >
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
