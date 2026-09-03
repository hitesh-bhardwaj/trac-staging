<?php
if (!defined('ABSPATH')) {
    exit();
}

$what_we_do_cards = [
    [
        'title' => __('Network Design & Deployment', 'trac'),
        'description' => __(
            'We deliver connectivity solutions powered by high-capacity fibre-optic and wireless networks, linking urban centres to hard to reach rural regions.',
            'trac',
        ),
        'icon' => '/assets/icons/network.svg',
    ],
    [
        'title' => __('Satellite Communication', 'trac'),
        'description' => __(
            'Providing mission-critical connectivity in remote areas where traditional infrastructure cannot reach.',
            'trac',
        ),
        'icon' => '/assets/icons/satellite-communication.svg',
    ],
    [
        'title' => __('Managed Network Services', 'trac'),
        'description' => __(
            '24/7 monitoring and maintenance ensure zero downtime for enterprises and government agencies.',
            'trac',
        ),
        'icon' => '/assets/icons/network-services.svg',
    ],
    [
        'title' => __('Network Design & Deployment', 'trac'),
        'description' => __(
            'We deliver connectivity solutions powered by high-capacity fibre-optic and wireless networks, linking urban centres to hard to reach rural regions.',
            'trac',
        ),
        'icon' => '/assets/icons/network.svg',
    ],
    [
        'title' => __('Satellite Communication', 'trac'),
        'description' => __(
            'Providing mission-critical connectivity in remote areas where traditional infrastructure cannot reach.',
            'trac',
        ),
        'icon' => '/assets/icons/satellite-communication.svg',
    ]
    
];
?>

<section class="what-we-do-section relative py-[9vw] bg-brand-tertiary" data-section="what-we-do" data-what-we-do-slider>
    <div class="what-we-do-shell w-full   md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="mb-[3.438vw]  px-[5vw] flex items-center justify-between md:mb-10">
            <div data-animate="fade-up" class="what-we-do-header flex items-center gap-[0.833vw] md:gap-3">
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-white md:h-1 md:w-6 sm:w-5"></span>
                <span class="font-body text-30 text-white md:text-xl sm:text-lg">
                    <?php esc_html_e('What We Do', 'trac'); ?>
                </span>
            </div>

            <div class="what-we-do-nav flex fadeup items-center gap-[0.625vw] md:hidden overflow-visible" aria-label="<?php esc_attr_e(
                'What we do navigation',
                'trac',
            ); ?>">
                <button type="button" class="what-we-do-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-white/60 bg-transparent text-white transition-all duration-300 hover:bg-brand-secondary hover:text-white hover:border-brand-secondary disabled:opacity-40 disabled:hover:bg-transparent disabled:hover:text-white" data-what-we-do-prev aria-label="<?php esc_attr_e(
                    'Previous',
                    'trac',
                ); ?>">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
                <button type="button" class="what-we-do-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-white/60 bg-transparent text-white transition-all duration-300 hover:bg-brand-secondary hover:text-white hover:border-brand-secondary disabled:opacity-40 disabled:hover:bg-transparent disabled:hover:text-white" data-what-we-do-next aria-label="<?php esc_attr_e(
                    'Next',
                    'trac',
                ); ?>">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="what-we-do-viewport overflow-x-auto overflow-y-hidden" data-what-we-do-viewport>
           
            <div class="what-we-do-card-container fade-up flex gap-[1.667vw]  md:flex-col md:gap-6 " data-what-we-do-track>
                <?php foreach ($what_we_do_cards as $card): ?>
                    <article class="what-we-do-card flex h-[30vw] w-[25vw] flex-shrink-0 flex-col rounded-[1.563vw] bg-white px-[2.083vw] py-[2.292vw] shadow-[0_24px_80px_rgba(16,65,127,0.08)] md:h-auto md:w-full md:rounded-[28px] md:px-8 md:py-8 sm:rounded-[24px] sm:px-6 sm:py-6">
                        <div class="mb-[5.208vw] text-brand-primary md:mb-10 sm:mb-8">
                            <img
                                src="<?php echo esc_url(get_template_directory_uri() . '/src' . $card['icon']); ?>"
                                alt=""
                                class="h-[5vw] w-[5vw] md:h-8 md:w-8 sm:h-6 sm:w-6"
                                loading="lazy"
                            >
                           
                        </div>
                

                        <h2 class="mb-[1.875vw] font-heading w-[80%] text-36 font-normal leading-[1.18] tracking-[-0.02em] text-text-primary md:mb-5 md:text-[34px] sm:text-[28px]">
                            <?php echo esc_html($card['title']); ?>
                        </h2>

                        <p class="font-body text-[1.15vw] leading-[1.65] text-text-body md:text-[22px] sm:text-[17px]">
                            <?php echo esc_html($card['description']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
