<?php
if (!defined('ABSPATH')) {
    exit();
}

$instagram_icon =
    get_template_directory_uri() . '/src/imgs/about/instagram.png';

$instagram_posts = [
    [
        'image' =>
            get_template_directory_uri() . '/src/imgs/about/socials-1.png',
        'alt' => 'TrAC SME internet social post',
        'link' => 'https://www.instagram.com/',
    ],
    [
        'image' =>
            get_template_directory_uri() . '/src/imgs/about/socials-2.png',
        'alt' => 'TrAC connecting communities social post',
        'link' => 'https://www.instagram.com/',
    ],
    [
        'image' =>
            get_template_directory_uri() . '/src/imgs/about/socials-3.png',
        'alt' => 'TrAC internet connectivity social post',
        'link' => 'https://www.instagram.com/',
    ],
];
?>

<section class="about-socials-section px-[5vw] py-[7%] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
    <div class="mb-[3.5vw] flex items-center gap-[0.833vw] md:mb-8 md:gap-3 sm:mb-6" data-animate="fade-up">
        <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>
        <span class="font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
            <?php esc_html_e('Our Instagram', 'trac'); ?>
        </span>
    </div>

    <div class="rounded-[2vw] bg-brand-tint p-[4vw] md:rounded-3xl md:p-7 sm:rounded-[24px] sm:p-5" data-animate="fade-up">
        <div class="grid grid-cols-3 gap-[1.25vw] md:gap-5 sm:grid-cols-1 sm:gap-5">
            <?php foreach ($instagram_posts as $index => $post): ?>
                <a
                    href="<?php echo esc_url($post['link']); ?>"
                    class="group relative block h-[33vw] w-[26vw] overflow-hidden rounded-[1.5vw] bg-white md:rounded-2xl sm:rounded-[16px]<?php echo $index ===
                    2
                        ? ' border border-brand-primary-alt'
                        : ''; ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="<?php echo esc_attr($post['alt']); ?>"
                >
                    <img
                        src="<?php echo esc_url($post['image']); ?>"
                        alt="<?php echo esc_attr($post['alt']); ?>"
                        class="h-full w-full scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"
                    >

                    <span class="absolute bottom-[1.042vw] right-[1.042vw] flex h-[2vw] w-[2vw] items-center justify-center rounded-full bg-white md:bottom-4 md:right-4 md:h-10 md:w-10 sm:bottom-3 sm:right-3 sm:h-9 sm:w-9">
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
