<?php
if (!defined('ABSPATH')) {
    exit();
}

$instagram_icon = get_field('au_socials_instagram_icon');

$socials_label = get_field('au_socials_label');

$instagram_posts = [];
for ($i = 1; $i <= 3; $i++) {
    $image = get_field("au_social_{$i}_image");
    if ($image) {
        $instagram_posts[] = [
            'image' => $image,
            'alt' => get_field("au_social_{$i}_alt"),
            'link' => get_field("au_social_{$i}_link"),
        ];
    }
}
?>

<?php if ($instagram_posts): ?>
<section class="about-socials-section px-[5vw] py-[7%] md:px-[7vw] md:py-16  sm:py-12">
    <div class="mb-[3.5vw] flex items-center gap-[0.833vw] md:mb-8 md:gap-3 sm:mb-12" data-animate="fade-up">
        <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>
        <span class="font-body text-30 text-brand-secondary sm:!text-[4vw]">
            <?php echo trac_esc_html($socials_label); ?>
        </span>
    </div>

    <div class="rounded-[2vw] bg-brand-tint p-[4vw] md:rounded-3xl md:p-10 sm:rounded-xl" data-animate="fade-up">
        <div class="grid grid-cols-3 gap-[1.25vw] md:grid-cols-1 md:gap-5 sm:gap-8">
            <?php foreach ($instagram_posts as $index => $post): ?>
                <a
                    href="<?php echo esc_url($post['link']); ?>"
                    class="group relative block h-[33vw] w-[26vw] overflow-hidden rounded-[1.5vw] bg-white md:h-[80vw] md:w-full md:rounded-2xl sm:rounded-[16px]<?php echo $index ===
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
                            alt="instagram icon"
                            aria-hidden="true"
                            class="h-full w-full"
                        >
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
