<?php
if (!defined('ABSPATH')) {
    exit();
}

$client_logos = [
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-airtel.png',
        'alt' => 'Airtel',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-partners.png',
        'alt' => 'Partners In Health',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-urwego.png',
        'alt' => 'Urwego Bank',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-urwego.png',
        'alt' => 'Urwego Bank',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-airtel.png',
        'alt' => 'Airtel',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-smart.png',
        'alt' => 'Smart',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-smart.png',
        'alt' => 'Smart',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-urwego.png',
        'alt' => 'Urwego Bank',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/client-partners.png',
        'alt' => 'Partners In Health',
    ],
];
?>

<section class="clients-section relative bg-white overflow-hidden" data-section="clients">
    <div class="clients-container w-full px-[5.21vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="clients-grid grid grid-cols-[1fr_1.5fr] gap-[4.167vw] items-start md:grid-cols-1 md:gap-10 sm:gap-8">
            <div class="clients-header">
                <div class="clients-label flex items-center gap-[0.833vw] mb-[1.563vw] md:gap-3 md:mb-5 sm:mb-4" data-animate="fade-up">
                    <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1 sm:w-5"></span>
                    <span class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">Our Clients</span>
                </div>
                <h2 class="clients-title font-heading text-[3.438vw] leading-[1.27] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl" >
                    <span data-heading-anim class="block">Some of Our </span>
                     <span data-heading-anim class="block">Valuable Clients </span>
                </h2>
            </div>

            <div
                class="clients-logos grid grid-cols-3 md:grid-cols-3 sm:grid-cols-2"
                data-animate="fade-up"
                data-delay="0.2"
                data-client-logos='<?php echo esc_attr(wp_json_encode($client_logos)); ?>'
            >
                <?php foreach ($client_logos as $index => $logo) : ?>
                    <div
                        class="client-logo-card flex items-center justify-center p-[2.083vw] aspect-[327/239] md:p-6 sm:p-4"
                        data-client-card
                        data-logo-index="<?php echo esc_attr($index); ?>"
                        data-active-layer="a"
                    >
                        <div class="client-logo-stack">
                            <img
                                src="<?php echo esc_url($logo['src']); ?>"
                                alt="<?php echo esc_attr($logo['alt']); ?>"
                                class="client-logo-image is-active max-w-[10.573vw] max-h-[4.427vw] w-auto h-auto object-contain md:max-w-32 md:max-h-14 sm:max-w-24 sm:max-h-10"
                                data-logo-layer="a"
                            >
                            <img
                                src="<?php echo esc_url($logo['src']); ?>"
                                alt=""
                                class="client-logo-image max-w-[10.573vw] max-h-[4.427vw] w-auto h-auto object-contain md:max-w-32 md:max-h-14 sm:max-w-24 sm:max-h-10"
                                data-logo-layer="b"
                                aria-hidden="true"
                            >
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
