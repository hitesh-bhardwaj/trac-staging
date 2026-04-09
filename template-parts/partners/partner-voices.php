<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('partner_voices_label') ?: 'Partner Voices';
$title = get_field('partner_voices_title') ?: 'What Our Partners Say';

// 7 slides, looped by JS. Logos reused from homepage clients assets.
$unified_quote =
    'TransAfrica Communications (TrAC) has been providing to us Multiprotocol Label Switching (MPLS private network) and Internet services which are highly efficient, scalable and secure. In our interactions, we have found TrAC staff to be highly professional and rich with experience in project implementation skills and the ability to handle diverse environments while providing exceptional customer service and support in a timely manner.';

$slides = [
    [
        'logo' => get_template_directory_uri() . '/src/imgs/client-partners.png',
        'logo_alt' => 'Partners In Health',
        'quote' => $unified_quote,
        'meta' => 'CMO, PARTNERS IN HEALTH',
    ],
    [
        'logo' => get_template_directory_uri() . '/src/imgs/client-smart.png',
        'logo_alt' => 'Smart',
        'quote' => $unified_quote,
        'meta' => 'CMO, SMART SERVICES',
    ],
    [
        'logo' => get_template_directory_uri() . '/src/imgs/client-airtel.png',
        'logo_alt' => 'Airtel',
        'quote' => $unified_quote,
        'meta' => 'PARTNER SUCCESS LEAD, AIRTEL',
    ],
    [
        'logo' => get_template_directory_uri() . '/src/imgs/client-urwego.png',
        'logo_alt' => 'Urwego Bank',
        'quote' => $unified_quote,
        'meta' => 'HEAD OF IT, URWEGO BANK',
    ],
    [
        'logo' => get_template_directory_uri() . '/src/imgs/client-partners.png',
        'logo_alt' => 'Partners In Health',
        'quote' => $unified_quote,
        'meta' => 'OPERATIONS DIRECTOR, PARTNERS IN HEALTH',
    ],
    [
        'logo' => get_template_directory_uri() . '/src/imgs/client-smart.png',
        'logo_alt' => 'Smart',
        'quote' => $unified_quote,
        'meta' => 'TECHNICAL DIRECTOR, SMART SERVICES',
    ],
    [
        'logo' => get_template_directory_uri() . '/src/imgs/client-airtel.png',
        'logo_alt' => 'Airtel',
        'quote' => $unified_quote,
        'meta' => 'REGIONAL LEAD, AIRTEL',
    ],
];
?>

<section class="partner-voices-section relative overflow-visible " data-section="partner-voices" data-partner-voices>
    <!-- Animated network canvas background (same system as enterprise "why" section) -->
    <canvas class="absolute inset-0 h-full w-full pointer-events-none z-0" data-network-canvas aria-hidden="true"></canvas>

    <div class="relative z-10 w-full px-[5.21vw] py-[7vw] md:px-[4vw] md:py-20 sm:px-[6vw] sm:py-16">
        <div class="max-w-[92rem] mx-auto text-center">
            <div class="flex items-center justify-center gap-3 mb-8 md:mb-6" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-primary"></span>
                <span class="font-body text-base text-[#111]"><?php echo esc_html(
                    $label,
                ); ?></span>
            </div>

	            <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-[#111] mb-[3.2vw] md:text-5xl md:mb-10 sm:text-4xl sm:mb-8" data-animate="fade-up" data-delay="0.1">
	                <?php echo esc_html($title); ?>
	            </h2>
	
	            <div class="relative w-full overflow-visible ">
	                <div class="partner-voices-viewport relative mt-[5vw] w-full overflow-visible" data-partner-voices-viewport>
		                    <div class="partner-voices-track flex gap-[8vw] md:gap-12 sm:gap-8 will-change-transform" data-partner-voices-track>
		                        <?php foreach ($slides as $slide): ?>
		                            <article class="partner-voices-slide flex-shrink-0 w-[48vw] md:w-[72vw] sm:w-[84vw] rounded-[1.563vw] md:rounded-3xl bg-white border border-brand-primary/40 p-[2.5vw] md:p-8 sm:p-6 text-left" data-partner-voices-slide>
                                <div class="h-[4vw] md:h-10 sm:h-8 w-auto mb-[2.083vw] md:mb-6 sm:mb-5">
                                    <img src="<?php echo esc_url(
                                        $slide['logo'],
                                    ); ?>" alt="<?php echo esc_attr(
    $slide['logo_alt'],
); ?>" class="h-full w-auto object-contain">
                                </div>

	                                <p class="font-body text-[1.25vw] md:text-lg sm:text-base leading-[1.65] text-text-primary mb-[2.5vw] md:mb-8 sm:mb-7">
	                                    &ldquo; <?php echo esc_html(
	                                        $slide['quote'],
	                                    ); ?> &rdquo;
	                                </p>

                                <p class="font-body tracking-[0.18em] uppercase text-[0.938vw] md:text-sm sm:text-xs text-[#E86224]">
                                    <?php echo esc_html($slide['meta']); ?>
                                </p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mt-[3.2vw] md:mt-10 sm:mt-8 flex justify-center">
                    <div class="flex items-center gap-4 rounded-full border border-brand-primary/60 bg-white px-6 py-3">
                        <button type="button" class="h-10 w-10 rounded-full grid place-items-center text-brand-primary hover:bg-brand-primary hover:text-white transition-colors disabled:pointer-events-none disabled:opacity-35" aria-label="Previous" data-partner-voices-prev>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button type="button" class="h-10 w-10 rounded-full grid place-items-center text-brand-primary hover:bg-brand-primary hover:text-white transition-colors disabled:pointer-events-none disabled:opacity-35" aria-label="Next" data-partner-voices-next>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
