<?php
if (!defined('ABSPATH')) {
    exit();
}

// Reuse the same logo assets as the homepage "clients" section.
$client_logos = [
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-urwego.png',
        'alt' => 'Urwego Bank',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-partners.png',
        'alt' => 'Partners In Health',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-smart.png',
        'alt' => 'Smart',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-airtel.png',
        'alt' => 'Airtel',
    ],
    // Repeat to fill the grid like the reference.
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-partners.png',
        'alt' => 'Partners In Health',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-urwego.png',
        'alt' => 'Urwego Bank',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-smart.png',
        'alt' => 'Smart',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-airtel.png',
        'alt' => 'Airtel',
    ],
];

// Lightweight categorization for tab filtering.
// If you want specific logos per tab later, we can hard-map them here.
$categories = ['technology', 'reseller', 'infrastructure'];

$label = get_field('partners_network_label') ?: 'Our Partner Network';
$title =
    get_field('partners_network_title') ?: "Companies We're Proud To Work With";
$subtitle =
    get_field('partners_network_subtitle') ?:
    "From global technology vendors to regional infrastructure leaders these are the organizations that help us deliver Africa's most reliable connectivity.";
?>

<section class="partners-network relative bg-[#eef3fc] overflow-hidden" data-section="partners-network" data-partner-network>
    <div class="w-full px-[5.21vw] py-[7vw] md:px-[4vw] md:py-20 sm:px-[6vw] sm:py-16">
        <div class="max-w-[92rem] mx-auto text-center">
            <div class="flex items-center justify-center gap-3 mb-14 md:mb-6" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-primary"></span>
                <span class="font-body text-base text-[#111]"><?php echo esc_html(
                    $label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-[#111] mb-[2.5vw] md:text-5xl md:mb-6 sm:text-4xl" data-animate="fade-up" data-delay="0.1">
                <?php echo esc_html($title); ?>
            </h2>

            <p class="font-body text-[1.25vw] leading-[1.5] text-[#1e1e1e] max-w-[52rem] mx-auto mb-[3.2vw] md:text-lg md:mb-10 sm:text-base sm:mb-8" data-para-anim data-delay="0.2">
                <?php echo esc_html($subtitle); ?>
            </p>

            <div class="flex flex-wrap justify-center gap-4 md:gap-3 mb-[4.2vw] md:mb-10 sm:mb-8" role="tablist" aria-label="Partner categories" data-animate="fade-up" data-delay="0.25">
                <button type="button" class="partner-tab px-10 py-2 rounded-full border border-brand-primary text-text-primary font-body text-base transition-colors" data-partner-tab="all" role="tab" aria-selected="true">
                    All
                </button>
                <button type="button" class="partner-tab px-10 py-2 rounded-full border border-brand-primary/50 text-text-primary font-body text-base transition-colors hover:border-brand-primary" data-partner-tab="technology" role="tab" aria-selected="false">
                    Technology Partners
                </button>
                <button type="button" class="partner-tab px-10 py-2 rounded-full border border-brand-primary/50 text-text-primary font-body text-base transition-colors hover:border-brand-primary" data-partner-tab="reseller" role="tab" aria-selected="false">
                    Reseller Partners
                </button>
                <button type="button" class="partner-tab px-10 py-2 rounded-full border border-brand-primary/50 text-text-primary font-body text-base transition-colors hover:border-brand-primary" data-partner-tab="infrastructure" role="tab" aria-selected="false">
                    Infrastructure Partners
                </button>
            </div>

            <div class="flex w-full flex-wrap gap-[0.8vw] gap-y-[1.5vw] md:grid-cols-2 md:gap-6 sm:gap-4 h-[24vw]" data-partner-logos>
                <?php foreach ($client_logos as $index => $logo):
                    $category = $categories[$index % count($categories)];
                    ?>
                    <div class="bg-white w-[24%] rounded-[0.8vw] h-fit md:rounded-2xl p-[3.5vw] md:p-7 sm:p-6 flex items-center justify-center" data-partner-logo data-partner-category="<?php echo esc_attr(
                        $category,
                    ); ?>" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.05 * ($index % 4),
                    ); ?>">
                        <img
                            src="<?php echo esc_url($logo['src']); ?>"
                            alt="<?php echo esc_attr($logo['alt']); ?>"
                            class="max-w-[12vw] max-h-[5vw] w-auto h-auto object-contain md:max-w-36 md:max-h-16 sm:max-w-28 sm:max-h-12"
                            loading="lazy"
                        >
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
