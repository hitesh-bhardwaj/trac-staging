<?php
if (!defined('ABSPATH')) {
    exit();
}

$what_we_do_cards = [
    [
        'title' => __('Network Design & Deployment', 'trac'),
        'description' => __(
            'We engineer high-capacity fiber-optic and wireless networks that connect urban centers to underserved rural regions.',
            'trac',
        ),
        'icon' => 'network',
    ],
    [
        'title' => __('Satellite Communications', 'trac'),
        'description' => __(
            'Providing mission-critical connectivity in remote areas where traditional infrastructure cannot reach.',
            'trac',
        ),
        'icon' => 'satellite',
    ],
    [
        'title' => __('Managed Network Services', 'trac'),
        'description' => __(
            '24/7 monitoring and maintenance ensure zero downtime for enterprises and government agencies.',
            'trac',
        ),
        'icon' => 'managed',
    ],
    [
        'title' => __('Enterprise Connectivity', 'trac'),
        'description' => __(
            'Dedicated bandwidth, secure routing, and resilient links built for distributed teams and business-critical systems.',
            'trac',
        ),
        'icon' => 'enterprise',
    ],
];
?>

<section class="what-we-do-section relative bg-[#eef4ff]" data-section="what-we-do" data-what-we-do-scroll>
    <div class="what-we-do-sticky sticky top-0 flex min-h-screen items-center overflow-hidden">
        <div class="what-we-do-shell w-full px-[5.21vw] py-[5.5vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
            <div data-animate="fade-up" class="what-we-do-header mb-[3.438vw] flex items-center gap-[0.833vw] md:mb-10 md:gap-3">
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6 sm:w-5"></span>
                <span class="font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">
                    <?php esc_html_e('What We Do', 'trac'); ?>
                </span>
            </div>

            <div class="what-we-do-viewport overflow-visible">
                <div class="what-we-do-card-container flex gap-[1.667vw] md:flex-col md:gap-6" data-what-we-do-track>
                    <?php foreach ($what_we_do_cards as $card): ?>
                        <article class="what-we-do-card flex h-[31.25vw] w-[24.479vw] flex-shrink-0 flex-col rounded-[1.563vw] bg-white px-[2.083vw] py-[2.292vw] shadow-[0_24px_80px_rgba(16,65,127,0.08)] md:h-auto md:w-full md:rounded-[28px] md:px-8 md:py-8 sm:rounded-[24px] sm:px-6 sm:py-6">
                            <div class="mb-[5.208vw] text-brand-primary md:mb-10 sm:mb-8">
                                <?php if ($card['icon'] === 'network'): ?>
                                    <svg class="h-[3.125vw] w-[3.125vw] md:h-14 md:w-14 sm:h-12 sm:w-12" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <circle cx="12" cy="30" r="4" stroke="currentColor" stroke-width="2.5"/>
                                        <circle cx="26" cy="18" r="4" stroke="currentColor" stroke-width="2.5"/>
                                        <circle cx="44" cy="14" r="4" stroke="currentColor" stroke-width="2.5"/>
                                        <circle cx="52" cy="28" r="4" stroke="currentColor" stroke-width="2.5"/>
                                        <circle cx="40" cy="42" r="4" stroke="currentColor" stroke-width="2.5"/>
                                        <circle cx="22" cy="44" r="4" stroke="currentColor" stroke-width="2.5"/>
                                        <circle cx="50" cy="48" r="4" stroke="currentColor" stroke-width="2.5"/>
                                        <path d="M15 28L23 20M29 18L40 15M47 17L50 24M49 32L43 39M36 42L26 44M20 41L14 33M24 22L22 40M28 20L38 39M44 18L41 38M16 30H48M24 44L47 48" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    </svg>
                                <?php elseif ($card['icon'] === 'satellite'): ?>
                                    <svg class="h-[3.125vw] w-[3.125vw] md:h-14 md:w-14 sm:h-12 sm:w-12" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M23 14C31 18 38 25 42 33L33 42C25 38 18 31 14 23L23 14Z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/>
                                        <path d="M20 44L28 36" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                        <path d="M12 50H34" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                        <path d="M23 42V50" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                        <path d="M43 13C47.5 13 51 16.5 51 21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                        <path d="M43 7C50.7 7 57 13.3 57 21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                        <path d="M43 1C54 1 63 10 63 21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    </svg>
                                <?php elseif ($card['icon'] === 'managed'): ?>
                                    <svg class="h-[3.125vw] w-[3.125vw] md:h-14 md:w-14 sm:h-12 sm:w-12" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <rect x="10" y="10" width="24" height="12" rx="3" stroke="currentColor" stroke-width="2.5"/>
                                        <rect x="10" y="26" width="24" height="12" rx="3" stroke="currentColor" stroke-width="2.5"/>
                                        <rect x="10" y="42" width="24" height="12" rx="3" stroke="currentColor" stroke-width="2.5"/>
                                        <circle cx="18" cy="16" r="1.5" fill="currentColor"/>
                                        <circle cx="18" cy="32" r="1.5" fill="currentColor"/>
                                        <circle cx="18" cy="48" r="1.5" fill="currentColor"/>
                                        <path d="M42 23L44.5 19L49.5 21L54 18.5L57 22L55 27L58 31L55 35L57 39.5L54 43L49.5 40.5L44.5 42.5L42 38.5L37 38L35 33.5L38 29L35 24.5L37 20L42 23Z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/>
                                        <circle cx="47" cy="31" r="5" stroke="currentColor" stroke-width="2.5"/>
                                    </svg>
                                <?php else: ?>
                                    <svg class="h-[3.125vw] w-[3.125vw] md:h-14 md:w-14 sm:h-12 sm:w-12" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <rect x="8" y="18" width="48" height="28" rx="6" stroke="currentColor" stroke-width="2.5"/>
                                        <path d="M16 40L24 32L30 37L40 26L48 34" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="21" cy="26" r="2.5" fill="currentColor"/>
                                    </svg>
                                <?php endif; ?>
                            </div>

                            <h2 class="mb-[1.875vw] font-heading text-[1.823vw] font-normal leading-[1.18] tracking-[-0.02em] text-text-primary md:mb-5 md:text-[34px] sm:text-[28px]">
                                <?php echo esc_html($card['title']); ?>
                            </h2>

                            <p class="font-body text-[1.302vw] leading-[1.65] text-text-body md:text-[22px] sm:text-[17px]">
                                <?php echo esc_html($card['description']); ?>
                            </p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
